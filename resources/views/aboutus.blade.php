@extends('layouts.main3')

@section('content')
    <section class="about py-5">
        <div id="about" class="container">
            <div class="row">
                <div class="container">
                    <div class="p-5">

                        <h1 class="text-center mb-5">About Cinematic</h1>
                        <p style="text-align: justify;">
                            Cinematic is a Cinema Transactional service that makes it easy for us to process
                            transactions. This online cinema ticket booking project is a web that makes it easier for us to
                            order cinema tickets. because by using this web we can make transactions anywhere and anytime.
                            In addition, by using this website, we don't need to queue at the cinema when we want to order
                            tickets. We are also trying to provide a new viewing experience
                            for fans of Indonesian films with interesting, affordable, and convenient content.
                            The Cinematix team thanks you for watching Indonesian films legally,
                            By watching this film, you have contributed to advancing Indonesian cinema and
                            support filmmakers who work on quality films with love.
                            A wide selection of quality local content can be enjoyed and accessed by all film lovers
                            in the homeland.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="container py-5">
                    <h1 class="text-center" style="font-size: 50px;">Cinematic Team</h1>
                    <div id="aboutus" class="row justify-content-center">
                        <div class="col-md-6 col-lg-4">
                            <div class="card mb-5">
                                <div class="card-body">
                                    <img src="{!! asset('assets/img/user3.jpg') !!} " class="img-fluid rounded-circle w-50 mb-3">
                                    <h3>Anisa Nur Hasanah</h3>
                                    <h5 class="text-muted">Web Designer</h5>
                                    <p class="fs-5">Seorang Web Designer yang menyukai kegemasan dan warna ungu
                                    </p>
                                    <div class="py-3">
                                        <a href="https://www.instagram.com/anisaaa_hsnh/"
                                            class="text-secondary text-decoration-none fs-5 me-4">
                                            <i class="bi bi-facebook"></i>
                                        </a>
                                        <a href=" https://github.com/AnisaNurHasanah"
                                            class="text-secondary text-decoration-none fs-5 me-4">
                                            <i class="bi bi-github"></i>
                                        </a>
                                        <a href="https://www.instagram.com/anisaaa_hsnh/"
                                            class="text-secondary text-decoration-none fs-5 me-4">
                                            <i class="bi bi-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card mb-5">
                                <div class="card-body">
                                    <img src="{!! asset('assets/img/user1.jpg') !!}" class="img-fluid rounded-circle w-50 mb-3">
                                    <h3>Anisa Fitrianida L P</h3>
                                    <h5 class="text-muted">Web Developer, Web Designer</h5>
                                    <p class="fs-5">Seorang Web Developer yang merangkap menjadi Web Designer
                                        merupakan cita - citanya</p>
                                    <div class="py-3">
                                        <a href="https://www.facebook.com/nissa.fitrianida/"
                                            class="text-secondary text-decoration-none fs-5 me-4">
                                            <i class="bi bi-facebook"></i>
                                        </a>
                                        <a href=" https://github.com/AnisaFitrianidaLP"
                                            class="text-secondary text-decoration-none fs-5 me-4">
                                            <i class="bi bi-github"></i>
                                        </a>
                                        <a href="https://www.instagram.com/anisaftr.18/"
                                            class="text-secondary text-decoration-none fs-5 me-4">
                                            <i class="bi bi-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card mb-5">
                                <div class="card-body">
                                    <img src="{!! asset('assets/img/user2.jpg') !!}" class="img-fluid rounded-circle w-50 mb-3">
                                    <h3>Dede Fitriyani</h3>
                                    <h5 class="text-muted">Data Analyst</h5>
                                    <p class="fs-5">Seorang Data Analyst yang hobi mengkaji segala hal, asalnya
                                        dari jakarta</p>
                                    <div class="py-3">
                                        <a href="https://www.instagram.com/dede.efye/"
                                            class="text-secondary text-decoration-none fs-5 me-4">
                                            <i class="bi bi-facebook"></i>
                                        </a>
                                        <a href=" https://github.com/DedeFitriyani"
                                            class="text-secondary text-decoration-none fs-5 me-4">
                                            <i class="bi bi-github"></i>
                                        </a>
                                        <a href="https://www.instagram.com/dede.efye/"
                                            class="text-secondary text-decoration-none fs-5 me-4">
                                            <i class="bi bi-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="p-5">
                    <h1>Contact Us</h1>
                    <h5><i class="bi bi-whatsapp"></i> Whatsapp</h5>
                    <p>0813241212xx</p>
                    <h5><i class="bi bi-envelope"></i> Email</h5>
                    <p>contact.cinematic@cinematic.com</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Desc End -->
@endsection
