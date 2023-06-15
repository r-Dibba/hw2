<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Session;
Class HomeController extends BaseController{
    public function show_home(){
        if (!Session::get('userdata'))
            return redirect('login');
        $user = Session::get('userdata');
        return view('home')->with('user', $user);
    }


}

?>