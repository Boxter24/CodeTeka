<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>CodeTeka</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet"> 
        <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">   
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <!-- Styles -->
        <link href="{{ asset('css/navbarWelcome.css') }}" rel="stylesheet">      
          
        <!-- Iconos -->
        <script src="https://kit.fontawesome.com/72ffbb4e9b.js" crossorigin="anonymous"></script>
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" ></script>    
        <script src="{{ asset('js/welcome.js') }}" defer></script>
    </head>
    <body>
        <div id="app">  
            <span class="ir-arriba"><i class="fa-solid fa-arrow-up"></i></span>          
            <v-app>
                
                <header>
                    <nav class="nav">
                        <div class="container">
                            <div class="logo">
                                <a href="#">CodeTeka</a>                                
                            </div>
                            @if (Route::has('login'))
                                <div id="mainListDiv" class="main_list">                            
                                    <ul class="navlinks">
                                        @auth
                                            <li><a href="{{ url('/home') }}">Home</a></li>
                                        @else
                                            <li><a href="{{ route('login') }}">Log in</a></li>
                                            @if (Route::has('register'))
                                                <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a></li>
                                            @endif
                                        @endauth                                
                                    </ul>
                                </div>
                            @endif
                            <span class="navTrigger">
                                <i></i>
                                <i></i>
                                <i></i>
                            </span>
                        </div>
                    </nav>       
                </header>        
                            
                <div class="main my-16">
                    <welcome-carrusel class="my-16"></welcome-carrusel>
                </div>                
            </v-app>
        </div>

        <!-- Script -->        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>                                           
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/62512ec0b0d10b6f3e6c5d3e/1g06ht8nb';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
    </body>
</html>
