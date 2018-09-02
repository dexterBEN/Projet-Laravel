@extends('layouts.master')

@section('content')

  <section class="pt-5">
    <h1>Liste des stages:</h1>

    {{$posts->links()}}
    <ul>
      @forelse($posts as $post)
        <li class="list-group-item">
          <div class="container">
            <div class="row">

              <div class="col-sm">
                @if(is_null($post->picture) == false) 
                  <img src="{{url('images', $post->picture->link)}}" class="img-thumbnail">
                @endif 
              </div>

              <div class="col-sm">
                <h2><a href="{{route('post', $post->id)}}">{{$post->title}}</a></h2>
                <div class="pt-5">
                  <h3>Description:</h3>
                  <p>{{$post->description}}</p>
                </div>
              </div>

            </div>
          </div>
        </li>
      @empty
      @endforelse
    </ul>
    {{$posts->links()}}
  </section>
@endsection