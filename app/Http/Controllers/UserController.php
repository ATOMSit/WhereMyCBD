<?php

namespace App\Http\Controllers;

use App\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
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
