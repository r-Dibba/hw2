<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Session;

Class UserdataApi extends BaseController{
    public function get_userdata(){
        if (!Session::get('userdata'))
            return [];
        $user = Session::get('userdata');

        return $user;
    }


}

?>