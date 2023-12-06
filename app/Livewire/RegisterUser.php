<?php

namespace App\Livewire;

use App\Models\OptRequest;
use App\Models\User;
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

class RegisterUser extends Component implements HasForms
{
    use Actions;
    use InteractsWithForms;
    use WithFileUploads;
    public $otp_verification = false;

    public $name, $email, $contact, $password, $confirm_password;
    public $one, $two, $three, $four, $date;

    public function inputUpdated($currentInput, $nextInput)
    {
        if ($this->$currentInput) {
            $this->dispatchBrowserEvent('autofocusInput', ['inputName' => $nextInput]);
        }
    }

    public function render()
    {
        return view('livewire.register-user');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Name')->required(),
                TextInput::make('email')->label('Email')->email()->required(),
                TextInput::make('contact')->label('Contact')->mask(RawJs::make(<<<'JS'
                $input.startsWith('0')  ? '99999999999' : '99999999999'
            JS)),
                TextInput::make('password')->label('Password')->password()->required(),

                TextInput::make('confirm_password')->label('Confirm Password')->password()->required()->same('password'),


            ]);

    }


    public function createAccount()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        $data = OptRequest::where('contact', $this->contact)->first();

        if ($data->count() > 0) {
            $random = rand(1000, 9999);
            $data->update([
                'otp' => $random,
            ]);
            $this->otp_verification = true;
            $api_key = 'a93034f63880d2a98183acfdf3e2c323';
            $sender = 'SEMAPHORE';
            $ch = curl_init();
            $parameters = [
                'apikey' => $api_key,
                'number' => $this->contact,
                'message' => 'Dear User, your OTP for account verification is ' . $random . '.' . ' Thank you for using our service.',
                'sendername' => $sender,
            ];
            curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);
            return $output;
        } else {
            $random = rand(1000, 9999);
            OptRequest::create([
                'contact' => $this->contact,
                'otp' => $random,
            ]);
            $this->otp_verification = true;
            $api_key = 'a93034f63880d2a98183acfdf3e2c323';
            $sender = 'SEMAPHORE';
            $ch = curl_init();
            $parameters = [
                'apikey' => $api_key,
                'number' => $this->contact,
                'message' => 'Dear User, your OTP for account verification is ' . $random . '.' . ' Thank you for using our service.',
                'sendername' => $sender,
            ];
            curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);
            return $output;

        }
    }

    public function verifyAccount()
    {
        $this->validate([
            'one' => 'required|numeric|digits:1',
            'two' => 'required|numeric|digits:1',
            'three' => 'required|numeric|digits:1',
            'four' => 'required|numeric|digits:1',
        ]);
        $otp = $this->one . $this->two . $this->three . $this->four;
        $verify = OptRequest::where('contact', $this->contact)->where('otp', $otp)->first();
        if ($verify) {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'contact' => $this->contact,
            ]);
            auth()->loginUsingId($user->id);
            $this->otp_verification = false;
            sleep(5);
            return redirect()->route('dashboard');
        } else {
            $this->reset(['one', 'two', 'three', 'four']);
            $this->dialog()->error(
                $title = 'Invalid OTP',
                $description = 'Please enter the correct OTP sent to your phone number',
            );
        }
    }
}
