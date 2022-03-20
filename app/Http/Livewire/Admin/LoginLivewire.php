<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginLivewire extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function submit()
    {
        $this->validate();

        $email = strtolower(trim($this->email));
        $password = strtoupper(sha1(trim($this->password)));

        $user = User::where('email', $email)->where('password', $password)->first();

        if (is_null($user)) {
            // session()->flash('error', "Unauthorized / Invalid code");
            session()->flash('error_i', "Incorrect email or password");
        } else {
            // $this->alert('success', "Welcome " . $user->name);
            session()->flash('success', "Welcome " . $user->name);

            Auth::login((object)$user);
            return redirect()->to('/home');
        }


        if ($this->email !== "test@qrms.com") {
            session()->flash('error', "Wrong email address");
        } else if ($this->password !== "ms1T78jdl") {
            session()->flash('error', "Wrong password");
        } else {
            session()->flash('success', "Welcome TestUser");
        }
    }
    public function render()
    {
        return view('livewire.admin.login-livewire');
    }
}