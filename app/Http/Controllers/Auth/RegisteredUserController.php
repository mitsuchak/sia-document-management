<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Mail\AcknowledgeMail;
use App\Mail\NewRegistrationMail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegistrationRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'email' => $request->email,
            // 'username' => $request->username,
            'mobile_number' => $request->mobile_number,
            'company_name' => $request->company_name,
            'designation' => $request->designation,
            'website' => $request->website,
            'role_id' => 2,
        ]);

        $email = $request->email;



        event(new Registered($user));

        return redirect()->route('register.successfully', ['email'=>$email]);
    }

    public function registerSuccessfully(Request $request){
        $email = $request->get('email');
        return view('auth.confirm-mail', compact('email'));
    }
}
