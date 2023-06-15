<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
require_once ("../resources/phpfiles/user_utils.php");


Class SignupController extends BaseController{
    public function signup_form(){

        if (Session::get('userdata'))
            return redirect('home');

        $status = Session::get('status');
        Session::forget('status');
        return view('signup')->with('status', $status);
    }

    public function signup(){        

        $postkeys = array("nome", "cognome", "user", "email", "pwd1", "pwd2");

        $STATUS = checkRequest($postkeys);
        $TO_RETURN['registration'] = false;

        foreach($postkeys as $key)
            if ($STATUS[$key] === 'empty')
                $TO_RETURN['errors'][$key] = 'empty';
            

       
            $TO_REGISTER = [];
            foreach ($STATUS as $key => $value)
                $TO_REGISTER[$key] = $value;

            if (strlen($TO_REGISTER['user']) > 12)
                $TO_RETURN['errors']['user'] = 'too long';

            if (!filter_var($TO_REGISTER['email'], FILTER_VALIDATE_EMAIL))
                $TO_RETURN['errors']['email'] = 'not valid';
            
            
            if ($TO_REGISTER['pwd1'] !== $TO_REGISTER['pwd2'])
                $TO_RETURN['errors']['pwd2'] = 'not equal';
            
            $pwd_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[,.:-_!?<>+^@]).{10,}$/";

            if (!preg_match($pwd_regex, $TO_REGISTER['pwd1']))
                $TO_RETURN['errors']['pwd1'] = "not valid";
            if (strlen($TO_REGISTER['pwd1']) < 10)
                $TO_RETURN['errors']['pwd1'] = "too short";

            if (!isset($TO_RETURN['errors']['user']))
                if (User::find(request('user')))
                    $TO_RETURN['errors']['user'] = 'unavailable';
                

            if (!isset($TO_RETURN['errors']['email'])){
                if (User::find(request('email')))
                    $TO_RETURN['errors']['email'] = 'unavailable';
                
            }
            if(!isset($TO_RETURN['errors'])){
                $user = new User;
                $user->nome = request('nome');
                $user->cognome = request('cognome');
                $user->username = request('user');
                $user->email = request('email');
                $user->loginkey = password_hash(request('pwd1'), PASSWORD_BCRYPT);
                $user->save();

                return redirect('login');
            }

        
        Session::put('status', $TO_RETURN);
        return redirect('signup')->withInput();
    }

}

?>