<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class UserController extends Controller
{
    public function login(Request $req){
        $credentials = $req->validate([
            'name' => 'required|min:5',
            'password' => 'required|min:8'
        ]);

        if (
            Auth::attempt($credentials)
        ) {
            $req->session()->regenerate();
            return redirect('dashboard');
        }



        return redirect('/login')->withErrors('');        

    }

    public function logout(){}

    public function sendEmail(){
        Password::sendResetLink(['email'=>'azetareklamongan@gmail.com']);
        $user = User::all()->first();
        return view('components.pages.forget-password-notice')->with('email', $this->hideEmail($user->email));
    }
   

    public function resetChooseEmail(){
        $user = User::all()->first();
        return view('components.pages.forget-password')
            ->with('email', $this->hideEmail($user->email));
    }

    public function resetPassword(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'passwordConfirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                ? redirect('/login')
                : back()->withErrors(['email' => [__($status)]]);
    }

    

    private function hideEmail($email) : string{
        list($username, $domain) = explode('@', $email);
        $usernameLength = strlen($username);

        // Ambil  2 karakter pertama dan terakhir nama pengguna
        $firstChar = substr($username, 0, 2);
        $lastChar = substr($username, -1);
    
        // Buat mask untuk karakter tengah
        $mask = str_repeat('*', $usernameLength - 3);
    
        // Gabungkan karakter pertama, mask, dan karakter terakhir
        $maskedUsername = $firstChar . $mask . $lastChar;
    
        // Gabungkan nama pengguna yang sudah dimask dan domain
        $maskedEmail = $maskedUsername . '@' . $domain;
    
        return $maskedEmail;
    }

   
}
