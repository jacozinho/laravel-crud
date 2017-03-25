<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/materialize/dist/css/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>
  <div id="app-layout">
    <header>
      @include('layouts._admin._nav')
    </header>

    <main>
      @if(Session::has('mensagem'))
        <div class="container">
          <div class="row">
            <div class="card {{ Session::get('mensagem')['class']}}">
              <div align="center" class="card-content">
                {{ Session::get('mensagem')['msg']}}
              </div>
          </div>
        </div>
      @endif
      @yield('content')  
    </main>
    @include('layouts._admin._footer')
  </div>

    <!-- Scripts -->
    <script src="{{asset('lib/jquery/dist/jquery.js')}}"></script>
    <script src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>
</body>
</html>
