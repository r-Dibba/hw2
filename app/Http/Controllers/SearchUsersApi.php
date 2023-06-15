<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Follower;
use Illuminate\Database\Query\JoinClause;
use Session;

Class SearchUsersApi extends BaseController{
    public function get_users($toSearch, $limit, $offset){
        $TO_RETURN = array();
        if (!Session::get('userdata'))
            return $TO_RETURN;
        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];

        $TO_RETURN = User::leftJoin('followers', function(JoinClause $leftJoin) use ($current_user){
            $leftJoin->on('follows', '=', 'username')
            ->where('f_username', $current_user);
        })->where('username', 'like', "%$toSearch%")->where('username', '!=', $current_user)->limit($limit)->offset($offset)->get(['username', 'propic', 'follows']);

        return $TO_RETURN;

    }

    public function user_followers($user, $limit, $offset){
        $TO_RETURN = array();
        if (!Session::get('userdata'))
            return $TO_RETURN;
        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];
        
        $res = User::leftJoin('followers', function(JoinClause $leftJoin) use ($current_user){
            $leftJoin->on('follows', '=', 'username')
            ->where('f_username', $current_user);
        })->whereIn('username', Follower::select('f_username')->where('follows', $user))
            ->where('username', '!=', $current_user)->limit($limit)->offset($offset)->get(['username', 'propic', 'follows']);

        for ($i = 0; $i < count($res); $i++)
            $TO_RETURN[$i] = $res[$i];

        return $TO_RETURN;

    }

    public function user_followed($user, $limit, $offset){
        $TO_RETURN = array();
        if (!Session::get('userdata'))
            return $TO_RETURN;
        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];

        $res = User::leftJoin('followers', function(JoinClause $leftJoin) use ($current_user){
            $leftJoin->on('follows', '=', 'username')
            ->where('f_username', $current_user);
        })->whereIn('username', Follower::select('follows')->where('f_username', $user))
            ->where('username', '!=', $current_user)->limit($limit)->offset($offset)->get(['username', 'propic', 'follows']);

        for ($i = 0; $i < count($res); $i++)
            $TO_RETURN[$i] = $res[$i];

        return $TO_RETURN;

    }

    public function get_users_chat($toSearch, $limit, $offset){
        $TO_RETURN = array();
        if (!Session::get('userdata'))
            return $TO_RETURN;
        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];

        $like = User::where('username', 'like', "%$toSearch%")->where('username', '!=', $current_user)->limit($limit)->offset($offset)->get(['username', 'propic']);
        for($i = 0; $i < count($like); $i++){
            $TO_RETURN[$i] = $like[$i];
            $TO_RETURN[$i]['amtunread'] = User::find($like[$i]['username'])->sent()->where('isread', 0)->where('receiver', $current_user)->count();
        }

        return $TO_RETURN;
    }

    public function users_followers_chat($limit, $offset){
        $TO_RETURN = array();
        if (!Session::get('userdata'))
            return $TO_RETURN;
        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];

        $flws = User::find($current_user)->followedby()->limit($limit)->offset($offset)->get(['username', 'propic']);
        for($i = 0; $i < count($flws); $i++){
            $TO_RETURN[$i] = $flws[$i];
            $TO_RETURN[$i]['amtunread'] = User::find($flws[$i]['username'])->sent()->where('isread', 0)->where('receiver', $current_user)->count();
        }

        return $TO_RETURN;
    }

    public function users_followed_chat($limit, $offset){
        $TO_RETURN = array();
        if (!Session::get('userdata'))
            return $TO_RETURN;
        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];

        $flwd = User::find($current_user)->follows()->limit($limit)->offset($offset)->get(['username', 'propic']);
        for($i = 0; $i < count($flwd); $i++){
            $TO_RETURN[$i] = $flwd[$i];
            $TO_RETURN[$i]['amtunread'] = User::find($flwd[$i]['username'])->sent()->where('isread', 0)->where('receiver', $current_user)->count();
        }

        return $TO_RETURN;
    }

    public function users_unread($limit, $offset){
        $TO_RETURN = array();
        if (!Session::get('userdata'))
            return $TO_RETURN;
        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];

        $res = User::where('username', '!=', $current_user)->whereIn('username', User::find($current_user)->received()->where('isread', 0)->get('sender'))->get();

        for($i = 0; $i < count($res); $i++){
            $TO_RETURN[$i] = $res[$i];
            $TO_RETURN[$i]['amtunread'] = User::find($res[$i]['username'])->sent()->where('isread', 0)->where('receiver', $current_user)->count();
        }

        return $TO_RETURN;
    }

    public function is_user_followed($toSearch){
        $TO_RETURN = array();
        if (!Session::get('userdata'))
            return $TO_RETURN;
        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];

        return User::find($current_user)->follows_info()->where('follows', $toSearch)->first();
        


    }
}
