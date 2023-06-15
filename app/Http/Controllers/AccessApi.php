<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

Class AccessApi extends BaseController{
    public function signup_validation($type, $toSearch){
        $toSearch = trim($toSearch);
        $TO_RETURN['type'] = $type;

        if (strlen($toSearch) === 0)
            $TO_RETURN['code'] = 'empty';
        else{
            if ($type === 'user')
                $found = User::find($toSearch);
            else if ($type === 'email')
                $found = User::where('email', $toSearch)->first();
        
            if ($found)
                $TO_RETURN['code'] = 'unavailable';
            else
                $TO_RETURN['code'] = 'none';
        }

        return $TO_RETURN;
    }

}

?>
