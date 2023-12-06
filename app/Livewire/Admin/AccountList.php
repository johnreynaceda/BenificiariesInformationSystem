<?php

namespace App\Livewire\Admin;

use App\Models\User;
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

class AccountList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(User::query())
            ->columns([
                TextColumn::make('name')->label('NAME'),
                TextColumn::make('email')->label('EMAIL'),
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
        return view('livewire.admin.account-list');
    }
}
