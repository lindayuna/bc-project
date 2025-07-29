<?php

namespace App\Filament\Resources\PredictionResource\Pages;

use App\Filament\Resources\PredictionResource;
use App\Services\PredictionApiService;
use App\Models\PredictionResult;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CreatePrediction extends CreateRecord
{
    protected static string $resource = PredictionResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        // Add user_id to data
        $data['user_id'] = Auth::id();
        
        Log::info('Creating prediction with data: ', $data);
        
        // Create local record first
        $prediction = new \App\Models\Prediction();
        $prediction->fill($data);
        $prediction->save();
        
        // Try to send to API
        try {
            $apiResponse = PredictionApiService::create($data);
            
            Log::info('API Response received: ', $apiResponse ?? []);
            
            if ($apiResponse && isset($apiResponse['prediction'])) {
                // Validate and format data before saving
                $accuracy = isset($apiResponse['accuracy']) ? (float) $apiResponse['accuracy'] : null;
                $confidenceScore = isset($apiResponse['confidenceScore']) ? (float) $apiResponse['confidenceScore'] : null;
                
                // Store API result in separate table
                PredictionResult::create([
                    'prediction_id' => $prediction->id,
                    'prediction' => $apiResponse['prediction'] ?? null,
                    'accuracy' => $accuracy,
                    'confidence_score' => $confidenceScore,
                ]);
                
                Notification::make()
                    ->title('Prediksi berhasil dibuat')
                    ->body('Hasil: ' . $apiResponse['prediction'] . ' (Akurasi: ' . number_format($accuracy * 100, 2) . '%)')
                    ->success()
                    ->send();
            } else {
                Notification::make()
                    ->title('Data tersimpan')
                    ->body('API tidak memberikan respons yang valid')
                    ->warning()
                    ->send();
            }
        } catch (\Exception $e) {
            Log::error('API call failed: ' . $e->getMessage());
            Log::error('Exception trace: ' . $e->getTraceAsString());
            
            Notification::make()
                ->title('Data tersimpan')
                ->body('API tidak tersedia: ' . $e->getMessage())
                ->warning()
                ->send();
        }
        
        return $prediction;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('view', ['record' => $this->getRecord()]);
    }

    // Menampilkan tombol Create yang berfungsi
    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()
                ->label('Buat Prediksi')
                ->color('success')
                ->icon('heroicon-o-check'),
            $this->getCancelFormAction(),
        ];
    }

    // Sembunyikan tombol "Create & create another"
    protected function getCreateAnotherFormAction(): Actions\Action
    {
        return parent::getCreateAnotherFormAction()->hidden();
    }
}