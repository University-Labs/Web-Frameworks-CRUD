<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function catalog()
    {
        return view('catalog');
    }

    public function pageadmin()
    {
        return view('pageadmin');
    }

    public function productinfo($id)
    {
        return view('productinfo',
            [
                'id' => $id
            ]);
    }

}
