<?php

namespace App\Http\Controllers\CustomerAuth;

use App\Customer;
use App\Forms\AuthForms\RegisterForm;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\UserRequest;
use App\Repositories\CustomerRepositoryInterface;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use FormBuilderTrait;

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

    protected $customer;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/customer/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->middleware('customer.guest');
        $this->customer = $customerRepository;
    }

    public function store(CustomerRequest $request)
    {
        $user = $this->customer->store($request);
        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $form = $this->form(RegisterForm::class, [
            'method' => 'POST',
            'url' => route('admin.register_store')
        ]);
        return view('customer.auth.register')->with('form', $form);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('customer');
    }
}
