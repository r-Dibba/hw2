@extends('layouts.header')

@section('pagetitle', 'Cerca Eventi')

@section ('head_content')
  <link rel = "stylesheet" href = "{{url('css/events.css')}}">
  <script src = "{{url('js/events.js')}}" defer = "true"></script>


@endsection

@section('userpic', $user['propic'])

@section('body')
    <h2 id = "search-info">
        Cerca eventi:
    </h2>

    <div id = "search-container">
            <p id = 'toggle-search'>Cerca Per Paese </p>
            <form name = "artist-search" method = "get" data-type = "artist">
            <input type = 'text' name = 'filter' placeholder = 'cerca artisti' id = 'search-box'>
            <input type = 'submit' value = '' id = 'search-submit'>
            </form>
        </div>

    <article>
      <section>
      </section>

    </article>
@endsection
