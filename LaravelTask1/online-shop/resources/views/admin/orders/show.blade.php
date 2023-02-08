@extends('layouts.admin')
@section('content')
    <table class="table table-bordered table-striped text-center ">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Product</th>
                <th>order</th>
                <th>quantity</th>
                <th>price</th>
            </tr>
        </thead>
        {{-- <tbody>
        <tr>
            @foreach ($orders as $order)
                <td>{{ $order['id'] }}</td>
                <td>{{ $order['user_id'] }}</td>
                <td>{{ $order['sub_total'] }}</td>
                <td>{{ $order['shipping'] }}</td>
                <td>{{ $order['total'] }}</td>
                <td><a href="{{ url('admin/orders/' . $order['id']) }}" class="btn btn-success">Show</a>

        </tr>
        @endforeach
    </tbody> --}}
    </table>
    <table class="table table-bordered table-striped text-center ">
        <thead class="thead-dark">
            <tr>
                <th>name</th>
                <th>email</th>
                <th>mobile</th>
                <th>adress1</th>
                <th>adress2</th>
                <th>country</th>
                <th>city</th>
                <th>state</th>
                <th>zip code</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->mobile }}</td>
                <td>{{ $order->address1 }}</td>
                <td>{{ $order['address2'] }}</td>
                <td>{{ $order['country'] }}</td>
                <td>{{ $order['city'] }}</td>
                <td>{{ $order['state'] }}</td>
                <td>{{ $order['zip_code'] }}</td>
            </tr>

            </tr>
        </tbody>
    </table>
@endsection
