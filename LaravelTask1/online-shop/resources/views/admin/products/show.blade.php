@extends('layouts.admin')
@section('content')
    <h2>Show Product</h2>

    <label>Name</label>
    <h3>{{ $product->name }}</h3>
    <img src="{{ asset('storage/' . $product->image) }}" />
    <a class="btn btn-secondary" href="{{ url('admin/products') }}">Cancel</a>
    </form>
@endsection
