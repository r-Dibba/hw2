<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\Follower;
Class FollowersApi extends BaseController{
    public function follower_interaction($type, $target){
        if (!Session::get('userdata'))
            return false;
        
        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];

        if ($type === 'unfollow')
            Follower::where('f_username', $current_user)->where('follows', $target)->delete();
        else if($type === 'follow'){
            $toInsert = new Follower;
            $toInsert->f_username = $current_user;
            $toInsert->follows = $target;
            $toInsert->save();
        }
        return true;        
    }
}

?>