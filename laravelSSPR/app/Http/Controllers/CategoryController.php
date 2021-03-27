<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use App\Models\AvtoCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //страница для просмотра категорий
    public function avtocategorylist()
    {
        //получаем данные из справочников
        $categories = AvtoCategory::paginate(20);
        return view('avtocategorylist', ['cats' => $categories]);
    }

    public function avtocategorycreate()
    {
        $newCat = new AvtoCategory();

        return view('avtocategorycreate',
        [
            'curCat' => $newCat,
        ]);
    }

    public function storeavtocategory(Request $req)
    {
        $data = $req->input();

        $newCategory = new AvtoCategory($data);

        $newCategory->save();

        if($newCategory)
            return redirect()->route('categories.list');
        else
            return back()->withErrors(['msg' => "Ошибка создания объекта"])->withInput();
    }

    public function deleteavtocategory($id)
    {
        $deletingCat = AvtoCategory::find($id);

        if($deletingCat)
        {
            $deletingCat->delete();
        }

        return redirect()->route('categories.list');
    }

    public function avtocategoryedit($id)
    {
        $editingCat = AvtoCategory::find($id);

        if($editingCat)
        {
            return view('avtocategorycreate',
            [
                'curCat' => $editingCat,
            ]);
        }
    }

    public function updateavtocategory(Request $req, $id)
    {
        $editingCat = AvtoCategory::find($id);


        if(empty($editingCat))
        {
            return back()->withErrors(['msg' => "Ошибка, запись не найдена"])->withInput();
        }

        $data = $req->input();
        $result = $editingCat->fill($data);

        $result->save();

        if($result)
            return redirect()->route('categories.list');
        else
            return back()->withErrors(['msg' => "Ошибка, запись не была изменена"])->withInput();
    }
}
