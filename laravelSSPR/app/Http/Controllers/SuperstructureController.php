<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Superstructure;

class SuperstructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //страница для просмотра надстроек
    public function superstructurelist()
    {
        //получаем данные из справочников
        $supers = Superstructure::paginate(20);
        return view('superstructurelist', ['supers' => $supers]);
    }

    public function superstructurecreate()
    {
        $newSuper = new Superstructure();


        return view('superstructurecreate',
        [
            'curSuper' => $newSuper,
        ]);
    }

    public function storesuperstructure(Request $req)
    {
        $data = $req->input();

        $newSuper = new Superstructure($data);

        $newSuper->save();

        if($newSuper)
            return redirect()->route('superstructures.list');
        else
            return back()->withErrors(['msg' => "Ошибка создания объекта"])->withInput();
    }

    public function deletesuperstructure($id)
    {
        $deletingSuper = Superstructure::find($id);

        if($deletingSuper)
        {
            $deletingSuper->delete();
        }

        return redirect()->route('superstructures.list');
    }

    public function superstructureedit($id)
    {
        $editingSuper = Superstructure::find($id);

        if($editingSuper)
        {
            return view('superstructurecreate',
            [
                'curSuper' => $editingSuper,
            ]);
        }
    }

    public function updatesuperstructure(Request $req, $id)
    {
        $editingSuper = Superstructure::find($id);


        if(empty($editingSuper))
        {
            return back()->withErrors(['msg' => "Ошибка, запись не найдена"])->withInput();
        }

        $data = $req->input();
        $result = $editingSuper->fill($data);

        $result->save();

        if($result)
            return redirect()->route('superstructures.list');
        else
            return back()->withErrors(['msg' => "Ошибка, запись не была изменена"])->withInput();
    }
}
