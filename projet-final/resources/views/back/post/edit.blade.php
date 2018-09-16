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
              <div class="row">
                <div class="col-sm">
                  <div class="form-group">
                    <label for="date_début">Date début:</label>
                    <input type="date" name="date_début" value="{{$date_début}}">
                  </div>
                </div>
                <div class="col-sm">
                  <div class="form-group">
                    <label for="date_fin">Date fin:</label>
                    <input type="date" name="date_fin" value="{{$date_fin}}">
                  </div>
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
              <textarea type="text" name="description" class="form-control" value="{{$post->description}}" rows="3" placeholder="écrivez votre description"></textarea>
              @if($errors->has('description'))
                <div class="alert alert-danger" role="alert">
                  <span>{{$errors->first('description')}}</span>
                </div>
              @endif
            </div>
          </div><!--end first col sm-->

          <div class="col-sm pt-4">
            <div class="form-group">
              <div class="input-radio">
                <input type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>Formation<br>
                <input type="radio" name="post_type" id="post_type" value="stage">Stage<br>
              </div>
            </div>

            <div class="form-group">
              <div class="form-select">
                <label class="my-1 mr-2" for="category_id">Category</label>
                  @foreach($categories as $id => $title)
                    <label class="control-label" for="category{{$id}}">{{$title}}</label>
                    <input class="form-control" id="category{{$id}}" name="categories[]" value="{{$id}}" type="checkbox" {{ ( !empty(old('categories')) and in_array($id, old('categories')) )? 'checked' : ''  }}>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="input-file mt-5">
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