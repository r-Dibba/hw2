<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;

Class NotifApi extends BaseController{
    public function get_notifications($type){
        $TYPES = ["get-msg" => 0, "get-other" => 1, "check-other" => 2];

        $TO_RETURN = [];
        $userdata = Session::get('userdata');
    
        if ($userdata && $type){
            
            $TO_RETURN['type'] = $type;            
            $current_user = $userdata['current_user'];

            switch($TYPES[$type]){
                case 0:
                    $TO_RETURN['res'] = User::find($current_user)->received()->where('isread', 0)->count();
                    break;
                case 1:
                    $TO_RETURN['res'] = User::find($current_user)->notifications()->count();
                    break;
                case 2:
                    $to_delete = User::find($current_user)->notifications();
                    $to_delete->delete();
                    break;
            }
    
        }
    
        return $TO_RETURN;
    }


}

?>
