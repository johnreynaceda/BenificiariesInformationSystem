<?php

namespace App\Livewire\Admin;

use App\Models\BeneficiaryType;
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

class BeneficiaryList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(BeneficiaryType::query())->headerActions([
                    CreateAction::make('New beneficiary type')->color('main')->form([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        // ...
                    ])->modalWidth('2xl')
                ])
            ->columns([
                TextColumn::make('name')->label('BENEFICIARY TYPE'),
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
        return view('livewire.admin.beneficiary-list');
    }
}
