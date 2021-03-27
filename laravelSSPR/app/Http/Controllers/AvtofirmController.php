<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\AvtoFirm;

class AvtofirmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //страница для просмотра автофирм
    public function avtofirmlist()
    {
        //получаем данные из справочников
        $firms = AvtoFirm::paginate(20);
        return view('avtofirmlist', ['firms' => $firms]);
    }

    public function avtofirmcreate()
    {
        $newFirm = new AvtoFirm();


        return view('avtofirmcreate',
        [
            'curFirm' => $newFirm,
        ]);
    }

    public function storeavtofirm(Request $req)
    {
        $data = $req->input();

        $newFirm = new AvtoFirm($data);

        $newFirm->save();

        if($newFirm)
            return redirect()->route('avtofirms.list');
        else
            return back()->withErrors(['msg' => "Ошибка создания объекта"])->withInput();
    }

    public function deleteavtofirm($id)
    {
        $deletingFirm = AvtoFirm::find($id);

        if($deletingFirm)
        {
            $deletingFirm->delete();
        }

        return redirect()->route('avtofirms.list');
    }

    public function avtofirmedit($id)
    {
        $editingFirm = AvtoFirm::find($id);

        if($editingFirm)
        {
            return view('avtofirmcreate',
            [
                'curFirm' => $editingFirm,
            ]);
        }
    }

    public function updateavtofirm(Request $req, $id)
    {
        $editingFirm = AvtoFirm::find($id);


        if(empty($editingFirm))
        {
            return back()->withErrors(['msg' => "Ошибка, запись не найдена"])->withInput();
        }

        $data = $req->input();
        $result = $editingFirm->fill($data);

        $result->save();

        if($result)
            return redirect()->route('avtofirms.list');
        else
            return back()->withErrors(['msg' => "Ошибка, запись не была изменена"])->withInput();
    }
}
