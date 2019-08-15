<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Forms\CustomerForm;
use App\Http\Requests\CustomerRequest;
use App\Repositories\CustomerRepository;
use App\Website;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class CustomerController extends Controller
{
    use FormBuilderTrait;

    protected $website;

    /**
     * WebsiteController constructor.
     */
    public function __construct()
    {
        config()->set('auth.defaults.guard', 'customer');
        $this->middleware(function ($request, $next) {
            $this->customer = auth()->user();
            return $next($request);
        });
        if (\Illuminate\Support\Facades\Request::getHttpHost() === 'admin.atomsit.com') {
            $environment = app(\Hyn\Tenancy\Environment::class);
            $website = Website::query()
                ->where('uuid', \Request::segment(1))
                ->firstOrFail();
            $environment->tenant($website);
            $this->website = $website;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $website = app(\Hyn\Tenancy\Environment::class)->tenant();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $customer = Auth::user();
        $this->authorize('update', $customer);
        $form = $this->form(CustomerForm::class, [
            'method' => 'PUT',
            'url' => route('admin.customers.update', ['id' => $customer->id]),
            'model' => $customer
        ])->remove('password');
        return view('application.customers.edit')
            ->with('customer', $customer)
            ->with('form', $form);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, Customer $model)
    {
        $customer = Auth::user();
        $this->authorize('update', $customer);
        $customer->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'description' => $request->get('description'),
            'birthdate' => Carbon::parse($request->get('birthdate')),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'url_facebook' => $request->get('url_facebook'),
            'url_instagram' => $request->get('url_instagram'),
            'url_twitter' => $request->get('url_twitter'),
            'url_linkedin' => $request->get('url_linkedin'),
            'url_website' => $request->get('url_website')
        ]);
        $customer->save();
        return redirect()->back()->with('success', 'Votre profil a était mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}