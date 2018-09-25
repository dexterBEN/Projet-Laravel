@extends('layouts.master')

@section('content')
  <section class="mt-5">
    <h1>Edition post:</h1>
    <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
      <div class="container">
        <div class="row">
          <div class="col-sm">
            @csrf
            {{method_field('PUT')}}
            <div class="form-group">
              <label for="title">Title:</label>
              <input name="title" value="{{$post->title}}" type="text" class="form-control" id="title" placeholder="Enter title">
              @if($errors->has('title'))
                <span>{{$errors->first('title')}}</span>
              @endif
            </div>

            <div class="container">
              <div class="row mr-auto">
                <div class="form-group mr-auto">
                  <label class="d-block" for="date_début">Date début:</label>
                  <input type="date" name="date_début" value="{{$post->date_début}}" class="form-control" id="date_début">
                </div>
                <div class="form-group">
                  <label class="d-block" for="date_fin">Date fin:</label>
                  <input type="date" name="date_fin" value="{{$post->date_fin}}" class="form-control" id="date_fin">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="price">Prix:</label>
              <input value="{{$post->price}}" name="price" type="text" class="form-control" placeholder="Enter price">
              @if($errors->has('price'))
                <div class="alert alert-danger" role="alert">
                  <span>{{$errors->first('price')}}</span>
                </div>
              @endif
            </div>

            <div class="form-group">
              <label for="maxStudent">Maximum d'étudiant:</label>
              <input value="{{$post->maxStudent}}" name="maxStudent" type="text" class="form-control" placeholder="Enter max student">
              @if($errors->has('maxStudent'))
                <div class="alert alert-danger" role="alert">
                  <span>{{$errors->first('maxStudent')}}</span>
                </div>
              @endif
            </div> 

            <div class="form-group">
              <label for="description">Description:</label>
              <textarea value="{{$post->description}}" name="description" type="text" class="form-control" rows="3" placeholder="écrivez votre description"></textarea>
              @if($errors->has('description'))
                <div class="alert alert-danger" role="alert">
                  <span>{{$errors->first('description')}}</span>
                </div>
              @endif
            </div>
          </div><!--end first col sm-->

          <div class="col-sm">
            <div class="form-group">
              <div class="input-radio pt-4">
                <label class="my-1 mr-2 font-weight-bold"><h2>Type de post:</h2></label><br>
                <input type="radio" name="post_type" id="post_type" value="formation" >Formation<br>
                <input type="radio" name="post_type" id="post_type" value="stage">Stage<br>
              </div>
            </div>
            <div class="form-group">
              <div class="input-radio pt-4">
                <label class="my-1 mr-2 font-weight-bold"><h2>Statut:</h2></label><br>
                <input type="radio" name="status" id="status" value="published" checked>Publié<br>
                <input type="radio" name="status" id="status" value="unpublished">Non-publié<br>
              </div>
            </div>

            <div class="form-group">
              <div class="form-select">
                <label class="my-1 mr-2 font-weight-bold" for="category_id"><h2>Category:</h2></label><br>
                @foreach($categories as $id => $title)
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="categories[]" id="category{{$id}}" value="{{$id}}" {{ ( !empty(old('categories')) and in_array($id, old('categories')) )? 'checked' : ''  }}>
                    <label class="form-check-label" for="exampleRadios1">
                      {{$title}}
                    </label>
                  </div>
                @endforeach
              </div>
            </div>

            <div class="input-file mt-4">
              <input type="file" class="file" name="picture">
              @if($errors->has('picture'))
                <span>{{$errors->first('picture')}}</span>
              @endif
            </div>

          </div>
        </div><!--end row-->
      </div><!--end container-->
      <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
    </form>
  </section>
@endsection