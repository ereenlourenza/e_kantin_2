<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Kantin</title>

    <script type="text/javascript" src="/js/sidebar.js"></script>
    <script type="text/javascript" src="/js/word.js.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

@section('styles')
    <link rel="stylesheet" href="{{ asset('resources/css/customer-login.css') }}" rel="stylesheet">
@endsection

<body>
  
  <!-- Navbar -->
  @include('layouts.header')
  <!-- /.navbar -->
  
  <div class="container">
    @yield('content')
  </div>

  @include('layouts.footer')
        

    {{-- <script>
        // Untuk mengirimkan token Laravel CSRF pada setiap request ajax
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    </script> --}}
</body>
</html>