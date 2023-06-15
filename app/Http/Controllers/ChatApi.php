<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Message;
use Session;

Class ChatApi extends BaseController{

    public function load_conv($target){
        $TO_RETURN = array();
        if (!Session::get('userdata'))
            return $TO_RETURN;
        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];

        $received_conv = User::find($current_user)->received()->where('sender', $target)->where('isread', 0)->orderBy('messages.created_at', 'desc')->limit(10)->get();

        foreach($received_conv as $msg){
            $msg->isread = 1;
            $msg->save();
        }

        if (count($received_conv) == 0)
            $less_than = time();
        else{
            $TO_RETURN = $received_conv;
            $less_than = $received_conv[(count($received_conv) - 1)]->created_at;
        }

        $last_sent = User::find($current_user)->sent()->where('receiver', $target)->where('created_at', '<=', $less_than)->orderBy('messages.created_at', 'desc')->limit(10)->get();

        for($i = count($received_conv), $j = 0; $j < count($last_sent); $i++, $j++){
            $TO_RETURN[$i] = $last_sent[$j];
        }
        
        return $TO_RETURN;
    }

    public function send_msg(){

        $TO_RETURN = array();
        if (!Session::get('userdata'))
            return $TO_RETURN;
        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];

        $message = trim(request('message'));
        $target_user = trim(request('target-user'));

        $amt = Message::where('receiver', $target_user)->where('sender', $current_user)->where('isread', 0)->count();

        $TO_RETURN['status'] = false;
        $TO_RETURN['message'] = null;
        $TO_RETURN['unread'] = $amt;

        if (strlen($message) <= 255 && $amt < 10){
            $new_msg = new Message;
            $new_msg->sender = $current_user;
            $new_msg->receiver = $target_user;
            $new_msg->msgtext = $message;
            $new_msg->save();

            $TO_RETURN['status'] = true;
            $TO_RETURN['message'] = $message;
            $TO_RETURN['unread']++;
        }

        return $TO_RETURN;
            
    }

    public function listen($target_user){

        $TO_RETURN = array();
        if (!Session::get('userdata'))
            return $TO_RETURN;
        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];

        $msgs = User::find($target_user)->sent()->where('receiver', $current_user)->where('isread', 0)->get();

        if (count($msgs) > 0)
            foreach($msgs as $msg)
                $msg->isread = 1;
            
        return $msgs;

    }

    public function mark_as_read($target_user){

        $TO_RETURN = array();
        if (!Session::get('userdata'))
            return $TO_RETURN;
        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];

        $toRead = User::find($target_user)->sent()->where('receiver', $current_user)->get();
        foreach($toRead as $msg){
            $msg->isread = 1;
            $msg->save();
        }
    }

}

?>