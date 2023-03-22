<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.108.0">
        <title>Gestion ecole</title>
        {{-- Charger les fichiers CSS --}}
        @include('parts._css')
    </head>
    <body>
        {{-- Charger l'entête de la page --}}
        @include('parts._header')
        <div class="container-fluid">
            <div class="row">
                {{-- Charger le menu principale --}}
                @include('parts._side_menu')
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">{{$page_title}}</h1>
                    </div>
                @yield('content')
                </main>
            </div>
        </div>
        {{-- Charger les fichiers CSS --}}
        @include('parts._js')
    </body>
</html>
