@extends('layouts.admin')
@section('content')
    <table class="table table-bordered table-striped text-center ">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Order</th>
                <th>Product</th>
                <th>quantity</th>
                <th>price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderDetails as $orderDetail)
                <tr>
                    <td>{{ $orderDetail['id'] }}</td>
                    <td>#{{ $orderDetail['order_id'] }}</td>
                    <td>#{{ $orderDetail['product_id'] }}</td>
                    <td>{{ $orderDetail['quantity'] }}</td>
                    <td>${{ $orderDetail['price'] }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table table-bordered table-striped text-center ">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Adress1</th>
                <th>Adress2</th>
                <th>Country</th>
                <th>City</th>
                <th>State</th>
                <th>Zip Code</th>
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
