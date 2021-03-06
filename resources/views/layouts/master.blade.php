<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CodeTeka</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">

            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="./img/logo.png" alt="Codeteka Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">CodeTeka</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('img/profile/'.Auth::user()->foto) }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            {{Auth::user()->name}}
                            <p>{{Auth::user()->tipo}}</p>
                        </a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <router-link to="/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt blue"></i>
                                <p>
                                    Dashboard                                    
                                </p>
                            </router-link>
                        </li>
                        @can('isAdmin')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-cog green"></i>
                                <p>
                                    Management
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/users" class="nav-link">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>Users</p>
                                    </router-link>
                                </li>
                
                            </ul>
                        </li>
                                                
                        <li class="nav-item">
                            <router-link to="/developer" class="nav-link">
                                <i class="nav-icon fas fa-cogs purple"></i>
                                <p>
                                    Developer                                    
                                </p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link to="/programas" class="nav-link">
                                <i class="nav-icon fas fa-code teal"></i>
                                <p>
                                    Programs                                    
                                </p>
                            </router-link>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <router-link to="/profile" class="nav-link">
                                <i class="nav-icon fas fa-user orange"></i>
                                <p>
                                    Profile                                    
                                </p>
                            </router-link>
                        </li>                        

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                <i class="nav-icon fa fa-power-off red"></i>
                                <p>
                                    {{ __('Logout') }}
                                </p>
                             </a>
            
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form>
                    </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            
            <!--MAIN CONTENT-->
            <div class="content">
                <div class="container-fluid">
                    <vue-progress-bar> </vue-progress-bar>
                    <router-view></router-view>
                </div>
            </div>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>


        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Jose Quintero - Julio Trigo - Salvador Leal
            </div>
            <strong>Copyright &copy; 2022 <a href="https://github.com/Boxter24/CodeTeka">CodeTeka.io</a>.</strong> All rights reserved.
        </footer>
    </div>

    @auth
        <script>
            window.user = @json(auth()->user())
        </script>
    @endauth

    <script src="/js/app.js"></script>
</body>
</html>