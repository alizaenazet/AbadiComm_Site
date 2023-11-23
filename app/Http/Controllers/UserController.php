<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WhatsappNumber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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

    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/login');
    }

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

    public function showSettingPage(){
        $user = User::all()->first();
        $whatsappContact = WhatsappNumber::where('name', 'contact')->get()->first();
        $whatsappPartner = WhatsappNumber::where('name', 'partner')->get()->first();
        return view ('components.pages.admin.settings')
            ->with('user', $user )
            ->with('whatsappContact', $whatsappContact)
            ->with('whatsappPartner', $whatsappPartner);
    }

    public function updateUserSetting(Request $request){
        $user = User::all()->first();

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|min:8|confirmed',
            'email' => 'nullable|email',
            'contact' => 'nullable|min:7|max:13',
            'partner' =>'nullable|min:7|max:13'
        ]);

        if ($validator->fails()) {
            return redirect('/dashboard/settings') 
                ->withErrors($validator)
                ->withInput();
        }
        $user->name = $request->username;
        $user->password = Hash::make($request->password);
        if ($request->filled('email')){
            $user->email = $request->email;
        }
        if ($request->filled('contact')) {
            $whatsappContact =  WhatsappNumber::firstOrCreate(
                ['name' => 'contact']
            );
            $whatsappContact->phone_number =  $request->contact;
            $whatsappContact->save();

        }
        if ($request->filled('partner')) {
            $whatsappPartner =  WhatsappNumber::firstOrCreate(
                ['name' => 'partner']
            );
            $whatsappPartner->phone_number =  $request->partner;
            $whatsappPartner->save();
        }
        $user->save();

        return redirect('/dashboard');
        

        


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
