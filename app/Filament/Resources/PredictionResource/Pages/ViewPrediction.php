<?php

namespace App\Filament\Resources\PredictionResource\Pages;

use App\Filament\Resources\PredictionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Grid;

class ViewPrediction extends ViewRecord
{
    protected static string $resource = PredictionResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Hasil Prediksi')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('result.prediction')
                                    ->label('Hasil Prediksi')
                                    ->badge()
                                    ->color(fn (?string $state): string => match ($state) {
                                        'breast cancer' => 'danger',
                                        'normal' => 'success',
                                        default => 'gray',
                                    })
                                    ->formatStateUsing(fn ($state) => $state ?? 'Tidak tersedia'),
                                
                                TextEntry::make('result.accuracy')
                                    ->label('Akurasi')
                                    ->formatStateUsing(fn ($state) => $state ? number_format($state * 100, 2) . '%' : 'Tidak tersedia'),
                                
                                TextEntry::make('result.confidence_score')
                                    ->label('Confidence Score')
                                    ->formatStateUsing(function ($state) {
                                        if (!$state) return 'Tidak tersedia';
        
                                        // Konversi ke float jika string
                                        $score = is_string($state) ? (float) $state : $state;
        
                                        // Format sebagai persen dengan 2 decimal places
                                        return number_format($score, 2) . '%';
                                    }),
                                
                                TextEntry::make('created_at')
                                    ->label('Tanggal Prediksi')
                                    ->dateTime(),
                            ]),
                    ]),

                Section::make('Data Input')
                    ->schema([
                        Grid::make(3)
                            ->schema([
                                TextEntry::make('faktor_risiko')
                                    ->label('Faktor Risiko')
                                    ->badge()
                                    ->color(fn (string $state): string => $state === 'ya' ? 'warning' : 'gray'),
                                
                                TextEntry::make('benjolan_di_payudara')
                                    ->label('Benjolan di Payudara')
                                    ->badge()
                                    ->color(fn (string $state): string => $state === 'ya' ? 'warning' : 'gray'),
                                
                                TextEntry::make('kecepatan_tumbuh')
                                    ->label('Kecepatan Tumbuh')
                                    ->badge()
                                    ->color(fn (string $state): string => $state === 'ya' ? 'danger' : 'gray'),
                                
                                TextEntry::make('nipple_discharge')
                                    ->label('Nipple Discharge')
                                    ->badge()
                                    ->color(fn (string $state): string => $state === 'ya' ? 'warning' : 'gray'),
                                
                                TextEntry::make('retraksi_putting_susu')
                                    ->label('Retraksi Putting Susu')
                                    ->badge()
                                    ->color(fn (string $state): string => $state === 'ya' ? 'warning' : 'gray'),
                                
                                TextEntry::make('krusta')
                                    ->label('Krusta')
                                    ->badge()
                                    ->color(fn (string $state): string => $state === 'ya' ? 'warning' : 'gray'),
                                
                                TextEntry::make('dimpling')
                                    ->label('Dimpling')
                                    ->badge()
                                    ->color(fn (string $state): string => $state === 'ya' ? 'warning' : 'gray'),
                                
                                TextEntry::make('peau_dorange')
                                    ->label('Peau d\'Orange')
                                    ->badge()
                                    ->color(fn (string $state): string => $state === 'ya' ? 'warning' : 'gray'),
                                
                                TextEntry::make('ulserasi')
                                    ->label('Ulserasi')
                                    ->badge()
                                    ->color(fn (string $state): string => $state === 'ya' ? 'warning' : 'gray'),
                                
                                TextEntry::make('venektasi')
                                    ->label('Venektasi')
                                    ->badge()
                                    ->color(fn (string $state): string => $state === 'ya' ? 'warning' : 'gray'),
                                
                                TextEntry::make('benjolan_ketiak')
                                    ->label('Benjolan Ketiak')
                                    ->badge()
                                    ->color(fn (string $state): string => $state === 'ya' ? 'danger' : 'gray'),
                                
                                TextEntry::make('edema_lengan')
                                    ->label('Edema Lengan')
                                    ->badge()
                                    ->color(fn (string $state): string => $state === 'ya' ? 'warning' : 'gray'),
                                
                                TextEntry::make('nyeri_tulang')
                                    ->label('Nyeri Tulang')
                                    ->badge()
                                    ->color(fn (string $state): string => $state === 'ya' ? 'danger' : 'gray'),
                                
                                TextEntry::make('sesak')
                                    ->label('Sesak')
                                    ->badge()
                                    ->color(fn (string $state): string => $state === 'ya' ? 'danger' : 'gray'),

                                // // Tampilkan hasil manual dari form jika ada
                                // TextEntry::make('hasil')
                                //     ->label('Hasil Manual')
                                //     ->badge()
                                //     ->color(fn (?string $state): string => match ($state) {
                                //         'positif' => 'danger',
                                //         'negatif' => 'success',
                                //         default => 'gray',
                                //     })
                                //     ->formatStateUsing(fn ($state) => $state ?? 'Tidak diisi'),
                            ]),
                    ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\Action::make('create_new')
                ->label('Prediksi Baru')
                ->icon('heroicon-o-plus')
                ->url(fn () => PredictionResource::getUrl('create'))
                ->color('success'),
        ];
    }
}