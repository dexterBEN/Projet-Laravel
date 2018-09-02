@extends('layouts.master')

@section('content')
<section class="form-gradient mt-5">

    <!--Form with header-->
    <div class="card">

      <!--Header-->
      <div class="header peach-gradient">
        <div class="row d-flex justify-content-center">
            <h3 class="white-text mb-0 py-5 font-weight-bold">Contact Us</h3>
        </div>
      </div>
      <!--Header-->

      <div class="card-body mx-4">

        <div class="md-form">
          <label for="form105">Your email:</label>
          <i class="fa fa-envelope prefix grey-text"></i>
          <input type="text" id="form105" class="form-control">
        </div>

        <div class="md-form">
          <label for="form107">Your message:</label>
          <i class="fa fa-pencil prefix grey-text"></i>
          <textarea type="text" id="form107" class="md-textarea form-control" rows="5"></textarea>
        </div>

          <!--Grid row-->
          <div class="row d-flex align-items-center mb-3 mt-4">
            <!--Grid column-->
            <div class="col-md-12">
                <div class="text-center">
                    <button type="button" class="btn btn-grey btn-rounded z-depth-1a">Send</button>
                </div>
            </div>
              <!--Grid column-->
          </div>
          <!--Grid row-->
      </div>
    </div>
    <!--/Form with header-->
</section>
@endsection