<?php

namespace App\Livewire;

use App\Models\Announcement;
use App\Models\Barangay;
use App\Models\BeneficiaryType;
use App\Models\UserApplication;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
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
// use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
// use Filament\Forms\Concerns\InteractsWithForms;
// use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;

// use Illuminate\Contracts\View\View;

class AnnouncementList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    use Actions;

    public $what, $where, $when, $details, $recipients;

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('what')->required(),
                DatePicker::make('when')->required(),
                TextInput::make('where')->required(),
                Textarea::make('details')->required(),
                TextInput::make('recipients')->required(),
            ]);

    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Announcement::query())->columns([
                    TextColumn::make('what')->searchable(),
                    TextColumn::make('when')->searchable(),
                    TextColumn::make('where')->searchable(),
                    TextColumn::make('details')->searchable(),
                    TextColumn::make('recipients')->searchable(),
                ])
            ->filters([
                // ...
            ])
            ->actions([
                //.....
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.announcement-list');
    }

    public function submit()
    {

        $this->validate([
            'what' => 'required',
            'when' => 'required',
            'where' => 'required',
            'details' => 'required',
            'recipients' => 'required',
        ]);
        // dd('sds');
        Announcement::create([
            'what' => $this->what,
            'when' => $this->when,
            'where' => $this->where,
            'details' => $this->details,
            'recipients' => $this->recipients
        ]);

        $api_key = 'a93034f63880d2a98183acfdf3e2c323';
        $sender = 'SEMAPHORE';
        $ch = curl_init();
        $parameters = [
            'apikey' => $api_key,
            'number' => $this->recipients,
            'message' => "What: " . $this->what . "\n Where: " . $this->when . "\n Where: " . $this->where . "\n Details: " . $this->details . "\n Recipient: " . $this->recipients,
            'sendername' => $sender,
        ];
        curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);

        $this->dialog()->success(
            $title = 'Created Succesfully',
            $description = 'Announcement has been sent'
        );
        $this->reset('what', 'when', 'where', 'details', 'recipients');
        return $output;



    }
}
