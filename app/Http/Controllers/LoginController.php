<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;

Class LoginController extends BaseController{
    public function login_form(){
        if (Session::get('userdata'))
            return redirect('home');
        
        $status = Session::get('error');
        Session::forget('error');
        return view('login')->with('status', $status);
    }

    public function login(){
        
        $TO_LOG['user'] = trim(request('user'));
        $TO_LOG['pwd'] = trim(request('pwd'));

        if ((strlen($TO_LOG['user']) === 0) || (strlen($TO_LOG['pwd']) === 0))
            Session::put('error', 'empty');
        else{
            $user_row = User::find($TO_LOG['user']);
            if (!$user_row || !password_verify($TO_LOG['pwd'], $user_row->loginkey))
                Session::put('error', 'wrong cred');
            else{

                $userdata = ['user_id' => $user_row->id, 'current_user' => $user_row->username, 'propic' => $user_row->propic, 'name' => $user_row->nome];

                Session::put('userdata', $userdata);
            }

        }
        return redirect('login')->withInput();

    }

    public function logout(){
        Session::flush();
        return redirect('login');
    }
}

?>