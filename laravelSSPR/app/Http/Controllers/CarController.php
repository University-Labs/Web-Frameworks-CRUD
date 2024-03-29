<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Models\AvtoFirm;
use App\Models\Car;
use App\Models\AvtoCategory;
use App\Models\Superstructure;
use App\Models\BaseAvto;

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

    //каталог всех продуктов
    public function catalog()
    {
        return view('catalog',
            [
                'cars' => Car::all()
            ]);
    }

    //просмотр продуктов администратором
    public function pageadmin()
    {
        return view('pageadmin',
            [
                'cars' => Car::all()
            ]);
    }


    //подробности конкретного продукта
    public function productinfo($id)
    {
        return view('productinfo',
            [
                'singleCar' => Car::find($id)
            ]);
    }


    //метод рендеринга формы для добавления
    public function createcar()
    {
        $newCar = new Car();

        //получаем опции для селектов
        $categories = AvtoCategory::all();
        $superstructures = Superstructure::all();
        $baseavtos = BaseAvto::all();


        return view('productedit',
        [
            'curCar' => $newCar,
            'categories' => $categories,
            'superstructures' => $superstructures,
            'baseavtos' => $baseavtos,
        ]);
    }

    //метод добавления (create)
    public function storecar(Request $req)
    {
        //заполнение данными
        $data = $req->all();
        $newCar = new Car($data);

        //запись файла
        if($req->file('image'))
        {
            $imagePath = $req->file('image')->store('uploads', 'public');

            $newCar->imagePath = $imagePath;
        }

        $newCar->save();

        if ($newCar)
            return redirect()->route('cars.list');
        else
            return back()->withErrors(['msg' => "Ошибка создания объекта"])->withInput();
    }


    //метод рендеринга формы для редактирования
    public function editcar($id)
    {
        $curCar = Car::find($id);

        //получаем опции для селектов
        $categories = AvtoCategory::all();
        $superstructures = Superstructure::all();
        $baseavtos = BaseAvto::all();

        return view('productedit',
        [
            'curCar' => $curCar,
            'categories' => $categories,
            'superstructures' => $superstructures,
            'baseavtos' => $baseavtos,
        ]);
    }

    //метод редактирования (update)
    public function updatecar(Request $req, $id)
    {
        $editCar = Car::find($id);

        if(empty($editCar))
        {
            return back()->withErrors(['msg' => "Ошибка, запись не найдена"])->withInput();
        }

        $data = $req->all();
        $result = $editCar->fill($data);

        //запись файла
        if($req->file('image') != "")
        {
            if($result->imagePath != null)
                Storage::disk('public')->delete($result->imagePath);
            $imagePath = $req->file('image')->store('uploads', 'public');

            $result->imagePath = $imagePath;
        }

        $result->save();

        if($result)
            return redirect()->route('cars.list');
        else
            return back()->withErrors(['msg' => "Ошибка, запись не была изменена"])->withInput();
    }


    //метод удаления (delete)
    public function deletecar($id)
    {
        $deletingCar = Car::find($id);

        if($deletingCar)
        {
            if($deletingCar->imagePath != null)
                Storage::disk('public')->delete($deletingCar->imagePath);
            $deletingCar->delete();
        }

        return redirect()->route('cars.list');
    }

}
