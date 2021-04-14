<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\UserOrder;

class ProfileController extends Controller
{

    //страница для просмотра профиля пользователя
    public function index($id)
    {
        $user = User::find($id);

        if($user == null)
            return abort(404);
        $orders = UserOrder::where('PK_User', $user->id)->orderBy('creation_date');
        return view('userprofile', ['user' => $user, 'orders' => $orders]);
    }

    public function buycar($id)
    {
        $user = auth()->user();

        if($user != null)
        {
            if(!$user->buyCar($id))
                abort(404);
            else
                return back()->with('message', "Товар успешно заказан!");
        }
        else abort(404);
    }

}
