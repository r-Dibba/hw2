<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
require_once('../resources/phpfiles/user_utils.php');

Class ProfileController extends BaseController{
    public function show_profile($clicked = false){
        if (!Session::get('userdata'))
            return redirect('login');
        $user = Session::get('userdata');

        if ($clicked)
            $find = $clicked;
        else
            $find = $user['current_user'];

        $res = User::find($find);

        $clicked_profile['username'] = $res->username;
        $clicked_profile['motto'] = $res->motto;
        $clicked_profile['propic'] = $res->propic;
        $clicked_profile['amt_follows'] = $res->amt_follows;
        $clicked_profile['amt_followedby'] = $res->amt_followedby;
        $clicked_profile['rank'] = getRank($res->created_at);

        return view('user_profile')->with(['user' => $user, 'clicked_profile' => $clicked_profile]);
    }


}

?>