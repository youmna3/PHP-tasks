@extends('layouts.admin')
@section('content')
    <h2>Add Categories</h2>
    <form method="POST" action="{{ url('admin/categories/' . $category->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Edit Category Name</label>
        <div class="col-4">
            <input class="form form-control" name="name" value="{{ old('name', $category->name) }}" />
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input name="image" type="file" /><br />
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button class="btn btn-success">Edit</button>
            <a class="btn btn-secondary" href="{{ url('admin/categories') }}">Cancel</a>
        </div>
    </form>
@endsection
