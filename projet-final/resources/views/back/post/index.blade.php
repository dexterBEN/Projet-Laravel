@extends('layouts.master')

@section('content')

  <section class="pt-5">
    <div class="mt-3">
      <a href="{{route('post.create')}}" class="btn btn-primary btn-lg active">Create post</a>
    </div>
    <div class="mt-3">{{$posts->links()}}</div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Title</th>
          <th scope="col">Type de post</th>
          <th scope="col">Date de d'apparition</th>
          <th scope="col">Date de début</th>
          <th scope="col">Date de fin</th>
          <th scope="col">Prix</th>
          <td scope="col">edit</td>
          <td scope="col">show</td>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @forelse($posts as $post)
          <tr>
            <td>{{$post->title}}</td>
            <td>{{$post->post_type}}</td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->date_début}}</td>
            <td>{{$post->date_fin}}</td>
            <td>{{$post->price}}</td>
            <td><a href="{{route('post.edit', $post->id)}}">edit </a></td>
            <td><a href="{{route('post.show', $post->id)}}">show</a></td>
            <td>
              <form class="delete" method="POST" action="{{route('post.destroy', $post->id)}}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <input class="btn btn-danger" type="submit" value="delete" >
              </form>
            </td>
          </tr>
        @empty
          <p>Pas de post disponible</p>
        @endforelse
      </tbody>
    </table>
    {{$posts->links()}}
  </section>
@endsection

@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection