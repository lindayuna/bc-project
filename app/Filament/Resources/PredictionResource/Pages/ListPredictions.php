<?php

namespace App\Filament\Resources\PredictionResource\Pages;

use App\Filament\Resources\PredictionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPredictions extends ListRecords
{
    protected static string $resource = PredictionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('New Prediction')
                ->icon('heroicon-m-plus'),
            Actions\Action::make('refresh')
                ->label('Refresh Data')
                ->icon('heroicon-o-arrow-path')
                ->action(function () {
                    // Use Filament's built-in refresh method
                    $this->resetTable();
                    
                    // Show notification
                    \Filament\Notifications\Notification::make()
                        ->title('Data refreshed')
                        ->success()
                        ->send();
                }),
        ];
    }

    protected function getTableQuery(): Builder
    {
        // Get data from local database table 'predictions'
        return parent::getTableQuery()
            ->with(['user', 'result']) // Eager load relationships
            ->latest('created_at'); // Order by latest first
    }
}