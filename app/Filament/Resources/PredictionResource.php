<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PredictionResource\Pages;
use App\Filament\Resources\PredictionResource\RelationManagers;
use App\Models\Prediction;
use App\Services\PredictionApiService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Support\Enums\FontWeight;

class PredictionResource extends Resource
{
    protected static ?string $model = Prediction::class;

    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';

    protected static ?string $navigationLabel = 'Predictions';

    protected static ?string $modelLabel = 'Prediction';

    protected static ?string $pluralModelLabel = 'Predictions';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('1. Risiko & Benjolan')
                        ->schema([
                            Select::make('faktor_risiko')
                                ->required()
                                ->options([
                                    'ya' => 'Ya',
                                    'tidak' => 'Tidak',
                            ])
                            ->label('Faktor Risiko'),
                        
                            Select::make('benjolan_di_payudara')
                                ->required()
                                ->options([
                                    'ya' => 'Ya',
                                    'tidak' => 'Tidak',
                            ])
                            ->label('Benjolan di Payudara'),
                        
                            Select::make('kecepatan_tumbuh')
                                ->required()
                                ->options([
                                    'ya' => 'Ya',
                                    'tidak' => 'Tidak',
                            ])
                            ->label('Kecepatan Tumbuh'),
                        
                            Select::make('benjolan_ketiak')
                                ->required()
                                ->options([
                                    'ya' => 'Ya',
                                    'tidak' => 'Tidak',
                            ])
                            ->label('Benjolan Ketiak'),
                        ]),

                    Wizard\Step::make('2. Gejala Putting & Kulit')
                        ->schema([
                            Select::make('nipple_discharge')
                                ->required()
                                ->options([
                                    'ya' => 'Ya',
                                    'tidak' => 'Tidak',
                            ])
                            ->label('Nipple Discharge'),
                        
                            Select::make('retraksi_putting_susu')
                                ->required()
                                ->options([
                                    'ya' => 'Ya',
                                    'tidak' => 'Tidak',
                            ])
                            ->label('Retraksi Putting Susu'),
                        
                            Select::make('krusta')
                                ->required()
                                ->options([
                                    'ya' => 'Ya',
                                    'tidak' => 'Tidak',
                            ])
                            ->label('Krusta'),
                        
                            Select::make('dimpling')
                                ->required()
                                ->options([
                                    'ya' => 'Ya',
                                    'tidak' => 'Tidak',
                            ])
                            ->label('Dimpling'),
                        ]),

                    Wizard\Step::make('3. Perubahan Kulit')
                        ->schema([
                            Select::make('peau_dorange')
                                ->required()
                                ->options([
                                    'ya' => 'Ya',
                                    'tidak' => 'Tidak',
                            ])
                            ->label('Peau d\'Orange'),
                        
                            Select::make('ulserasi')
                                ->required()
                                ->options([
                                    'ya' => 'Ya',
                                    'tidak' => 'Tidak',
                            ])
                            ->label('Ulserasi'),
                        
                            Select::make('venektasi')
                                ->required()
                                ->options([
                                    'ya' => 'Ya',
                                    'tidak' => 'Tidak',
                            ])
                            ->label('Venektasi'),
                        ]),

                    Wizard\Step::make('4. Gejala Sistemik')
                        ->schema([
                            Select::make('edema_lengan')
                                ->required()
                                ->options([
                                    'ya' => 'Ya',
                                    'tidak' => 'Tidak',
                            ])
                            ->label('Edema Lengan'),
                        
                            Select::make('nyeri_tulang')
                                ->required()
                                ->options([
                                    'ya' => 'Ya',
                                    'tidak' => 'Tidak',
                            ])
                            ->label('Nyeri Tulang'),
                        
                            Select::make('sesak')
                                ->required()
                                ->options([
                                    'ya' => 'Ya',
                                    'tidak' => 'Tidak',
                            ])
                            ->label('Sesak'),
                        ]),
                ])
                ->columnSpanFull()
                ->persistStepInQueryString(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Nomor urut
                TextColumn::make('no')
                    ->label('No')
                    ->rowIndex()
                    ->sortable(false),
                
                // Hasil Prediksi
                TextColumn::make('result.prediction')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'breast cancer' => 'danger',
                        'normal' => 'success',
                        default => 'gray',
                    })
                    ->label('Hasil Prediksi')
                    ->formatStateUsing(fn ($state) => $state ?? 'Belum ada'),
                
                // Tanggal dibuat
                TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->label('Tanggal'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('result.prediction')
                    ->options([
                        'breast cancer' => 'Breast Cancer',
                        'normal' => 'Normal',
                    ])
                    ->label('Hasil Prediksi'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Buat Prediksi Pertama')
                    ->icon('heroicon-m-plus'),
            ])
            ->emptyStateHeading('Belum Ada Prediksi')
            ->emptyStateDescription('Mulai dengan membuat prediksi kanker payudara pertama Anda.')
            ->emptyStateIcon('heroicon-o-cpu-chip');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPredictions::route('/'),
            'create' => Pages\CreatePrediction::route('/create'),
            'view' => Pages\ViewPrediction::route('/{record}'),
            'edit' => Pages\EditPrediction::route('/{record}/edit'),
        ];
    }
}