<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PredictionResource\Pages;
use App\Models\Prediction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Support\Enums\FontWeight;

class PredictionResource extends Resource
{
    protected static ?string $model = Prediction::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';

    protected static ?string $navigationLabel = 'Predictions';

    protected static ?string $modelLabel = 'Prediction';

    protected static ?string $pluralModelLabel = 'Predictions';

    // Laravel Shield - Kontrol akses berdasarkan role
    public static function shouldRegisterNavigation(): bool
    {
        $user = auth()->user();
        
        if (!$user) {
            return false;
        }
        
        // Hanya doctor dan user yang bisa melihat menu prediction
        // Admin tidak bisa akses prediction menu
        return in_array($user->role, ['doctor', 'user']);
    }

    public static function canViewAny(): bool
    {
        $user = auth()->user();
        
        if (!$user) {
            return false;
        }
        
        // Admin tidak bisa view prediction sama sekali
        if ($user->role === 'admin') {
            return false;
        }
        
        // Doctor dan user bisa view
        return in_array($user->role, ['doctor', 'user']);
    }

    public static function canCreate(): bool
    {
        $user = auth()->user();
        
        if (!$user) {
            return false;
        }
        
        // Hanya user yang bisa create prediction baru
        // Doctor hanya bisa view dan search
        return $user->role === 'user';
    }

    public static function canEdit($record): bool
    {
        $user = auth()->user();
        
        if (!$user) {
            return false;
        }
        
        // Tidak ada yang bisa edit prediction setelah dibuat
        return false;
    }

    public static function canDelete($record): bool
    {
        $user = auth()->user();
        
        if (!$user) {
            return false;
        }
        
        // Hanya admin yang bisa delete (tapi admin tidak bisa akses menu ini)
        // User hanya bisa delete prediction milik sendiri
        if ($user->role === 'user') {
            return $record->user_id === $user->id;
        }
        
        return false;
    }

    public static function canView($record): bool
    {
        $user = auth()->user();
        
        if (!$user) {
            return false;
        }
        
        // Doctor bisa view semua prediction
        if ($user->role === 'doctor') {
            return true;
        }
        
        // User hanya bisa view prediction milik sendiri
        if ($user->role === 'user') {
            return $record->user_id === $user->id;
        }
        
        return false;
    }

    // Tambahkan navigation group berdasarkan role
    public static function getNavigationGroup(): ?string
    {
        $user = auth()->user();
        
        if (!$user) {
            return null;
        }
        
        return match($user->role) {
            'doctor' => 'Medical Records',
            'user' => 'My Health',
            default => null
        };
    }

    // Filter data berdasarkan role
    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $query = parent::getEloquentQuery();
        $user = auth()->user();
        
        if (!$user) {
            return $query->whereRaw('1 = 0'); // Return empty
        }
        
        // Doctor bisa lihat semua prediction
        if ($user->role === 'doctor') {
            return $query;
        }
        
        // User hanya bisa lihat prediction milik sendiri
        if ($user->role === 'user') {
            return $query->where('user_id', $user->id);
        }
        
        // Admin dan role lain tidak bisa lihat apapun
        return $query->whereRaw('1 = 0');
    }

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

                    // Hanya tampilkan step kesimpulan untuk doctor
                    ...static::getConclustionStep(),
                ])
                ->columnSpanFull()
                ->persistStepInQueryString(),
            ]);
    }

    protected static function getConclustionStep(): array
    {
        $user = auth()->user();
        
        // Hanya doctor yang bisa input hasil prediksi manual
        if ($user && $user->role === 'doctor') {
            return [
                Wizard\Step::make('5. Kesimpulan')
                    ->schema([
                        Select::make('result.prediction')
                            ->required()
                            ->options([
                                'breast cancer' => 'Breast Cancer',
                                'normal' => 'Normal',
                            ])
                            ->label('Hasil Prediksi'),
                    ]),
            ];
        }
        
        return [];
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
                
                // Tampilkan examination code untuk doctor
                TextColumn::make('examination_code')
                    ->label('Kode Pemeriksaan')
                    ->searchable()
                    ->copyable()
                    ->visible(fn () => auth()->user()?->role === 'doctor'),
                
                // Tampilkan nama user untuk doctor
                TextColumn::make('user.name')
                    ->label('Nama Pasien')
                    ->searchable()
                    ->visible(fn () => auth()->user()?->role === 'doctor'),
                
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
                
                // Confidence Score untuk doctor
                TextColumn::make('result.confidence_score')
                    ->label('Confidence Score')
                    ->formatStateUsing(fn ($state) => $state ? number_format($state * 100, 1) . '%' : 'N/A')
                    ->visible(fn () => auth()->user()?->role === 'doctor'),
                
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
                Tables\Actions\EditAction::make()
                    ->visible(fn ($record) => static::canEdit($record)),
                Tables\Actions\DeleteAction::make()
                    ->visible(fn ($record) => static::canDelete($record)),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn () => auth()->user()?->role !== 'doctor'),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Buat Prediksi Pertama')
                    ->icon('heroicon-m-plus')
                    ->visible(fn () => auth()->user()?->role === 'user'),
            ])
            ->emptyStateHeading('Belum Ada Prediksi')
            ->emptyStateDescription(
                auth()->user()?->role === 'doctor' 
                    ? 'Belum ada prediksi dari pasien yang dapat ditampilkan.'
                    : 'Mulai dengan membuat prediksi kanker payudara pertama Anda.'
            )
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