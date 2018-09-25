@extends('layouts.master')

@section('content')

  <section class="pt-5">
    <div class="mt-3">
      <a href="{{route('post.create')}}" class="btn btn-primary btn-lg active">Create post</a>
    </div>
    <div class="mt-3">{{$posts->links()}}</div>
    @if(Session::has('message'))
      <div class="alert alert-info">
        {{ Session::get('message') }}
      </div>
    @endif
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Title</th>
          <th scope="col">status</th>
          <th scope="col">Type de post</th>
          <th scope="col">Date d'apparition</th>
          <th scope="col">Date de début</th>
          <th scope="col">Date de fin</th>
          <th scope="col">Prix</th>
          <th scope="col">edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @forelse($posts as $post)
          <tr>
            <td><a href="{{route('post.show', $post->id)}}">{{$post->title}}</a></td>
            <td>{{$post->status}}</td>
            <td>{{$post->post_type}}</td>
            <td>{{Carbon\Carbon::parse($post->created_at)->format('d-m-Y')}}</td>
            <td>{{Carbon\Carbon::parse($post->date_début)->format('d-m-Y')}}</td>
            <td>{{Carbon\Carbon::parse($post->date_fin)->format('d-m-Y')}}</td>
            <td>{{$post->price}}</td>
            <td><a href="{{route('post.edit', $post->id)}}"><i class="fas fa-pen"></i></a></td>
            <td>
              <form onclick="return confirm('Are you sure?')" class="delete" method="POST" action="{{route('post.destroy', $post->id)}}">
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