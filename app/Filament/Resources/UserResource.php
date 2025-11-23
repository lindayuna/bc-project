<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'User Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('User Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true),
                        
                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->required(fn (string $context): bool => $context === 'create')
                            ->dehydrated(fn (?string $state): bool => filled($state))
                            ->dehydrateStateUsing(fn (string $state): string => Hash::make($state)),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Role Assignment')
                    ->schema([
                        Forms\Components\Select::make('role')
                            ->label('User Role')
                            ->options([
                                'user' => 'User',
                                'dokter' => 'Dokter',
                                'admin' => 'Admin',
                                'super_admin' => 'Super Admin',
                            ])
                            ->default('user')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                // Sync dengan Spatie Permission field
                                $set('spatie_roles', [$state]);
                            }),

                        Forms\Components\Select::make('spatie_roles')
                            ->label('Spatie Roles (Auto-synced)')
                            ->relationship('roles', 'name')
                            ->options(Role::pluck('name', 'name'))
                            ->multiple()
                            ->disabled()
                            ->dehydrated(false)
                            ->helperText('This will be automatically synced with User Role above'),

                        Forms\Components\Select::make('permissions')
                            ->label('Additional Permissions')
                            ->relationship('permissions', 'name')
                            ->multiple()
                            ->searchable()
                            ->preload()
                            ->helperText('Select additional permissions beyond role permissions'),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('role')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'admin' => 'danger',
                        'doctor' => 'warning',
                        'user' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
                
                Tables\Columns\TextColumn::make('spatie_roles')
                    ->label('Spatie Roles')
                    ->badge()
                    ->color('info')
                    ->getStateUsing(function ($record) {
                        $roles = $record->roles->pluck('name')->toArray();
                        return empty($roles) ? 'No Spatie Role' : implode(', ', $roles);
                    })
                    ->formatStateUsing(function ($state) {
                        return $state === 'No Spatie Role' ? $state : ucwords(str_replace('_', ' ', $state));
                    }),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->options([
                        'user' => 'User',
                        'dokter' => 'Dokter',
                        'admin' => 'Admin',
                        'super_admin' => 'Super Admin',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}