@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle" id="products">
                        @foreach ($products as $product)
                            <tr>
                                <td class="align-middle">
                                    <img src="{{ asset('storage/' . $product['image']) }}" alt=""
                                        style="width: 50px" />
                                    {{ $product['name'] }}
                                </td>
                                <td class="align-middle">{{ $product->getPrice() }}</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px">
                                        <div class="input-group-btn">
                                            <button type="button" onclick="decQuan({{ $product['id'] }})"
                                                class="decBtn btn btn-sm btn-primary btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text"
                                            class="quantityVal form-control form-control-sm bg-secondary border-0 text-center"
                                            value="{{ $product['quantity'] }}" />
                                        <div class="input-group-btn">
                                            <button type="button" onclick="incQuan({{ $product['id'] }})"
                                                class="incBtn btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">${{ $product->getPrice() * $product['quantity'] }}</td>
                                <td class="align-middle">
                                    <button class="btn btn-sm btn-danger"
                                        onclick="remove({{ $product['id'] }})"type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code" />
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3">
                    <span class="bg-secondary pr-3">Cart Summary</span>
                </h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Sub-total</h6>
                            <h6 id="sub-total">${{ $subTotal }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium" id="shipping">${{ $shipping }}</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5 id="total">${{ $total }}</h5>
                        </div>
                        <a href="{{ url('checkout') }}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">
                            Proceed To Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection

@section('scripts')
    <script>
        function incQuan(id) {
            $.ajax({
                url: '{{ url('/inc-product') }}',
                data: {
                    id: id
                },
                success: (data) => {
                    console.log(data);
                }
            })
        }

        function decQuan(id) {
            $.ajax({
                url: '{{ url('/dec-product') }}',
                data: {
                    id: id
                },
                success: (data) => {
                    console.log(data);
                }
            })
        }

        function remove(id) {
            $.ajax({
                url: '{{ url('/remove-product') }}',
                data: {
                    id: id
                },
                success: (data) => {
                    console.log(data);
                }
            })
        }
    </script>
@endsection
