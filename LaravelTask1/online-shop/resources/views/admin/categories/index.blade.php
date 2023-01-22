@extends('layouts.admin')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <a class="btn btn-success" href="{{ url('admin/categories/create') }}">Add</a>
    <table class="table table-bordered table-striped text-center ">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Category Name</th>
                <th>Image</th>
                <th>DELETE</th>
                <th>EDIT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($categories as $category)
                    <td>{{ $category['id'] }}</td>
                    <td>{{ $category['name'] }}</td>
                    <td><img src="{{ asset('storage/' . $category->image) }}"width="100px" /></td>
                    <td><a href="{{ url('admin/categories/' . $category['id'] . '/edit') }}"
                            class="btn btn-success">EDIT</a>
                    </td>
                    <td>
                        <form action="{{ url('admin/categories/' . $category['id']) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $categories->links() !!}
@endsection
