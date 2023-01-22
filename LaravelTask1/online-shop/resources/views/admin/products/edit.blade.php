@extends('layouts.admin')
@section('content')
    <h2>Edit Products</h2>
    <form method="POST" action="{{ url('admin/products/' . $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Product Name</label>
        <div class="col-4">
            <input class="form-control" name="name" value="{{ old('name', $product->name) }}" />
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label>Product Image</label>
            <input name="image" type="file" value="{{ old('image', $product->image) }}" /><br />
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <select class="form-control" name="category_id">
                <option>Category Name</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"{{ old('category_id') == $category['id'] ? 'Selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            <div>
                <label>Description</label>
                <textarea class="form-control" name="description" value="{{ old('description', $product->description) }}"></textarea>
            </div>
            <div>
                <label>Price</label>
                <input class="form-control" name="price" type="number" value="{{ old('price', $product->price) }}" />
            </div>
            <div>
                <label>Discount</label>
                <input class="form-control" name="discount" type="number" step="0.01"
                    value="{{ old('discount', $product->discount) }}" />
            </div>
            <div class="form-group form-check form-group col-6">
                <label>Featured</label>
                <input type="checkbox" name='is_featured'>
                <label>Recent</label>
                <input type="checkbox" name='is_recent'>
            </div>
            <select class="form-control" name="size_id">
                <option>Size</option>
                @foreach ($sizes as $size)
                    <option value="{{ $size->id }}"{{ old('size_id') == $size['id'] ? 'Selected' : '' }}>
                        {{ $size->name }}</option>
                @endforeach
            </select>
            <select class="form-control" name="color_id">
                <option>Color</option>
                @foreach ($colors as $color)
                    <option value="{{ $color->id }}"{{ old('color_id') == $color['id'] ? 'Selected' : '' }}>
                        {{ $color->name }}</option>
                @endforeach
            </select>
            <button class="btn btn-success">Edit</button>
            <a class="btn btn-secondary" href="{{ url('admin/products') }}">Cancel</a>
        </div>
    </form>
@endsection
