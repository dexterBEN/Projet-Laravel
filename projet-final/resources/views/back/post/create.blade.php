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
              <div class="row mr-auto">
                <div class="form-group mr-auto">
                  <label class="d-block" for="date_début">Date début:</label>
                  <input type="date" name="date_début" value="{{old('date_début')}}" id="date_début">
                  @if($errors->has('date_début'))
                    <div class="alert alert-danger" role="alert">
                      <span class="error">{{$errors->first('date_début')}}</span>
                    </div>
                  @endif
                </div>
                <div class="form-group d-inline-block">
                  <label class="d-block" for="date_fin">Date fin:</label>
                  <input type="date" name="date_fin" value="{{old('date_fin')}}">
                  @if($errors->has('date_fin'))
                    <div class="alert alert-danger" role="alert">
                      <span class="error">{{$errors->first('date_fin')}}</span>
                    </div>
                  @endif
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
              <div class="input-radio pt-4">
                <label class="my-1 mr-2 font-weight-bold"><h2>Type de post:</h2></label><br>
                <input type="radio" name="post_type" id="post_type" value="formation" checked>Formation<br>
                <input type="radio" name="post_type" id="post_type" value="stage">Stage<br>
              </div>
            </div>

            <div class="form-group">
              <div class="input-radio pt-4">
                <label class="my-1 mr-2 font-weight-bold"><h2>Statut:</h2></label><br>
                <input type="radio" name="status" id="status" value="published">Publié<br>
                <input type="radio" name="status" id="status" value="unpublished">Non-publié<br>
              </div>
            </div>

            <div class="form-group">
              <div class="form-select">
                <label class="my-1 mr-2 font-weight-bold" for="category_id"><h2>Category:</h2></label><br>
                @forelse($categories as $id => $title)
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="categories[]" id="category{{$id}}" value="{{$id}}" {{ ( !empty(old('categories')) and in_array($id, old('categories')) )? 'checked' : ''  }}>
                    <label class="form-check-label" for="exampleRadios1">
                      {{$title}}
                    </label>
                  </div>
                @empty
                @endforelse
              </div>
            </div>

            <div class="input-file mt-5">
              <input type="file" class="custom-file" name="picture">
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