<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/sidebar.css') !!}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
    <title>Products | {{ $title }}</title>
    <link rel="icon" href="{!! asset('assets/img/ticket.png') !!}">
</head>

<body>
    <header class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow" style="height: 60px">
        <a class="navbar-brand col-2 col-md-3 col-lg-2 me-0 px-3" href="#"><img src="{!! asset('assets/img/ticket.png') !!}"
                width="32px" class="mb-1 ms-2" alt=""><b> PRODUCTS</b></a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class="card ms-2 me-2">
                        <div class="card-body">
                            <img src="{!! asset('assets/img/user1.jpg') !!}" width="50px"
                                class="img-fluid float-start rounded-circle mt-2 me-3" alt=""><span
                            <hr class="mb-0">
                        </div>
                    </div>
                </div>
                <ul class="nav flex-column mt-3">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/dashboard">
                            <span><i class="me-3 bi bi-columns-gap"></i></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products">
                            <span><i class="me-3 bi bi-game"></i></span>
                            Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users">
                            <span><i class="me-3 bi bi-person-fill"></i></span>
                            User
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/transactions">
                            <span><i class="me-3 bi bi-credit-card"></i></span>
                            Transaction
                        </a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" href="/feedback/info">
                            <span><i class="me-3 bi bi-chat-right-text-fill "></i></span>
                            Feedback
                        </a>
                    </li>-->
                    <hr class="hr1">
                    <li class="nav-item">
                        <a class="nav-link" style="font-size: 20px;" href="/logout">
                            <b><i class="me-3 bi bi-box-arrow-left"></i>
                                Logout</b>
                        </a>
                    </li>
                </ul>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container mt-3">
                    @yield('content')
                </div>
            </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
            </script>

            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
            <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#example').DataTable();
                });
            </script>
            {{-- <script src="{!! asset('assets/js/script.js') !!}"></script> --}}
            <script type="text/javascript" src="{{ URL::asset('assets/js/script.js') }}"></script>
</body>

</html>
