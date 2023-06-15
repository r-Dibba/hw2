<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Session;
Class PostController extends BaseController{
    public function show_post(){
        if (!Session::get('userdata'))
            return redirect('login');
        $user = Session::get('userdata');

        return view('post')->with('user', $user);
    }


}

?>