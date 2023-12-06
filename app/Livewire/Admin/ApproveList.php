<?php

namespace App\Livewire\Admin;

use App\Models\Barangay;
use App\Models\BeneficiaryType;
use App\Models\UserApplication;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Support\RawJs;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\CreateAction;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ViewAction;
use WireUi\Traits\Actions;


class ApproveList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    use Actions;

    public $view_modal = false;
    public $application_data;

    public function table(Table $table): Table
    {
        return $table
            ->query(UserApplication::query()->where('status', 'approved'))->columns([
                    TextColumn::make('assistance_type')->label('ASSISTANCE TYPE'),
                    TextColumn::make('beneficiary_type.name')->label('BENEFICIARY TYPE'),
                    TextColumn::make('barangay.name')->label('BARANGAY'),
                    TextColumn::make('client_name')->label('CLIENT NAME'),
                    TextColumn::make('address')->label('ADDRESS'),
                ])
            ->filters([
                // ...
            ])
            ->actions([
                ViewAction::make()->button()->color('warning')->action(
                    function ($record) {
                        $this->application_data = $record;
                        $this->view_modal = true;
                    }
                ),

            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.approve-list');
    }
}
