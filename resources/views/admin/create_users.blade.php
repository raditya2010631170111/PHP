@extends('layouts.sidebar')

@section('content')
    <section class="py-3">
        <div class="row">
            <div class="col-md-12">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Create User</h1>
                </div>
                <form action="/users/create" method="POST">
                    @csrf
                    <div class="form-floating mb-2">
                        <input type="text" name="name" id="name" class="form-control" placeholder="name">
                        <label for="name" class="form-label">Full Name</label><br>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        <label for="username" class="form-label">Username</label><br>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email@gmail.com">
                        <label for="email" class="form-label">Email Address</label><br>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                        <label for="password" class="form-label">Password</label><br>
                    </div>
                    <div class="form-floating mb-4">
                        <select name="level" id="level" class="form-select" aria-label="Floating label select">
                            <option selected>-- Select --</option>
                            <option value="Admin">Admin</option>
                            <option value="Customer">Customer</option>
                        </select>
                        <label for="level" class="form-label">Level</label>
                    </div>
                    <input type="submit" value="Tambah" name="tambah" class="btn btn-primary">
                </form>
            </div>
        </div>
    </section>
@endsection
