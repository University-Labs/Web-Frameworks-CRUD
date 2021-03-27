<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\BaseAvto;
use App\Models\AvtoFirm;

class BaseavtoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //страница для просмотра баз авто
    public function baseavtolist()
    {
        //получаем данные из справочников
        $bases = BaseAvto::paginate(20);
        return view('baseavtolist', ['bases' => $bases]);
    }

    public function baseavtocreate()
    {
        $newBase = new BaseAvto();

        $listFirms = AvtoFirm::all();

        return view('baseavtocreate',
        [
            'curBase' => $newBase,
            'firms' => $listFirms,
        ]);
    }

    public function storebaseavto(Request $req)
    {
        $data = $req->input();

        $newBase = new BaseAvto($data);

        $newBase->save();

        if($newBase)
            return redirect()->route('bases.list');
        else
            return back()->withErrors(['msg' => "Ошибка создания объекта"])->withInput();
    }

    public function deletebaseavto($id)
    {
        $deletingBase = BaseAvto::find($id);

        if($deletingBase)
        {
            $deletingBase->delete();
        }

        return redirect()->route('bases.list');
    }

    public function baseavtoedit($id)
    {
        $editingBase = BaseAvto::find($id);
        $listFirms = AvtoFirm::all();

        if($editingBase)
        {
            return view('baseavtocreate',
            [
                'curBase' => $editingBase,
                'firms' => $listFirms,
            ]);
        }
    }

    public function updatebaseavto(Request $req, $id)
    {
        $editingBase = BaseAvto::find($id);


        if(empty($editingBase))
        {
            return back()->withErrors(['msg' => "Ошибка, запись не найдена"])->withInput();
        }

        $data = $req->input();
        $result = $editingBase->fill($data);

        $result->save();

        if($result)
            return redirect()->route('bases.list');
        else
            return back()->withErrors(['msg' => "Ошибка, запись не была изменена"])->withInput();
    }
}
