<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AvtoFirm;
use App\Models\Car;

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
        return view('catalog',
            [
                'cars' => Car::all()
            ]);
    }

    public function pageadmin()
    {
        return view('pageadmin');
    }

    public function productinfo($id)
    {
        return view('productinfo',
            [
                'id' => $id,
                'firms' => AvtoFirm::all()
            ]);
    }

}
