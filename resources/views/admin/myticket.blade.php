@extends('layouts.main')

@section('content')
    <div class="container">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
        </svg>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 text-white">My Ticket</h1>
        </div>
        <div class="card p-5" style="height: 100%; margin-bottom:50px">
            <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Film</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Studio</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Jumlah Tiket</th>
                        <th scope="col">No Kursi</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Total</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php $no=1; @endphp
                    @foreach ($myticket as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->film }}</td>
                            <td>{{ $row->tgl }}</td>
                            <td>{{ $row->studio }}</td>
                            <td>{{ $row->jam }}</td>
                            <td>{{ $row->jml_ticket }}</td>
                            <td>{{ $row->no_kursi }}</td>
                            <td>{{ $row->harga }}</td>
                            <td>{{ $row->total2 }}</td>
                            <td>{{ $row->created_at }}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#exampleModalLong">
                                    View
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Detail Ticket</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-5">
                                    {!! QrCode::size(200)->generate('http://127.0.0.1:8000/user/myticket') !!}
                                </div>
                                <div class="col"></div>
                                <div class="col-6">
                                    <h2>{{ $row->film }}</h2>
                                    <h6>Tanggal : {{ $row->tgl }}</h6>
                                    <h6>studio : {{ $row->studio }}</h6>
                                    <h6>Jam : {{ $row->jam }}</h6>
                                    <h6>Jumlah Ticket : {{ $row->jml_ticket }}</h6>
                                    <h6>No Kursi : {{ $row->no_kursi }}</h6>
                                    <h6>Harga : {{ $row->harga }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <h6 style="margin-right:225px">Total Harga : {{ $row->total2 }}</h6>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
