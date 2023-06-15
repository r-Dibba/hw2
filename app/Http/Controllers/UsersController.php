<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Session;
require_once('../resources/phpfiles/user_utils.php');

Class UsersController extends BaseController{
    public function show_users(){
        if (!Session::get('userdata'))
            return redirect('login');
        $user = Session::get('userdata');

        return view('search_users')->with(['user' => $user, 'welcome' => welcome_user($user['name'])]);
    }


}

?>

