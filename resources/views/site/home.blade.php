@extends('layouts.application')

@section('content')
<!-- Home -->
<div class="row intro valign-wrapper green shades-text text-white no-margin">
  <div class="container">
    <h2><strong style="color: black;"><img src="{{ asset('material/img/logo.png') }}" class="responsive-img" alt="logo" style="width: 70px;"> Laravel</strong> - CV Application</h2>
    <a href="{{ url('/login') }}" class="waves-effect waves-light btn-large blue"><i class="fa fa-check pull-right"></i>Get Started</a>
  </div>
</div>

  <!-- Service -->
  <div class="container pad-bot" id="service">
    <div class="row">
      <div class="col s12 m12 l12 center">
        <h3 class="service-title">Layanan</h3>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m4">
        <div class="icon-block">
          <div class="center green-text"><i class="material-icons">flash_on</i></div>
          <h5 class="center">Speeds up development</h5>

          <p>We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
        </div>
      </div>

      <div class="col s12 m4">
        <div class="icon-block">
          <div class="center green-text"><i class="material-icons">group</i></div>
          <h5 class="center">User Experience Focused</h5>

          <p>By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
        </div>
      </div>

      <div class="col s12 m4">
        <div class="icon-block">
          <div class="center green-text"><i class="material-icons">settings_applications</i></div>
          <h5 class="center">Easy to work with</h5>

          <p>We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
        </div>
      </div>
    </div>

  </div>
@endsection
