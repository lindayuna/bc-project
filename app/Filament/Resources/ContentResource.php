<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContentResource\Pages;
use App\Models\Content;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ContentResource extends Resource
{
    protected static ?string $model = Content::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Contents';

    protected static ?string $pluralModelLabel = 'Contents';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                        if ($operation !== 'create') {
                            return;
                        }
                        $set('slug', Str::slug($state));
                    })
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(Content::class, 'slug', ignoreRecord: true)
                    ->rules(['alpha_dash'])
                    ->helperText('URL-friendly version of the title. Leave blank to auto-generate.')
                    ->columnSpanFull(),

                Forms\Components\Select::make('category')
                    ->options([
                        'news' => 'News',
                        'events' => 'Events',
                        'breast-cancer-info' => 'Breast Cancer Info',
                        'signs-symptoms' => 'Signs & Symptoms',
                        'risk-factors' => 'Risk Factors',
                        'sadari' => 'SADARI',
                        'detection-benefits' => 'Detection Benefits',
                        'guidelines' => 'Guidelines',
                    ])
                    ->required()
                    ->searchable(),

                Forms\Components\Select::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archived' => 'Archived'
                    ])
                    ->default('published')
                    ->required(),

                Forms\Components\TextInput::make('source')
                    ->maxLength(255)
                    ->helperText('Source of the content (optional)'),

                Forms\Components\RichEditor::make('body')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('content-images')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->helperText('Maximum file size: 2MB'),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->wrap(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->limit(30),

                Tables\Columns\TextColumn::make('category')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'news' => 'News',
                        'events' => 'Events',
                        'breast-cancer-info' => 'Breast Cancer Info',
                        'signs-symptoms' => 'Signs & Symptoms',
                        'risk-factors' => 'Risk Factors',
                        'sadari' => 'SADARI',
                        'detection-benefits' => 'Detection Benefits',
                        'guidelines' => 'Guidelines',
                        default => $state,
                    })
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'news' => 'info',
                        'events' => 'warning',
                        'breast-cancer-info' => 'success',
                        'signs-symptoms' => 'danger',
                        'risk-factors' => 'gray',
                        'sadari' => 'primary',
                        'detection-benefits' => 'success',
                        'guidelines' => 'secondary',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'published' => 'success',
                        'archived' => 'warning',
                        default => 'gray',
                    }),

                Tables\Columns\ImageColumn::make('image')
                    ->size(60)
                    ->toggleable(),

                Tables\Columns\TextColumn::make('views')
                    ->numeric()
                    ->sortable()
                    ->toggleable()
                    ->default(0),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'news' => 'News',
                        'events' => 'Events',
                        'breast-cancer-info' => 'Breast Cancer Info',
                        'signs-symptoms' => 'Signs & Symptoms',
                        'risk-factors' => 'Risk Factors',
                        'sadari' => 'SADARI',
                        'detection-benefits' => 'Detection Benefits',
                        'guidelines' => 'Guidelines',
                    ]),

                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'archived' => 'Archived'
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListContents::route('/'),
            'create' => Pages\CreateContent::route('/create'),
            'edit' => Pages\EditContent::route('/{record}/edit'),
        ];
    }
}