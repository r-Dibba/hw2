@extends('layouts.header')

@section('pagetitle', 'Diapason - Utenti')

@section ('head_content')
  <link rel = "stylesheet" href = "{{url('css/search_results.css')}}">
  <link rel = "stylesheet" href = "{{url('css/search_posts.css')}}">

  <script src = "{{url('js/search_users.js')}}" defer = "true"></script>


@endsection

@section('userpic', $user['propic'])
@section('search_bar')
        <form name = "header-search" method = "get" >
          <input type = 'text' name = 'user-search' placeholder = 'cerca utenti' id = 'search-box' autocomplete = "off">
          <input type = 'submit' value = '' id = 'search-submit'>
        </form>
@endsection

@section('body')

        <h2 id = "search-info">
            {{ $welcome}}
        </h2>

        <article>
            <section>
            </section>
        </article>

        
@endsection