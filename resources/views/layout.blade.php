<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.1/css/responsive.dataTables.min.css" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    @stack('styles')
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable-custom.css') }}">
</head>

<body>


    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5" style="position: sticky; top: 0;">
                
            
                
                @if(Auth::check())
                <a href="#" class="img logo rounded-circle mb-5" style="background-image: url('/storage/public/user/{{ Auth::user()->picture }}');"></a>
                @else
                <a href="#" class="img logo rounded-circle mb-5" style="background-image: url('/storage/public/user/picture_default.png');"></a>
                @endif


                {{-- @include('partial.admin-navbar') --}}

                @if (Auth::check())
                @if (Auth::user()->role == '0')
                @include('partial.user-navbar')

                @else
                @include('partial.admin-navbar')

                @endif
                @else
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="/login">Login</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>
                </ul>
                @endif


                <div class="footer">
                    @if(Auth::check())
                    <p>Selamat datang, {{ Auth::user()->username }}</p>
                    @else
                    <p>all reserved for Aisock.inc</p>
                    @endif
                </div>

            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>


                    @if ($searchBar == 'on')
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active" style="margin: auto;">
                                <form action="/" method="GET" class="form-inline mt-3 mb-0">
                                    {{ csrf_field() }}
                                    @isset($searchvalue)
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="searchvalue" id="search" aria-label="Search" value="{{ $searchvalue }}" required>
                                    @else
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name="searchvalue" id="search" aria-label="Search" required>
                                    @endisset
                                    <button class="btn btn-outline-warning my-2 my-sm-0" type="submit" style="margin: auto;">Search</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endif

                </div>
            </nav>

            @include('sweetalert::alert')

            <div class="main-content">

                <!-- <main> -->
                @yield('content')
                <!-- </main> -->
                <!-- Main content disini, pake javascript -->

            </div>

        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/layout.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>

    <script>
        let headers = {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    </script>

    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js"></script>
    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')
</body>

</html>