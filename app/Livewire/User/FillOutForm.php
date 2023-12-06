<?php

namespace App\Livewire\User;

use App\Models\Barangay;
use App\Models\BeneficiaryType;
use App\Models\HouseholdComposition;
use App\Models\ProblemPresented;
use App\Models\UploadedId;
use App\Models\UserApplication;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Livewire\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Fieldset;
use Filament\Support\RawJs;
use Filament\Forms\Components\Repeater;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\FileUpload;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class FillOutForm extends Component implements HasForms
{
    use Actions;
    use InteractsWithForms;
    use WithFileUploads;
    public $assistance, $referral, $name, $barangay, $beneficiary, $birthdate, $age, $sex, $educational, $civil_status, $relationship, $contact, $address, $occupation, $income, $employment;
    public $person = [];
    public $problem = [];

    public $attachment = [];

    public $forms = [], $requirements = [];

    public function mount()
    {
        $this->assistance = request('form');
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)
                    ->schema([
                        TextInput::make('assistance')->label('Type of Assistance')->placeholder($this->assistance)->disabled(),
                        Select::make('referral')->label('Source of Referral')->options([
                            'Walk In' => 'Walk In',
                            'Referred By' => 'Referred By',
                        ]),
                        Select::make('beneficiary')->label('Beneficiary Type')->options(BeneficiaryType::pluck('name', 'id')),
                        Select::make('barangay')->label('Barangay')->options(Barangay::pluck('name', 'id')),
                    ]),
                Fieldset::make('PERSONAL INFORMATION')
                    ->schema([
                        TextInput::make('name')->label('Name of Client')->required(),
                        DatePicker::make('birthdate')->label('birthdate')->required()->live(),
                        TextInput::make('age')->label('Age')->required(),
                        Select::make('sex')->label('Sex')->required()->options([
                            'Male' => 'Male',
                            'Female' => 'Female',
                        ]),
                        TextInput::make('educational')->label('Educational Attaintment')->required(),
                        Select::make('civil_status')->label('Civil Status')->required()
                            ->options([
                                'Single' => 'Single',
                                'Married' => 'Married',
                                'Widowed' => 'Widowed',
                                'Divorceced' => 'Divorced'
                            ]),
                        TextInput::make('relationship')->label('Relation to Beneficiary')->required(),
                        TextInput::make('contact')->label('Contact Number')->mask(RawJs::make(<<<'JS'
                        $input.startsWith('0')  ? '99999999999' : '99999999999'
                    JS)),
                        TextInput::make('address')->label('Complete Address (Province, Municipality, Barangay) [House No./Sitio/Vill./Subd.]')->required()->columnSpan(4),
                        TextInput::make('occupation')->label('Occupation')->required(),
                        TextInput::make('income')->label('Monthly Income')->required(),
                        Select::make('employment')->label('Employment Status')->required()->columnSpan(2)
                            ->options([
                                'Employed' => 'Employed',
                                'Unemployed' => 'Unemployed',
                                'Self Employed' => 'Self Employed',
                            ]),


                    ])->columns(4),
                Fieldset::make('HOUSEHOLD COMPOSITION')
                    ->schema([
                        Repeater::make('person')
                            ->schema([
                                Grid::make(4)->schema([
                                    TextInput::make('name')->label('Name')->required(),
                                    Select::make('sex')->label('Sex')->required()->options([
                                        'Male' => 'Male',
                                        'Female' => 'Female',
                                    ]),
                                    DatePicker::make('birthdate')->label('birthdate')->required(),
                                    TextInput::make('age')->label('Age')->required(),
                                    Select::make('civil_status')->label('Civil Status')->required()
                                        ->options([
                                            'Single' => 'Single',
                                            'Married' => 'Married',
                                            'Widowed' => 'Widowed',
                                            'Divorceced' => 'Divorced'
                                        ]),
                                    TextInput::make('relationship')->label('Relation to Beneficiary')->required(),
                                    TextInput::make('educational')->label('Educational Attaintment')->required(),
                                    TextInput::make('occupation')->label('Occupation')->required(),
                                    TextInput::make('income')->label('Monthly Income')->required(),
                                ]),

                            ])
                            ->addActionLabel('Add Person')
                    ])->columns(1),
                Fieldset::make('PROBLEM PRESENTED')
                    ->schema([
                        Repeater::make('problem')
                            ->schema([
                                TextInput::make('problem')->label('Problem')->required(),
                            ])
                            ->addActionLabel('Add Problem')
                    ])->columns(1),
                Grid::make(2)->schema([
                    FileUpload::make('attachment')->label('Upload IDs')->multiple()->required()->helperText('Valid Government Documents'),

                ]),
            ]);

    }

    public function updatedBirthdate()
    {
        $this->age = \Carbon\Carbon::parse($this->birthdate)->age;
    }

    public function submitForm()
    {


        $this->validate([
            'assistance' => 'required',
            'referral' => 'required',
            'beneficiary' => 'required',
            'barangay' => 'required',
            'name' => 'required',
            'birthdate' => 'required',
            'age' => 'required',
            'sex' => 'required',
            'educational' => 'required',
            'civil_status' => 'required',
            'relationship' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'occupation' => 'required',
            'income' => 'required',
            'employment' => 'required',
            'person' => 'required',
            'problem' => 'required',

        ]);

        $application = UserApplication::create([
            'user_id' => auth()->user()->id,
            'assistance_type' => $this->assistance,
            'referral_source' => $this->referral,
            'beneficiary_type_id' => $this->beneficiary,
            'barangay_id' => $this->barangay,
            'client_name' => $this->name,
            'birthdate' => $this->birthdate,
            'age' => $this->age,
            'sex' => $this->sex,
            'contact' => $this->contact,
            'address' => $this->address,
            'educational' => $this->educational,
            'civil_status' => $this->civil_status,
            'relationship' => $this->relationship,
            'occupation' => $this->occupation,
            'income' => $this->income,
            'employment' => $this->employment,
        ]);

        foreach ($this->person as $key => $value) {
            HouseholdComposition::create([
                'user_application_id' => $application->id,
                'name' => $value['name'],
                'sex' => $value['sex'],
                'birthdate' => $value['birthdate'],
                'age' => $value['age'],
                'civil_status' => $value['civil_status'],
                'relationship' => $value['relationship'],
                'educational' => $value['educational'],
                'occupation' => $value['occupation'],
                'income' => $value['income'],
            ]);
        }

        foreach ($this->problem as $key => $value) {
            ProblemPresented::create([
                'user_application_id' => $application->id,
                'problem' => $value['problem'],
            ]);
        }

        foreach ($this->attachment as $key => $value) {
            UploadedId::create([
                'user_application_id' => $application->id,
                'path' => $value->store('IDS', 'public'),
            ]);
        }

        $this->dialog()->success(
            $title = 'Successfully created',
            $description = 'Your application was successfully submitted'
        );
        return redirect()->route('user.dashboard');
    }

    public function downloadFile()
    {
        $file_name = 'Socialcasestudy_form.docx';
        $file_path = public_path($file_name);


        return response()->download($file_path, $file_name);
    }

    public function render()
    {
        return view('livewire.user.fill-out-form');
    }
}
