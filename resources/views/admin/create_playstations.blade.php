@extends('layouts.sidebar')

@section('content')
    <section class="py-3">
        <div class="    row">
            <div class="col-md-12">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Create Playstations</h1>
                </div>
                <form action="/playstations/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-4">
                        <select name="title" id="title" class="form-select"
                            aria-label="Floating label select">
                            <option selected>-- Select --</option>
                            <option value="PS1">PS1</option>
                            <option value="PS2">PS2</option>
                            <option value="PS3">PS3</option>
                            <option value="PS4">PS4</option>
                            <option value="PS5">PS5</option>
                        </select>
                        <label for="title" class="form-label">Name Playstations</label>
                    </div>
                    <div class="mb-4">
                        <label for="gambar" class="form-label">Gambar</label><br>
                        <input type="file" name="gambar" id="gambar" class="form-control" placeholder="gambar">
                    </div>
					<div class="form-floating mb-4">
                        <input type="text" name="rental_price" id="rental_price" class="form-control" placeholder="rental_price">
                        <label for="rental_price" class="form-label">Rental Price</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="text" name="denda" id="denda" class="form-control" placeholder="denda">
                        <label for="denda" class="form-label">Denda</label>
                    </div>
					<div class="form-floating mb-2">
                        <textarea class="form-control" placeholder="tata_tertib" name="tata_tertib" id="tata_tertib" style="height: 100px"></textarea>
                        <label for="tata_tertib">Tata Tertib</label>
                    </div>
                    <input type="submit" value="Tambah" name="tambah" class="btn btn-primary">
                </form>
            </div>
        </div>
    </section>
@endsection
