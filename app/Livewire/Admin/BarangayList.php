<?php

namespace App\Livewire\Admin;

use App\Models\Barangay;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\CreateAction;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;

class BarangayList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Barangay::query())->headerActions([
                    CreateAction::make('New Barangay')->color('main')->form([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('address')
                            ->required()
                            ->maxLength(255),
                        // ...
                    ])->modalWidth('2xl')
                ])
            ->columns([
                TextColumn::make('name')->label('NAME'),
                TextColumn::make('address')->label('ADDRESS'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }
    public function render()
    {
        return view('livewire.admin.barangay-list');
    }
}
