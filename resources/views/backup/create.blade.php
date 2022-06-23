<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Resource Create</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        {{-- <script src="https://unpkg.com/vue@3"></script>
        <script src="https://unpkg.com/vue-router@4"></script> --}}

    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-mid-12" id="app">
                    <router-link to="/">Home</router-link>
                    
                    {{-- <a class="btn btn-primary" href="/">Home</a> --}}
                    <Resource_create />
                </div>
                <router-view></router-view>
            </div>

        </div>
       <script src="{{asset('js/app.js')}}"></script>
       <script src="https://unpkg.com/vue@3"></script>
        <script src="https://unpkg.com/vue-router@4"></script>
    </body>
</html>
