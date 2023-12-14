@extends('layouts.sidebar')

@section('content')
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
    </svg>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card" style="background-color: rgb(152, 171, 236);">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h3>Products</h3>
                            <h4>{{ $playstations }}</h4>
                            <a href="/playstations" style="text-decoration: none; color:#001d3d;">See More</a>
                        </div>
						
						<div class="col-8">
                            <h3>Products</h3>
                            <h4>{{ $playstations }}</h4>
                            <a href="/playstations/playstations" style="text-decoration: none; color:#001d3d;">Export Import Excel</a>
                        </div>
                        <div class="col-4">
                            <i class="bi bi-playstations" style="font-size:70px; color:#001d3d;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card" style="background-color: rgb(152, 171, 236);">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h3>Users</h3>
                            <h4>{{ $users }}</h4>
                            <a href="/user" style="text-decoration: none; color:#001d3d;">See More</a>
                        </div>
                        <div class="col-4">
                            <i class="bi bi-person-fill" style="font-size:70px; color:#001d3d;"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class=" col-lg-4">
            <div class="card" style="background-color: rgb(152, 171, 236);">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h3>Transactions</h3>
                            <h4>{{ $transactions }}</h4>
                            <a href="/transaction" style="text-decoration: none; color:#001d3d;">See More</a>
                        </div>
                        <div class="col-4">
                            <i class="bi bi-credit-card" style="font-size:70px; color:#001d3d;"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- @endforeach --}}
    <div class="row">
        <div class="col">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
            </svg>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Data Users</h1>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                    </tr>
                </thead>

                <tbody>
                    @php $no=1; @endphp
                    @foreach ($datausers as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->username }}</td>
                            <td>
                        <tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
            </svg>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Transactions</h1>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Movies</th>
                        <th scope="col">Jumlah Tiket</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach ($datatrans as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->playstations }}</td>
                            <td>{{ $row->jml_ticket }}</td>
                            <td>{{ $row->total2 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
