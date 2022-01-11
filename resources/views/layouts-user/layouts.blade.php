<!DOCTYPE html>
<html lang="en">

@include('layouts-user.header')

<body>

@include('layouts-user.navbar')



  @yield('content')


  @include('layouts-user.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('layouts-user.js')

  @if (session('status'))
    <script>
        swal("{{ session('status') }}");
    </script>
  @endif

</body>

</html>
