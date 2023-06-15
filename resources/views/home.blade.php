@extends('layouts.header')

@section('pagetitle', 'Diapason - Home')
@section('head_content')
  <link rel = "stylesheet" href = "{{ url('css/search_posts.css')}}">
  <script src = "js/search_posts.js" defer = "true"></script>
@endsection

@section('userpic', $user['propic'])

@section('body')

    <h2 id = "search-info">

    </h2>


    <article>
    <h2 id = 'post-info'> Ultimi post dei tuoi seguiti: </h2>
    <section id = "show-posts">

    </section>
    </article>
@endsection

