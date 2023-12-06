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

class ApplicationList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    use Actions;

    public $view_modal = false;
    public $application_data;

    public function table(Table $table): Table
    {
        return $table
            ->query(UserApplication::query()->where('status', 'pending'))->columns([
                    TextColumn::make('assistance_type')->label('ASSISTANCE TYPE')->searchable(),
                    TextColumn::make('beneficiary_type.name')->label('BENEFICIARY TYPE')->searchable(),
                    TextColumn::make('barangay.name')->label('BARANGAY')->searchable(),
                    TextColumn::make('client_name')->label('CLIENT NAME')->searchable(),
                    TextColumn::make('address')->label('ADDRESS')->searchable(),
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
                ActionGroup::make([
                    Action::make('accept')->color('success')->icon('heroicon-s-hand-thumb-up')->action(
                        function ($record) {
                            $record->update([
                                'status' => 'approved'
                            ]);

                            $api_key = 'a93034f63880d2a98183acfdf3e2c323';
                            $sender = 'SEMAPHORE';
                            $ch = curl_init();
                            $parameters = [
                                'apikey' => $api_key,
                                'number' => $record->contact,
                                'message' => 'Dear User, your application for ' . $record->assistance_type . ' has been approved. Please go to our nearest office for other information. Thank you.',
                                'sendername' => $sender,
                            ];
                            curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $output = curl_exec($ch);
                            curl_close($ch);

                            $this->dialog()->success(
                                $title = 'Approved Successfully',
                                $description = 'Application is now approved.'
                            );

                            return $output;


                        }
                    ),
                    Action::make('decline')->color('danger')->icon('heroicon-s-hand-thumb-down')->action(
                        function ($record) {
                            $record->update([
                                'status' => 'disapproved'
                            ]);

                            $api_key = 'a93034f63880d2a98183acfdf3e2c323';
                            $sender = 'SEMAPHORE';
                            $ch = curl_init();
                            $parameters = [
                                'apikey' => $api_key,
                                'number' => $record->contact,
                                'message' => 'Dear User, your application for ' . $record->assistance_type . ' has been declined. Please contact our administrator for more information and try again. Thank you!',
                                'sendername' => $sender,
                            ];
                            curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $output = curl_exec($ch);
                            curl_close($ch);

                            $this->dialog()->success(
                                $title = 'Disapproved Successfully',
                                $description = 'Application is now disapproved.'
                            );

                            return $output;
                        }
                    ),

                ])
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.application-list');
    }
}
