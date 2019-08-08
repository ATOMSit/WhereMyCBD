<?php

namespace App\Http\Controllers;

use App\Forms\WebsiteForm;
use App\Hostname;
use App\Http\Requests\WebsiteRequest;
use App\Invoice;
use App\Website;
use Carbon\Carbon;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class WebsiteController extends Controller
{
    use FormBuilderTrait;

    private $customer;

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
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = $this->form(WebsiteForm::class, [
            'method' => 'POST',
            'url' => route('website.store')
        ]);
        $form->modify('offer', Field::SELECT, ['selected' => 'blog']);
        $form->modify('renewal', Field::SELECT, ['selected' => 'automatic']);
        return view('application.websites.create', ['form' => $form]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebsiteRequest $request)
    {
        DB::beginTransaction();
        try {
            $id = Auth::guard('customer')->user()->id;
            $website = new Website([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'customer_id' => $id,
                'offer' => $request->get('offer'),
                'status' => 'active',
                'renewal' => $request->get('renewal'),
                'expires_on' => Carbon::now()->addYear()
            ]);
            app(WebsiteRepository::class)->create($website);
            $hostname = new Hostname([
                'customer_id' => $id,
                'fqdn' => $request->get('hostname')['fqdn']
            ]);
            $hostname = app(HostnameRepository::class)->create($hostname);
            app(HostnameRepository::class)->attach($hostname, $website);


            if ($request->get('offer') === 'ecommerce') {
                $initial_price = 29.99;
            } elseif ($request->get('offer') === 'premium') {
                $initial_price = 19.99;
            } else {
                $initial_price = 5.99;
            }

            $invoice = new Invoice([
                'initial_price' => $initial_price,
                'pay_before' => Carbon::now(),
                'paid_at' => Carbon::now()
            ]);
            $website->invoices()->save($invoice);
            DB::commit();
            return $request;
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Website $website)
    {
        return view('application.websites.dashboard');
        return $website;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Website $website)
    {
        $form = $this->form(WebsiteForm::class, [
            'method' => 'PUT',
            'url' => route('admin.website.update', ['website' => $website]),
            'model' => $website
        ]);
        $form->add('status', Field::SELECT, [
            'choices' => [
                'active' => 'Active',
                'inactive' => 'Inactive',
            ],
            'selected' => 'active',
        ]);
        return view('application.websites.edit')
            ->with('website', $website)
            ->with('form', $form);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(WebsiteRequest $request, Website $website)
    {
        $website->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'offer' => $request->get('offer'),
            'status' => $request->get('status'),
            'renewal' => $request->get('renewal')
        ]);
        $website->save();
        return redirect()->back()->with('success', "La configuration concernant votre site internet ont étaient mise à jour correctement.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Website $website)
    {
        //
    }
}
