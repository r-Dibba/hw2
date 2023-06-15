<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Session;
Class EventsController extends BaseController{
    public function show_events(){
        if (!Session::get('userdata'))
            return redirect('login');
        $user = Session::get('userdata');

        return view('events')->with('user', $user);
    }


}

?>
