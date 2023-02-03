@extends('layouts.admin')
@section('content')
    <table class="table table-bordered table-striped text-center ">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>email</th>
                <th>Admin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['is_admin'] ? 'yes' : 'no' }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {!! $users->links() !!}
@endsection
