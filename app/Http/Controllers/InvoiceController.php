<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Invoice;
use Stripe\Stripe;
use Stripe\Subscription;

class InvoiceController extends Controller
{
    /**
     * InvoiceController constructor.
     */
    public function __construct()
    {
        config()->set('auth.defaults.guard', 'customer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::query()->findOrFail(Auth::id());
        if ($customer->stripe_id !== null) {
            Stripe::setApiKey(config('services.stripe.secret'));
            $invoices = Invoice::all(['customer' => $customer->stripe_id]);
            return view('application.invoices.index')
                ->with('invoices', $invoices);
        }
        return view('application.invoices.index');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
