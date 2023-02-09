@extends('layouts.admin')
@section('content')
    <table class="table table-bordered table-striped text-center ">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>User</th>
                <th>Sub-total</th>
                <th>Shipping</th>
                <th>Total</th>
                <th>Show Order</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($orders as $order)
                    <td>#{{ $order['id'] }}</td>
                    <td>#{{ $order['user_id'] }}</td>
                    <td>${{ $order['sub_total'] }}</td>
                    <td>${{ $order['shipping'] }}</td>
                    <td>${{ $order['total'] }}</td>
                    <td><a href="{{ url('admin/orders/' . $order['id']) }}" class="btn btn-success">Show</a>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $orders->links() !!}
@endsection
