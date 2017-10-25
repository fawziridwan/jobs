<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
  <title>Jobs Indo | Landing Page</title>

  <!-- CSS -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ asset('material/css/materialize.css') }}" type="text/css" rel="stylesheet" media="screen,projection" />
  <link href="{{ asset('material/css/style.min.css') }}" type="text/css" rel="stylesheet">
  <link href="{{ asset('material/font-awesome-4.6.3/css/font-awesome.min.css') }}" type="text/css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
</head>
<style>
  body {
    display: flex;
    min-height: 100vh;
    flex-direction: column;
  }

  main {
    flex: 1 0 auto;
  }

  body {
    background: #fff;
  }

  .input-field input[type=date]:focus + label,
  .input-field input[type=text]:focus + label,
  .input-field input[type=email]:focus + label,
  .input-field input[type=password]:focus + label {
    color: #e91e63;
  }

  .input-field input[type=date]:focus,
  .input-field input[type=text]:focus,
  .input-field input[type=email]:focus,
  .input-field input[type=password]:focus {
    border-bottom: 2px solid #e91e63;
    box-shadow: none;
  }
</style>
<body id="home">
  <!-- Navbar -->
  <header>
    @include('layouts.header')    
    @yield('content')
    @include('layouts.message')  
    @include('layouts.footer')
  </header>         
  <!-- Scripts -->
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.carousel.carousel-slider').carousel({fullWidth: true});
      // Next slide
      $('.carousel').carousel('next');
      $('.carousel').carousel('next', 3); // Move next n times.

      // Previous slide
      $('.carousel').carousel('prev');
      $('.carousel').carousel('prev', 4); // Move prev n times      

      $('select').material_select();      
    });    
  </script>  
  <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $(document).ready(function(){ 
          $('#select_stats').on('change', function(e){
              $.ajax({
              type : "POST",
              url : "/status/get",
              data:{
                  'status' : $('#select_stats').val()
              },
              success: function(success){
                      $("#table_ajax").html(success);
              }
          }); 
              
          });

          
      });
  </script>
  <script>
          function status_ajax(status,id){
              $('#status_value').val(status);
                  $.ajax({
                  type : "POST",
                  url : "/change_status/"+id,
                  data:{
                      'status' : status
                  },
                  success: function(success){
                      $('.modal').modal('close');
                       return location.reload();
                  }
                  });
          }
      
  </script>
  <script src="{{ asset('material/js/materialize.js') }}"></script>
  <script src="{{ asset('material/js/init.js') }}"></script>
  <script src="{{ asset('material/js/scroll.js') }}"></script>
  <script src="{{ asset('js/sweetalert.min.js') }}"></script>
  @include('sweet::alert');
</body>

</html>