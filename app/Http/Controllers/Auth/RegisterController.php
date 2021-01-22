<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use App\feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
    }

    public function showRegistrationForm()
    {
        return redirect()->route('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd("hi");
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255',
                'unique:users'
            ],
            'phone' => ['required', 'string', 'regex:/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/i', 'unique:users'],
            'username' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'username' => $data['username'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        $feedback = new feedback;
        $user->feedback()->save($feedback);
        $this->guard()->login($user);
        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        return $request->wantsJson()
            ? new Response('', 201)
            : redirect($this->redirectPath());
    }

    function showAdminRegisterForm()
    {
        return view('admin.auth.register');
    }

    protected function createAdmin(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'email', 'max:255',
                'unique:admins'
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'unique:admins'],
        ]);
        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended(route("admin.login-get"));
    }
}
