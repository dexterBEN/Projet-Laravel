@extends('layouts.master')

@section('content')
  <section class="mt-5">

    <div class="card mx-auto" style="width: 18rem;">
      <img class="card-img-top" src="{{url('images', $post->picture->link)}}" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
        <p class="card-text">{{$post->description}}</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Date début: {{$post->date_début}}</li>
        <li class="list-group-item">Date fin: {{$post->date_fin}}</li>
        <li class="list-group-item">Prix: {{$post->price}}</li>
        <li class="list-group-item">capacité d'acceuil: {{$post->maxStudent}}</li>
      </ul>
      <!--<div class="card-body">
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
      </div>-->
    </div>
  </section>
@endsection