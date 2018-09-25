@extends('layouts.master')

@section('content')
  <section class="mt-5">
    <div class="card mx-auto w-50 mb-5">
        @if($post->picture)
          <img class="card-img-top" src="{{url('images', $post->picture->link)}}">
        @endif
      <div class="card-body">
        <h5 class="card-title font-weight-bold">{{$post->title}}</h5>
        <p class="card-text">{{$post->description}}</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><p class="d-inline font-weight-bold">Date début:</p> {{Carbon\Carbon::parse($post->date_début)->format('d-m-Y')}}</li>
        <li class="list-group-item"><p class="d-inline font-weight-bold">Date fin:</p> {{Carbon\Carbon::parse($post->date_fin)->format('d-m-Y')}}</li>
        <li class="list-group-item"><p class="d-inline font-weight-bold">Prix:</p> {{$post->price}}</li>
        <li class="list-group-item"><p class="d-inline font-weight-bold">capacité d'accueil:</p> {{$post->maxStudent}}</li>
      </ul>
    </div>
  </section>
@endsection