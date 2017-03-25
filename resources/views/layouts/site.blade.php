<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
  <title>{{ isset($seo['titulo']) ? $seo['titulo'] : config('seo.titulo','Site Dinamico') }}</title>
  <meta name="description" content="{{ isset($seo['descricao']) ? $seo['descricao'] : config('seo.descricao') }}">

  <!-- Twitter Card data -->
  <meta name="twitter:card" value="sumary">

  <!-- Open Graph data -->
  <meta property="og:title" content="Title Here" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="{{ isset($seo['url']) ? $seo['url'] : config('app.url') }}" />
  <meta property="og:image" content="{{ isset($seo['imagem']) ? $seo['imagem'] : config('seo.imagem') }}" />
  <meta property="og:description" content="{{ isset($seo['descricao']) ? $seo['descricao'] : config('seo.descricao') }}" />

  <!-- Styles -->
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">      
  <link rel="stylesheet" type="text/css" href="{{asset('lib/materialize/dist/css/materialize.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>
    <div id="app-layout">
      <header>
        @include('layouts._site._nav')
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

      @include('layouts._site._footer')
    
      
    </div>

    <!-- Scripts -->
    <script src="{{asset('lib/jquery/dist/jquery.js')}}"></script>
    <script src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>
</body>
</html>
