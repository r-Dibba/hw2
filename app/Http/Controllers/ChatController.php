<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Session;
Class ChatController extends BaseController{
    public function show_chat(){
        if (!Session::get('userdata'))
            return redirect('login');
        $user = Session::get('userdata');

        return view('chat')->with('user', $user);
    }


}

?>