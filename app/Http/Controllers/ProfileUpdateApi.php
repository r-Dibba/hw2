<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


Class ProfileUpdateApi extends BaseController{
    public function upload_propic(){

        if (!Session::get('userdata'))
            return array("error" => "Utente non loggato!");
        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];
        $STATUS = [];

        $new_propic = request('propic');

        if (!$new_propic->isValid()){
            $STATUS['error'] = "Errore nel caricamento del file";
        }
        else{
            if (!empty($new_propic)){
                $format = exif_imagetype($new_propic->path());
                $allowed_formats = array(IMAGETYPE_PNG => 'png', IMAGETYPE_JPEG => 'jpg', IMAGETYPE_GIF => 'gif');
                if (isset($allowed_formats[$format])){
                    if ($new_propic->getSize() <= 5000000){
                        $new_propic = $new_propic->store('public/images/propics');

                        $STATUS['propic'] = "http://localhost/homework2/storage/app/".$new_propic;
                        $STATUS['success'] = "Immagine aggiornata con sucesso!";

                        $user = User::find($current_user);
                        $user->propic = "http://localhost/homework2/storage/app/".$new_propic;
                        $user->save();
                        $udata['propic'] = "http://localhost/homework2/storage/app/".$new_propic;
                        Session::put('userdata', $udata);

                    }
                    else
                        $STATUS['error'] = "L'immagine non deve superare i 5MB!";
                }
                else
                    $STATUS['error'] = "L'immagine dev'essere in formato .png, .jpg o .gif!";
            }
            else
                $STATUS['error'] = 'Immagine non caricata!';
        }

        return $STATUS;
    }

    public function update_motto(){
        if (!Session::get('userdata'))
            return array("error" => "Utente non loggato!");
        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];
        $STATUS = [];

        if (request('upd-motto')){
            $motto = trim(request('upd-motto'));
            if(strlen($motto) > 255)
                $STATUS['error'] = "Il tuo Motto non può superare i 255 caratteri!";
            else{
                $record = User::find($current_user);
                $record->motto = $motto;
                $record->save();
                $STATUS['success'] = 'Motto aggiornato con successo!';
                $STATUS['motto'] = $motto;
            }
        }
        else
            $STATUS['error'] = 'Motto non impostato!';

        return $STATUS;
    }
}

?>