<?php

namespace App\Filament\Resources\PredictionResource\Pages;

use App\Filament\Resources\PredictionResource;
use App\Services\PredictionApiService;
use App\Models\PredictionResult;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class EditPrediction extends EditRecord
{
    protected static string $resource = PredictionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // Update local record first
        $record->update($data);
        
        Log::info('Updating prediction with data: ', $data);
        
        // Try to get new prediction from API using create endpoint (since update might not exist)
        try {
            // Use create endpoint for new prediction instead of update
            $apiResponse = PredictionApiService::create($data);
            
            Log::info('API Response received: ', $apiResponse ?? []);
            
            if ($apiResponse && isset($apiResponse['prediction'])) {
                // Update existing result or create new one
                $existingResult = $record->result;
                
                $accuracy = isset($apiResponse['accuracy']) ? (float) $apiResponse['accuracy'] : null;
                $confidenceScore = isset($apiResponse['confidenceScore']) ? (float) $apiResponse['confidenceScore'] : null;
                
                if ($existingResult) {
                    $existingResult->update([
                        'prediction' => $apiResponse['prediction'] ?? null,
                        'accuracy' => $accuracy,
                        'confidence_score' => $confidenceScore,
                    ]);
                } else {
                    PredictionResult::create([
                        'prediction_id' => $record->id,
                        'prediction' => $apiResponse['prediction'] ?? null,
                        'accuracy' => $accuracy,
                        'confidence_score' => $confidenceScore,
                    ]);
                }
                
                Notification::make()
                    ->title('Prediksi berhasil diupdate')
                    ->body('Hasil: ' . $apiResponse['prediction'] . ' (Akurasi: ' . number_format($accuracy * 100, 2) . '%)')
                    ->success()
                    ->send();
            } else {
                // Check if API is running
                $this->checkApiStatus($data);
            }
        } catch (\Exception $e) {
            Log::error('API call failed: ' . $e->getMessage());
            
            Notification::make()
                ->title('Data berhasil diupdate')
                ->body('API tidak tersedia, tapi data lokal sudah terupdate')
                ->warning()
                ->send();
        }
        
        return $record;
    }

    private function checkApiStatus(array $data)
    {
        try {
            // Test if API is running by calling getAll endpoint
            $testResponse = PredictionApiService::getAll();
            
            if ($testResponse !== null) {
                // API is running but prediction failed
                Notification::make()
                    ->title('Data berhasil diupdate')
                    ->body('API tidak memberikan respons prediksi baru')
                    ->warning()
                    ->send();
            } else {
                // API is not running
                Notification::make()
                    ->title('Data berhasil diupdate')
                    ->body('API Spring Boot tidak aktif')
                    ->warning()
                    ->send();
            }
        } catch (\Exception $e) {
            Log::error('API status check failed: ' . $e->getMessage());
            
            Notification::make()
                ->title('Data berhasil diupdate')
                ->body('Tidak dapat terhubung ke API (http://localhost:8080)')
                ->warning()
                ->send();
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('view', ['record' => $this->getRecord()]);
    }
}