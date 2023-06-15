<?php

    $REG_ERROR_CODES= ["empty" => 0, "too long" => 1, "too short" => 2, "not valid" => 3, "unavailable" => 4, "not equal" => 5];

    function getUserData($toFind){

        $TO_RETURN = null;

        $conn = mysqli_connect("localhost", "root", "", "homework1") or die(mysqli_connect_error());

        $name = mysqli_real_escape_string($conn, $toFind);

        $query = "SELECT Nome, Cognome, Username, Propic, SignupDate, AmtFollows, AmtFollowedBy, Motto FROM USERS WHERE Username = '".$name."'";
        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if (mysqli_num_rows($res) === 1){
            $record = mysqli_fetch_object($res);
            $TO_RETURN = $record;
        }

        mysqli_free_result($res);
        mysqli_close($conn);

        return $TO_RETURN;
    }

    function getRank($date){
        $user_timestamp = new DateTime($date);
        $curdate = new DateTime('now');
        $rank = $user_timestamp->diff($curdate);
        switch($rank->format('%Y')){
            case 0:
                return "Pozzoli I Corso";
            case 1:
                return "Musicista Occasionale";
            case 2:
                return "Amante del Setticlavio";
            case 3:
                return "Direttore d'Orchestra";
            case 4: 
                return "Compositore";
            default:
                return "Allievo di Liszt";
        }
    }

    function welcome_user($name){
        $time = localtime(null, true);
        
        if ($time['tm_hour'] >= 15)
            return("Buonasera, ".$name."!");
        else
            return("Buongiorno, ".$name."!");

    }

    function checkForm($getref, $postref, $postkeys, $getkeys){
        $STATUS = [];

        for ($i = 0; $i < count($getkeys); $i++)
            if (isset($getref[$getkeys[$i]]))
                $STATUS[$getkeys[$i]] = strlen(trim($getref[$getkeys[$i]])) === 0 ? 'empty' : trim($getref[$getkeys[$i]]);
            else
                $STATUS[$getkeys[$i]] = 'empty';
            
        
        

        for ($i = 0; $i < count($postkeys); $i++)
            if (isset($postref[$postkeys[$i]]))
                $STATUS[$postkeys[$i]] = strlen(trim($postref[$postkeys[$i]])) === 0 ? 'empty' : trim($postref[$postkeys[$i]]);
             else
                $STATUS[$postkeys[$i]] = 'empty';

        return $STATUS;
    }

    function checkRequest($keys){
        for ($i = 0; $i < count($keys); $i++)
            $STATUS[$keys[$i]] = strlen(trim(request($keys[$i]))) === 0 ? 'empty' : trim(request($keys[$i]));

    return $STATUS;
    }

?>