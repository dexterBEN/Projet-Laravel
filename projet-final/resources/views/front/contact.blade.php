@extends('layouts.master')

@section('content')
  <section class="mt-5">
    <form action="{{route('contact')}}" method="POST">
      {{csrf_field()}}
      <div class="form-group">
        <label for="name" class="control-label">Name:</label>
        <input name="name" type="text" class="form-control" placeholder="example: John doe">{{old('name')}}
      </div>

      <div class="form-group">
        <label for="email" class="control-label">Email address:</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="name@example.com">{{old('email')}}
      </div>
      
      <div class="form-group">
        <label for="msg">Message:</label>
        <textarea type="text" class="form-control" name="msg" rows="5">{{old('msg')}}</textarea>
      </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        
        @if(session()->has('flash_message'))
          <div class="alert alert-success">
            {{ session()->get('flash_message') }}
          </div>
        @endif
    </form>
  </section>
@endsection