@extends('layouts.admin')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <a class="btn btn-success" href="{{ url('admin/products/create') }}">Add</a>
    <table class="table table-bordered table-striped text-center ">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Image</th>
                <th>Color</th>
                <th>Size</th>
                <th>Recent</th>
                <th>Featured</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($products as $product)
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['category']['name'] }}</td>
                    <td>{{ $product['description'] }}</td>
                    <td>{{ $product['price'] }}</td>
                    <td>{{ $product['discount'] }}</td>
                    <td><img src="{{ asset('storage/' . $product->image) }}"width="100px" /></td>
                    <td>{{ $product['color']['name'] }}</td>
                    <td>{{ $product['size']['name'] }}</td>
                    <td>{{ $product['is_recent'] }}</td>
                    <td>{{ $product['is_featured'] }}</td>
                    <td><a href="{{ url('admin/products/' . $product['id']) }}"class="btn btn-success">Show</a></td>
                    <td><a href="{{ url('admin/products/' . $product['id'] . '/edit') }}" class="btn btn-success">EDIT</a>
                    </td>
                    <td>
                        <form action="{{ url('admin/products/' . $product['id']) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $products->links() !!}
@endsection
