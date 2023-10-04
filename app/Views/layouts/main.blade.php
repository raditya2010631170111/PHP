<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinematic | {{ $title }}</title>
    <link rel="icon" href="{!! asset('assets/img/ticket.png') !!}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/main.css') !!}">
    {{-- <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/seat.css') !!}"> --}}
    <style>
        .navbar .container {
            background-color: #001d3d;
        }

        #box-shadow {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        span.certification {
            display: inline-flex;
            white-space: nowrap;
            align-items: center;
            align-content: center;
            padding: 0.06em 4px 0.15em 4px !important;
            border: 1px solid rgba(245, 245, 245, 0.6);
            color: rgba(231, 231, 231, 0.6);
            line-height: 1;
            border-radius: 2px;
            margin-right: 7px;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #001d3d;">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="../assets/img/ticket.png" class="mb-1"
                    alt="Logo Cinematic" style="margin-right: 5px;" width="45"><b>Cinematic</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link mt-1 {{ $title === 'Movie' ? 'active' : '' }}"
                            href="{{ route('admin.index_game') }}">Movie</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link mt-1 {{ $title === 'About us' ? 'active' : '' }}" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mt-1 {{ $title === 'Contact us' ? 'active' : '' }}"
                            href="/contactus">Contact us</a>
                    </li>
                    @if (Auth::guest())
                        <li class="nav-item">
                            <a class="nav-link {{ $title === 'Login' ? 'active' : '' }}" href="/login"><input
                                    type="submit" class="nav-item btn btn-primary ms-5 w-75" value="Join Us" name=""
                                    id=""></a>
                        </li>
                    @else
                        <li class="nav-item mt-1 dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDarkDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="bi bi-person-circle"></i>
                                {{ Auth::user()->username }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item text-white" href="/logout">Logout</a></li>
                                <li class="">
                                    <a class="dropdown-item text-white" href="/users/myticket">My Ticket</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid" style="background-color: #001d3d;">
        @yield('content')
    </div>
    <section class="footer mt-5" style="background-color: white">
        <div class="container">
            <div class="row row-cols-2 row-cols-md-2 g-3 py-5">
                <div class="col-md-6 col-lg-3">
                    <h5>Menu</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a href="{{ route('admin.index_game') }}" class="nav-link1 p-0 text-dark"
                                style="text-decoration: none">Movie</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="/about" class="nav-link1 p-0 text-dark" style="text-decoration: none">About</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="/contactus" class="nav-link1 p-0 text-dark" style="text-decoration: none">Contact
                                Us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h5>Movie</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a href="{{ route('admin.index_game') }}" class="nav-link1 p-0 text-dark"
                                style="text-decoration: none">Coming Soon</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{ route('admin.index_game') }}" class="nav-link1 p-0 text-dark"
                                style="text-decoration: none">Now Playing</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="{{ route('admin.index_game') }}" class="nav-link1 p-0 text-dark"
                                style="text-decoration: none">Popular</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <form>
                        <h5>Contact Us</h5>
                        <p>Send us feedback and criticism, so we can continue to develop to be even better</p>
                        <div class="d-flex w-100 gap-2">
                            <label for="message" class="visually-hidden">Message</label>
                            <input id="message" type="text" class="form-control" placeholder="Message">
                            <button class="btn btn-primary" id="btn-sub" type="button"><a href="/contactus"
                                    style="text-decoration: none; color:white">Send</a></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-flex justify-content-between border-top">
                <p>© 2022 Cinematic. All rights reserved<br>create by Me:)</p>
                <ul class="list-unstyled d-flex sosmed">
                    <li class="ms-3">
                        <a href="https://www.instagram.com/anisaftr.18/" target="_blank"><i
                                class="bi bi-twitter"></i></a>
                    </li>
                    <li class="ms-3">
                        <a href="https://www.instagram.com/anisaftr.18/" target="_blank"><i
                                class="bi bi-instagram"></i></a>
                    </li>
                    <li class="ms-3">
                        <a href="https://www.facebook.com/nissa.fitrianida/" target="_blank"><i
                                class="bi bi-facebook"></i></a>
                    </li>
                    <li class="ms-3">
                        <a href="https://www.youtube.com/channel/UCR4XM5TL6of3eSZEBix1vBw" target="_blank"><i
                                class="bi bi-youtube"></i></a>
                    </li>
                    <li class="ms-3">
                        <a href="mailto:2010631170003@student.unsika.ac.id"><i class="bi bi-envelope-fill"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Footer End -->

    <!-- Scroll To Top -->
    <div onclick="scrollToTop()" class="scrollTop"><i class="bi bi-chevron-double-up"></i></div>
    <!-- Scroll To Top -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{!! asset('assets/js/script.js') !!}"></script>
    <script src="{!! asset('assets/js/transaction.js') !!}"></script>
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }

        function openForm2() {
            document.getElementById("myForm2").style.display = "block";
        }

        function closeForm2() {
            document.getElementById("myForm2").style.display = "none";
        }
    </script>
</body>

</html>
