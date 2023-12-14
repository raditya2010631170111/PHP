@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
            <div>
                <br><br>
            </div>
            {{-- Tampilan Show Film --}}
            <div class="card" style="border: 0; background-color: transparent; height:1000px">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="flex-none">
                            <img src="{{ asset('/assets/img/posterfilm/' . $orders->gambar) }}" alt="gambar"class="w-64 lg:w-100" width="300px">
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-6">
                        <div class="md:ml-24">
                            <h2 class="text-4xl md:mt-0 font-semibold text-white">{{ $orders->products_id }}</h2>
                            <!--<div class="flex flex-wrap items-center text-white text-sm mb-5">

                                <span class="ml-1"><i class="bi bi-star-fill" style="color: yellow"></i>
                                    {{ $orders->rating }}</span>
                                <span class="mx-1">|</span>
                                <span>{{ $orders->release_date }}</span>
                                <span class="mx-1">|</span>
                                <span class="certification">{{ $orders->rating_usia }}</span>
                                <div class="mt-3">{{ $orders->genre }}</div>
                            </div>
                            <div class="text-white" style="font-size: 14px">
                                <h3>Overview</h3>
                            </div>
                            <p class="text-white mt-8 mb-3">
                                {{ $orders->overview }}
                            </p>-->

                            <div id="demo-modal" class="modal" role="dialog" tabindex="-1">
                                <div class="model-inner">
                                    <div class="modal-header">
                                        <h3 style="color: #003566;"><strong>Orders {{ $orders->products_id }}</strong></h3>
                                        <button class="modal-close"
                                            style="background-color: transparent; border:0; color:#003566; font-size:30px;"
                                            data-id="demo-modal;" aria-label="Close">
                                            &times;
                                        </button>
                                    </div>
                                    <div class="modal-body px-8 py-8"></div>
                                    <div
                                        class="responsive-container overflow-hidden relative embed-responsive embed-responsive-16by9">
                                        <iframe width="560" height="315"
                                            src="https://www.youtube.com/embed/{{ $orders->products_id }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            <span class="btn btn-primary">
                                <button class="modal-open" style="background-color: transparent; border:0; color:white;"
                                    data-id="demo-modal">Watch Orders</button>
                            </span>

                            <button type="submit" class="btn btn-warning btn-block open-button" onclick="openForm()"
                                data-toggle="modal" data-target="#contohModal">Buy Ticket</button>
                            {{-- End Show Film --}}

                            {{-- Form Pemesanan --}}

                            <div class="form-popup" id="myForm">
                                <form action="/transaction/create" method="POST" name="myform" class="form-container"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <h4>{{ $orders->products_id }}</h4>
                                    <hr>
                                    <div>
                                        <input type="text" name="film" id="film" value="{{ $orders->products_id }}" hidden>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="schedule text-white">
                                                <div class="ms-2">
                                                    <span style="margin-right: 10px;">
                                                        <input type="radio" name="tgl" id="1" class="hidebx"
                                                            value="2022-06-01">
                                                        <label for="1" class="lbl-radio">
                                                            <div class="display-box">
                                                                <div class="date">10 Mei</div>
                                                                <div class="day">SEL</div>
                                                            </div>
                                                        </label>
                                                    </span>

                                                    <span style="margin-right: 10px">
                                                        <input type="radio" name="tgl" id="2" class="hidebx"
                                                            value="2022-06-02">
                                                        <label for="2" class="lbl-radio">
                                                            <div class="display-box">
                                                                <div class="date">11 Mei</div>
                                                                <div class="day">RAB</div>
                                                            </div>
                                                        </label>
                                                    </span>

                                                    <span style="margin-right: 10px">
                                                        <input type="radio" name="tgl" id="3" class="hidebx"
                                                            value="2022-06-03">
                                                        <label for="3" class="lbl-radio">
                                                            <div class="display-box">
                                                                <div class="date">12 Mei</div>
                                                                <div class="day">KAM</div>
                                                            </div>
                                                        </label>
                                                    </span>

                                                    <span style="margin-right: 10px">
                                                        <input type="radio" name="tgl" id="4" class="hidebx"
                                                            value="2022-06-04">
                                                        <label for="4" class="lbl-radio">
                                                            <div class="display-box">
                                                                <div class="date">13 Mei</div>
                                                                <div class="day">JUM</div>
                                                            </div>
                                                        </label>
                                                </div>

                                                <div class="form-floating mb-4 mt-3 text-dark">
                                                    <select name="studio" id="studio" onchange="harganya()"
                                                        class="form-select" aria-label="Floating label select">
                                                        <option selected>-- Select --</option>
                                                        <option value="Dolby">Dolby</option>
                                                        <option value="Regular 2D">Regular 2D</option>
                                                        <option value="IMAX 2D">IMAX 2D</option>
                                                    </select>
                                                    <label for="release_date" class="form-label">Studio</label>
                                                </div>

                                                <div class="mt-1">
                                                    <input type="radio" name="jam" id="time1" class="hidebx"
                                                        value="10.30">
                                                    <label for="time1" class="lbl-radio2">
                                                        <div class="display-box2">
                                                            <div class="time">10.30</div>
                                                        </div>
                                                    </label>

                                                    <input type="radio" name="jam" id="time2" class="hidebx"
                                                        value="12.00">
                                                    <label for="time2" class="lbl-radio2">
                                                        <div class="display-box2">
                                                            <div class="time">12.00</div>
                                                        </div>
                                                    </label>

                                                    <input type="radio" name="jam" id="time3" class="hidebx"
                                                        value="13.30">
                                                    <label for="time3" class="lbl-radio2">
                                                        <div class="display-box2">
                                                            <div class="time">13.30</div>
                                                        </div>
                                                    </label>
                                                </div>
                                                </span>

                                                <div class="text-white  p-4">
                                                    <div class="form-floating mb-4 mt-3 text-dark">
                                                        <input type="number" name="jml_ticket" id="jml_ticket"
                                                            class="form-control" placeholder="jml_ticket"
                                                            onkeyup="total()">
                                                        <label for="jml_ticket" class="form-label">Jumlah
                                                            Tiket</label>
                                                    </div>

                                                    <div class="row mt-3">
                                                        <div class="col-lg-5">
                                                            <input type="checkbox" name="no_kursi[]" id="A1"
                                                                class="hidebx" value="A1">
                                                            <label for="A1" class="lbl-checkbox">
                                                                <div class="display-box3">
                                                                    <div class="seat">A1</div>
                                                                </div>
                                                            </label>

                                                            <input type="checkbox" name="no_kursi[]" id="A2"
                                                                class="hidebx" value="A2">
                                                            <label for="A2" class="lbl-checkbox">
                                                                <div class="display-box3">
                                                                    <div class="seat">A2</div>
                                                                </div>
                                                            </label>

                                                            <input type="checkbox" name="no_kursi[]" id="A3"
                                                                class="hidebx" value="A3">
                                                            <label for="A3" class="lbl-checkbox">
                                                                <div class="display-box3">
                                                                    <div class="seat">A3</div>
                                                                </div>
                                                            </label>

                                                        </div>
                                                        <div class="col-lg-7">
                                                            <input type="checkbox" name="no_kursi[]" id="A4"
                                                                class="hidebx" value="A4">
                                                            <label for="A4" class="lbl-checkbox">
                                                                <div class="display-box3">
                                                                    <div class="seat">A4</div>
                                                                </div>
                                                            </label>

                                                            <input type="checkbox" name="no_kursi[]" id="A5"
                                                                class="hidebx" value="A5">
                                                            <label for="A5" class="lbl-checkbox">
                                                                <div class="display-box3">
                                                                    <div class="seat">A5</div>
                                                                </div>
                                                            </label>

                                                            <input type="checkbox" name="no_kursi[]" id="A6"
                                                                class="hidebx" value="A6">
                                                            <label for="A6" class="lbl-checkbox">
                                                                <div class="display-box3">
                                                                    <div class="seat">A6</div>
                                                                </div>
                                                            </label>

                                                            <input type="checkbox" name="no_kursi[]" id="A7"
                                                                class="hidebx" value="A7">
                                                            <label for="A7" class="lbl-checkbox">
                                                                <div class="display-box3">
                                                                    <div class="seat">A7</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-lg-5">
                                                            <input type="checkbox" name="no_kursi[]" id="B1"
                                                                class="hidebx" value="B1">
                                                            <label for="B1" class="lbl-checkbox">
                                                                <div class="display-box3">
                                                                    <div class="seat">B1</div>
                                                                </div>
                                                            </label>

                                                            <input type="checkbox" name="no_kursi[]" id="B2"
                                                                class="hidebx" value="B2">
                                                            <label for="B2" class="lbl-checkbox">
                                                                <div class="display-box3">
                                                                    <div class="seat">B2</div>
                                                                </div>
                                                            </label>

                                                            <input type="checkbox" name="no_kursi[]" id="B3"
                                                                class="hidebx" value="B3">
                                                            <label for="B3" class="lbl-checkbox">
                                                                <div class="display-box3">
                                                                    <div class="seat">B3</div>
                                                                </div>
                                                            </label>

                                                        </div>
                                                        <div class="col-lg-7">
                                                            <input type="checkbox" name="no_kursi[]" id="B4"
                                                                class="hidebx" value="B4">
                                                            <label for="B4" class="lbl-checkbox">
                                                                <div class="display-box3">
                                                                    <div class="seat">B4</div>
                                                                </div>
                                                            </label>

                                                            <input type="checkbox" name="no_kursi[]" id="B5"
                                                                class="hidebx" value="B5">
                                                            <label for="B5" class="lbl-checkbox">
                                                                <div class="display-box3">
                                                                    <div class="seat">B5</div>
                                                                </div>
                                                            </label>

                                                            <input type="checkbox" name="no_kursi[]" id="B6"
                                                                class="hidebx" value="B6">
                                                            <label for="B6" class="lbl-checkbox">
                                                                <div class="display-box3">
                                                                    <div class="seat">B6</div>
                                                                </div>
                                                            </label>

                                                            <input type="checkbox" name="no_kursi[]" id="B7"
                                                                class="hidebx" value="B7">
                                                            <label for="B7" class="lbl-checkbox">
                                                                <div class="display-box3">
                                                                    <div class="seat">B7</div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-lg-4">
                                                            <input type="checkbox" name="no_kursi[]" id="C"
                                                                class="hidebx" value="C">
                                                            <label for="C" class="lbl-checkbox">
                                                                <div class="display-box3">
                                                                    <div class="seat">C</div>
                                                                </div>
                                                            </label>
                                                            <span style="font-size: 9px">
                                                                Unavailable
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="checkbox" name="no_kursi[]" id="C"
                                                                class="hidebx selected" value="C">
                                                            <label for="C" class="lbl-checkbox">
                                                                <div class="display-box3">
                                                                    <div class="seat">C</div>
                                                                </div>
                                                            </label>
                                                            <span style="font-size: 9px">
                                                                Available
                                                            </span>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="checkbox" name="no_kursi[]" id="C"
                                                                class="hidebx checked" value="C">
                                                            <label for="C" class="lbl-checkbox">
                                                                <div class="display-box3">
                                                                    <div class="seat">C</div>
                                                                </div>
                                                            </label>
                                                            <span style="font-size: 9px">
                                                                Your Choice
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="seats text-dark p-2">
                                                <h5 class="">{{ $orders->products_id }}</h5>
                                                <hr>
                                                {{-- Detail Pesanan --}}
                                                <div class="form-floating mb-4 mt-3 text-dark">
                                                    <input type="text" name="harga" id="harga" class="form-control"
                                                        placeholder="harga" value="">
                                                    <label for="harga" class="form-label">Harga</label>
                                                </div>
                                                <div class="form-floating mb-4 mt-3 text-dark">
                                                    <input type="text" name="total2" id="total2" class="form-control"
                                                        placeholder="total2" value="">
                                                    <label for="total2" class="form-label">Total Harga</label>
                                                </div>

                                                <div class="btn btn-warning"><button type="button" class="modal-open2"
                                                        style="background-color: transparent; border:0; color:aliceblue;"
                                                        data-id="demo-modal2">Buy Ticket</button></div>

                                                <button type="button" class="btn cancel" style="color:aliceblue;"
                                                    onclick="closeForm()">Close</button>
                                                {{-- End Form Pemesanan --}}

                                                {{-- Pop Up Pembayaran --}}
                                                <div id="demo-modal2" class="modal2" role="dialog" tabindex="-1">
                                                    <div class="model-inner2">
                                                        <div class="modal-header2">
                                                            <h3>Pembayaran</h3>
                                                            <button type="button" class="modal-close2"
                                                                style="background-color: transparent; border:0; color:#003566; font-size:30px;"
                                                                data-id="demo-modal2" aria-label="Close">
                                                                &times;
                                                            </button>
                                                        </div>
                                                        <div class="modal-body px-8 py-8">
                                                            <div class="">
                                                                <h2 class="text-center mb-3" style="font-size: 50px">
                                                                    <b>Payment</b>
                                                                </h2>
                                                                <h4 class="text-center mb-2" style="font-size: 30px">Accept
                                                                    Here</h4>
                                                                <div class="p-3">{!! QrCode::size(200)->generate('@php echo $shuffle;@endphp') !!}</div>
                                                                <h4 class="text-center mb-3">Kode Pembayaran</h4>
                                                                <h5 class="text-center mb-3 uppercase">
                                                                    @php
                                                                        $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
                                                                        $shuffle = substr(str_shuffle($karakter), 0, 15);
                                                                        echo $shuffle;
                                                                    @endphp
                                                                </h5>
                                                                <div class="modal-header2 btn btn-warning">
                                                                    <button type="submit" class="modal-close2"
                                                                        style="color:#003566; font-size:25px; background-color:transparent; border:0; font-weight:600; text-decoration:none"
                                                                        data-id="demo-modal2" aria-label="Close">
                                                                        Confirm Payment
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- End Popup Pembayaran --}}
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
