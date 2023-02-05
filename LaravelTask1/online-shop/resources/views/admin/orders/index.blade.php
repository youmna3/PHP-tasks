@extends('layouts.admin')
@section('content')
    <table class="table table-bordered table-striped text-center ">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>sub-total</th>
                <th>shipping</th>
                <th>total</th>
                <th>EDIT</th>
            </tr>

            {{-- @foreach ($orders as $order)
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['name'] }}</td>
                <td><img src="{{ asset('storage/' . $product->image) }}"width="100px" /></td>
            @endforeach --}}
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection
