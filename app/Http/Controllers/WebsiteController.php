<?php

namespace App\Http\Controllers;

use App\Forms\WebsiteForm;
use App\Http\Requests\WebsiteRequest;
use App\Website;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Illuminate\Support\Facades\Auth;
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
        $id = Auth::guard('customer')->user()->id;
        $website = new Website([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'customer_id' => $id
        ]);
        app(WebsiteRepository::class)->create($website);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Website $website)
    {
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
        //
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
        //
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
