<?php
namespace App\Http\Controllers;

require_once ("../resources/phpfiles/user_utils.php");

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\Post;
use App\Models\Review;
use App\Models\User;
use App\Models\Like;
use App\Models\Comment;


use Illuminate\Database\Query\JoinClause;

Class PostApi extends BaseController{
    public function get_album($title, $artist){
        $consumer_key = 'GUIScqCZQtYFacesCmMK';
        $consumer_secret = 'JJTExBnEGtDKmXvdszsqnxMPJTNpfIWq';
        $discogs_endp = 'https://api.discogs.com/database/search?';
        $TO_RETURN = [];

        $title = trim($title);
        $artist = trim($artist);

        if (strlen($title) > 0 && strlen($artist) > 0){
            $params = http_build_query(array("release_title" => urlencode($title), "artist" => urlencode($artist), "per_page" => "1"));
            $headers = array("Authorization: Discogs key=$consumer_key, secret=$consumer_secret");
            $user_agent = "Diapason/2.0 ";

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $discogs_endp.$params);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl, CURLOPT_USERAGENT, $user_agent);
            curl_setopt($curl, CURLOPT_COOKIE, "SameSite=Strict");

            $res = json_decode(curl_exec($curl));
            
            $TO_RETURN['cover'] = isset($res->results[0]) ? $res->results[0]->cover_image : null;
            curl_close($curl);
        }
        else
            $TO_RETURN['error'] = 'no post data';
        
        return $TO_RETURN;
    }

    public function add_review(){

        $TO_RETURN = [];

        if (!Session::get('userdata')){
            $TO_RETURN['posted'] = 'false';
            $TO_RETURN['status'] = 'Effettuare il Login';
        }
        else{
            $udata = Session::get('userdata');
            $current_user = $udata['current_user'];
            $TO_RETURN['type'] = 0;
            $post_id = uniqid("", null);
            $check = true;

                $post_keys = array("post-title", "album-title", "album-artist", "cover-url", "score", "desc");
                $form_res = checkRequest($post_keys);

                foreach ($form_res as $k => $val)
                    if($val === 'empty'){
                        $check = false;
                        break;
                    }

                if (!$check){
                    $TO_RETURN['posted'] = false;
                    $TO_RETURN['status'] = 'Compila tutti i Campi!';
                }

                if (!preg_match('/^[0-9]*$/',$form_res['score'])){
                    $TO_RETURN['status'] = 'Inserisci un voto numerico';
                    $check = false;
                }
                else{

                    $new_rev = new Review;
                    $new_post = new Post;

                    $new_post->id = $post_id;
                    $new_post->author = $current_user;
                    $new_post->title = $form_res['post-title'];
                    $new_post->textcontent = $form_res['desc'];

                    $new_rev->r_id = $post_id;
                    $new_rev->artist = $form_res['album-artist'];
                    $new_rev->albumtitle = $form_res['album-title'];
                    $new_rev->score = $form_res['score'];
                    $new_rev->cover = $form_res['cover-url'];

                    $new_post->save();
                    $new_rev->save();

                    $TO_RETURN['posted'] = true;
                }
            }

        return $TO_RETURN;
    }

    public function add_post(){

        $TO_RETURN = [];

        if (!Session::get('userdata')){
            $TO_RETURN['posted'] = 'false';
            $TO_RETURN['status'] = 'Effettuare il Login';
        }
        else{
            $udata = Session::get('userdata');
            $current_user = $udata['current_user'];
            $TO_RETURN['type'] = 1;
            $post_id = uniqid("", null);
            $check = true;

                $post_keys = array("post-title", "desc");
                $form_res = checkRequest($post_keys);

                $check = true;
                
                foreach ($form_res as $k => $val)
                if($val === 'empty'){
                    $check = false;
                    break;
                }

                if (!$check){
                    $TO_RETURN['posted'] = false;
                    $TO_RETURN['status'] = 'Compila tutti i Campi!';
                }

                else{
                    $new_post = new Post;

                    $new_post->id = $post_id;
                    $new_post->author = $current_user;
                    $new_post->title = $form_res['post-title'];
                    $new_post->textcontent = $form_res['desc'];

                    $new_post->save();

                    $TO_RETURN['posted'] = true;
                }

        }

    return $TO_RETURN;

    }

    public function retrieve_posts_target($target, $limit, $offset){

        $TO_RETURN = [];
        $target = trim($target);

        if (!Session::get('userdata'))
            return $TO_RETURN;

        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];
    
            $TO_RETURN['retrieved'] = true;
            if (strlen($target) === 0)
                $TO_RETURN['retrieved'] = false;

            if ($TO_RETURN['retrieved']){

                $res = User::join('posts', 'username', '=', 'author')->where('author', $target)->leftJoin('reviews', 'posts.id', '=', 'reviews.r_id')->leftJoin('likes', function (JoinClause $leftjoin) use ($current_user){
                    $leftjoin->on('target_post', '=', 'posts.id')
                        ->where('l_username', $current_user);
                })->orderBy('posts.created_at', 'desc')->limit($limit)->offset($offset)->get(['posts.id', 'propic', 'author', 'title', 'textcontent', 'amt_likes', 'amt_dislikes', 'posts.created_at', 'artist', 'albumtitle', 'cover', 'score', 'interaction']);
            }
        
            $TO_RETURN['posts'] = $res;

            return $TO_RETURN;


    }

    public function retrieve_posts_friends($limit, $offset){
        $TO_RETURN['retrieved'] = true;
        if (!Session::get('userdata'))
            return $TO_RETURN['retrieved'] = false;

        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];


               $res = User::find($current_user)->follows()->join('posts', 'username', '=', 'author')->leftJoin('reviews', 'posts.id', '=', 'reviews.r_id')->leftJoin('likes', function (JoinClause $leftjoin) use ($current_user){
                    $leftjoin->on('target_post', '=', 'posts.id')
                        ->where('l_username', $current_user);
                })->orderBy('posts.created_at', 'desc')->limit($limit)->offset($offset)->get(['posts.id', 'propic', 'author', 'title', 'textcontent', 'amt_likes', 'amt_dislikes', 'posts.created_at', 'artist', 'albumtitle', 'cover', 'score', 'interaction']);
        

            for($i = 0; $i < count($res); $i++)
                $TO_RETURN['posts'][$i] = $res[$i];

            return $TO_RETURN;
    }

    public function set_upvote($post_id){

        $TO_RETURN['append-to']['status'] = false;


        if (!Session::get('userdata'))
            return [];

        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];

        $to_set = Like::where('l_username', $current_user)->where('target_post', $post_id)->first();

        if ($to_set != null)
            $to_set->interaction = 'upv';
        else{
            $to_set = new Like;
            $to_set->l_username = $current_user;
            $to_set->interaction = 'upv';
            $to_set->target_post = $post_id;
        }

        $to_set->save();
        
        return $TO_RETURN;
            
    }

    public function set_downvote($post_id){

        $TO_RETURN['append-to']['status'] = false;


        if (!Session::get('userdata'))
        return [];

    $udata = Session::get('userdata');
    $current_user = $udata['current_user'];

    $to_set = Like::where('l_username', $current_user)->where('target_post', $post_id)->first();

    if ($to_set != null)
        $to_set->interaction = 'dwn';
    else{
        $to_set = new Like;
        $to_set->l_username = $current_user;
        $to_set->interaction = 'dwn';
        $to_set->target_post = $post_id;
    }

    $to_set->save();

    return $TO_RETURN;
    }

    public function delete_interaction($post_id){

        $TO_RETURN['append-to']['status'] = false;

        if (!Session::get('userdata'))
            return [];

        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];

        $to_del = Like::where('l_username', $current_user)->where('target_post', $post_id)->first()->delete();

        return $TO_RETURN;
    }

    public function comment_post(){
        $TO_RETURN['append-to']['status'] = false;

        if (!Session::get('userdata'))
            return [];

        $udata = Session::get('userdata');
        $current_user = $udata['current_user'];
        $comment = trim(request('comment'));
        $target = trim(request('target'));

        $new_comment = new Comment;
        $new_comment->author = $current_user;
        $new_comment->post_id = $target;
        $new_comment->comment = $comment;
        $new_comment->save(); 

        return $TO_RETURN;

    }

    public function load_comments($target){

        $TO_RETURN['append-to']['status'] = true;
        $TO_RETURN['append-to']['id'] = $target;
        $TO_RETURN['results'] = [];

        $res = Comment::where('post_id', $target)->join('users', 'author', '=', 'username')->orderBy('comments.created_at')->limit(9)->offset(0)->get(['author', 'comment', 'comments.created_at', 'propic']);

        for ($i = 0; $i < count($res); $i++)
            $TO_RETURN['results'][$i] = $res[$i];

        return $TO_RETURN;
    }
}