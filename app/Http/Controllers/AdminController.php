<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * View for Create Roles.
     *
     * @return \view\admin\role
     */
    public function role()
    {
        return view('admin.role');
    }

    /**
     * View for Create Roles.
     *
     * @return \Package\spatie
     */
    public function create_role()
    {
        return view('admin.role');
    }


}
