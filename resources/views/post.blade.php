@extends('layouts.header')

@section('pagetitle', 'Diapason - Pubblica')

@section('head_content')
  <link rel = "stylesheet" href = "{{url('css/post.css')}}">
  <script src = "{{url('js/post.js')}}" defer = "true"></script>

@endsection

@section('userpic', $user['propic'])

@section('body')

    <h2>

      Pubblica qualcosa!

    </h2>

    <article>
      <section id = 'post'>
        <form name = 'form-post' method = 'post'>
          <input type = 'text' name = 'post-title' placeholder = "Titolo del post" id = 'post-title' autocomplete = "off">
          <div id = 'review-container'>
            <label class = 'row-lab'><input type = "checkbox" name = 'is-review' >Recensione </label>
            <div id = review>
              <label class = 'col-lab'>
                <img id = 'default-album' src = "{{url('images/placeholder_icon.svg')}}">
                <input type = 'text' name = 'album-title' placeholder = "titolo dell'album" data-review = "true" autocomplete = "off">
                <input type = 'text' name = 'album-artist' placeholder = "artista" data-review = "true" autocomplete = "off">
                <input type = 'hidden' name = 'cover-url' data-review = "true">
              </label>
              <label class = 'row-lab'> Voto: <input type = 'number' name = 'score' min = '0' max = '100' data-type = 'score' data-review = "true">/100</label>
              <div id = "overlay"></div>
            </div>
          </div>
          <textarea name = 'desc' placeholder = 'A cosa stai pensando?' value = ''></textarea>
          <input type = 'submit' value = 'PUBBLICA' class = 'ok-button'>
        </form>
      </section>
      <section id = 'post-modal' class = 'hidden modal'>
        <div id = 'in-modal'>
          <h1></h1>
          <p></p>

          <div class = 'ok-button'>Ok</div> 
        </div>
      </section>
    </article>
@endsection
