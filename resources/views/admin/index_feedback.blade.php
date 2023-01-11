@extends('layouts.sidebar')

@section('content')
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
    </svg>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Feedback</h1>
    </div>
    <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User ID</th>
                <th scope="col">Reason</th>
                <th scope="col">Message</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Rate us</th>
                <th scope="col">Created at</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            @php $no=1; @endphp
            @foreach ($data as $row)
                <tr>
                    <th>{{ $no++ }}</th>
                    <th>{{ $row->user_id }}</th>
                    <td>{{ $row->reason }}</td>
                    <td>{{ $row->message }}</td>
                    <td>{{ $row->fname }}</td>
                    <td>{{ $row->lname }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->phonenum }}</td>
                    <td>{{ $row->rate }}</td>
                    <td>{{ $row->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
