<!doctype html>
<html>
<head>
   @include('includes.admin.head')
</head>
<body>
  <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <!-- <img class="animation__shake" src="{{ $globalData }}" alt="{{ config('app.name', 'Nindeo Video Software') }}" style="width:200px;"> -->
        <img class="animation__shake" src="{{url('images/pre-loader.png')}}" alt="{{ config('app.name', 'StockPilot') }}" height="60" width="200">
      </div>
      @include('includes.admin.header')
      @include('includes.admin.sidebar')
      @yield('content')
  </div>
  <!-- ./wrapper -->
</body>
</html>