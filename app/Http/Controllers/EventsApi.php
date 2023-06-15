<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;

Class EventsApi extends BaseController{

    public function get_events($type, $filter, $page){
        $cl_secret = '662d39320df45c99406cde690bc46f7f2e525701499de2315d2aa06373562b1a';
        $cl_id = 'MzM3MDgxODJ8MTY4NDE1MDAwOC4wNTM4MDQ';
        $STATUS = [];
        $filter = urlencode(trim($filter));


        if (strlen($type) > 0 && strlen($filter) > 0 && strlen($page) > 0){
            $needle = "+";
            $hyph = "-";
            $filter = str_replace($needle, $hyph, $filter);
            $events_perf_end = "https://api.seatgeek.com/2/events?taxonomies.name=concert&per_page=9&page=$page&client_id=$cl_id&client_secret=$cl_secret";

            
            
            if ($type == 0)
                $events_perf_end = $events_perf_end."&performers.slug=$filter";
            else if($type == 1)
                $events_perf_end = $events_perf_end."&venue.country=$filter";
            if (strlen($filter) !== 0){
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $events_perf_end);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                $res = curl_exec($curl);
                $events = json_decode($res)->events;
                
                for ($i = 0; $i < count($events); $i++){

                    $STATUS[$i]['title'] = $events[$i]->title;
                    $STATUS[$i]['tickets'] = $events[$i]->url;
                    $STATUS[$i]['date'] = substr($events[$i]->datetime_local, 0, -9);
                    $STATUS[$i]['venue'] = $events[$i]->venue->name;
                    $STATUS[$i]['city'] = $events[$i]->venue->city;
                    $STATUS[$i]['country'] = $events[$i]->venue->country;

                }
            curl_close($curl);
            }
        
        }

        return $STATUS;
    }


}

?>
