@extends('layouts.master')

@section('content')
  <section class="pt-5">
    <h1>Creation de Post:</h1>

    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="container">
        <div class="row">
          <div class="col-sm">
            <div class="form-group">
              <label for="title">Titre</label>
              <input id="title" name="title" value="{{old('title')}}" type="texte" class="form-control" placeholder="Titre du post">
              @if($errors->has('title'))
                <span>{{$errors->first('title')}}</span>
              @endif
            </div>

            <div class="container">
              <div class="row">
                <div class="col-sm">
                  <div class="form-group">
                    <label for="date_début">Date début:</label>
                    <input type="date" name="date_début" value="{{old('date_début')}}">
                  </div>
                </div>
                <div class="col-sm">
                  <div class="form-group">
                    <label for="date_fin">Date fin:</label>
                    <input type="date" name="date_fin" value="{{old('date_fin')}}">
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="price">Prix:</label>
              <input value="{{old('price')}}" name="price" type="text" class="form-control" placeholder="Enter price">
              @if($errors->has('price'))
                <div class="alert alert-danger" role="alert">
                    <span>{{$errors->first('price')}}</span>
                </div>
              @endif
            </div>

            <div class="form-group">
              <label for="maxStudent">Maximum d'étudiant:</label>
              <input value="{{old('maxStudent')}}" name="maxStudent" type="text" class="form-control" placeholder="Enter max student">
              @if($errors->has('maxStudent'))
                <div class="alert alert-danger" role="alert">
                  <span>{{$errors->first('maxStudent')}}</span>
                </div>
              @endif
            </div> 

            <div class="form-group">
              <label for="description">Description:</label>
              <textarea type="text" name="description" class="form-control" value="{{old('description')}}" rows="3" placeholder="écrivez votre description"></textarea>
              @if($errors->has('description'))
                <div class="alert alert-danger" role="alert">
                  <span>{{$errors->first('description')}}</span>
                </div>
              @endif
            </div> 

          </div>

          <div class="col-sm">
            <div class="form-group">
              <!-- <div class="form-check">
                <input class="form-check-input" type="radio" name="post_type" id="post_type" value="formation" checked>
                <label class="form-check-label" for="formation">formation</label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="post_type" id="post_type" value="stage">
                <label class="form-check-label" for="stage">stage</label>
              </div> -->

              <div class="input-radio">
                <input type="radio" name="post_type" id="post_type" value="formation" checked>Formation<br>
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
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Créer le post</button>
    </form>
  </section>
@endsection