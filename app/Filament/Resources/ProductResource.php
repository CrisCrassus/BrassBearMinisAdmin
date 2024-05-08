<?php

namespace App\Filament\Resources;

use App\Enums\Feature;
use App\Enums\Material;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Faker\Provider\ar_EG\Text;
use Filament\Actions\SelectAction;
use Filament\Forms;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Models';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Split::make([
                    Section::make([
                        TextInput::make('title')
                            ->label('Title')
                            ->columnSpan('half')
                            ->required(),
                        TextInput::make('identifier')
                            ->columnSpan('half')
                            ->disabled(),
                        Textarea::make('description')
                            ->label('Description')
                            ->columnSpanFull()
                            ->required(),
                        TextInput::make('ebay_link')
                            ->label('Ebay Link')
                            ->prefix('https://www.ebay.co.uk/')
                            ->required(),
                        TextInput::make('price')
                            ->label('Price')
                            ->numeric()
                            ->required(),
                    ]),
                ])->columnSpanFull(),

                Split::make([
                    Section::make([
                        Select::make('range_id')
                            ->label('Range')
                            ->relationship('range', 'title')
                            ->required(),
                        Select::make('unit_type_id')
                            ->label('Unit Type')
                            ->relationship('unitType', 'title')
                            ->required(),
                        Select::make('material')
                            ->label('Material')
                            ->options(Material::getLabels()),
                        TextInput::make('model_count')
                            ->label('Unit Size')
                            ->numeric()
                            ->required(),
                        TextInput::make('base_size')
                            ->label('Base Size')
                            ->numeric()
                            ->required(),
                        TagsInput::make('keywords')
                            ->label('Keywords')
                            ->placeholder('Add a keyword')
                            ->columnSpanFull(),
                        TagsInput::make('wargear')
                            ->label('War Gear')
                            ->placeholder('Add Wargear')
                            ->columnSpanFull(),
                        CheckboxList::make('features')
                            ->label('Features')
                            ->options(Feature::getLabels())

                    ]),
                ])->columnSpanFull(),

                Split::make([
                    Section::make([
                        Toggle::make('is_featured')
                            ->label('Featured'),
                        Toggle::make('published'),
                        Toggle::make('sold_at')
                            ->label('Sold'),
                    ]),
                ])->columnSpanFull(),




            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('price')
                    ->sortable(),
                TextColumn::make('identifier')
                    ->badge(),
                TextColumn::make('range.title')
                    ->sortable(),
                TextColumn::make('unitType.title')
                    ->sortable(),
                CheckboxColumn::make('is_featured')
                    ->label('Featured'),
                CheckboxColumn::make('published')
                    ->label('Published'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
