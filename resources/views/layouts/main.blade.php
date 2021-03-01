<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <title>DigitalEstudio</title>
    @livewireStyles
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Digital Estudio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarColor02">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Ventas
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Historial</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Creditos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Corte</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Configuracion</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
              </div>
            </li>
          </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropleft">
                    <a class="nav-link dropdown-toggle" 
                    data-toggle="dropdown" 
                    href="#" role="button" 
                    aria-haspopup="true" 
                    aria-expanded="false">Cerrar sesión</a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">salir</a>
                    </div>
                  </li>
            </ul>            
        </div>
      </nav>
      <div class="container-fluid">
        @yield('content')
      </div>
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    @livewireScripts
  </body>
</html>