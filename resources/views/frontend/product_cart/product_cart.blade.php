@extends('layouts.font')
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
@endpush
@section('title')

@endsection
@section('content')

<div class="row">
    <div class="col-mb-8">
        <div class="ibox p-5">
            <div class="ibox-head mb-3">
                <h4 class="ibox-title text-center">Product cart</h4>
            </div>
            <div class="ibox-body px-2 justify-content-center" >
                <table class="table table-sm table-responsive" id="role-datatables">
                    <thead>
                        <th>SL</th>
                        <th>Product Image</th>
                        <th>Product Title</th>
                        <th>Price</th>
                        <th>Product Quantity</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @php
                          $total=0;
                        @endphp

                        @if (session('cart'))
                            @foreach (session('cart') as $key=>$details)
                                @php
                                    $price=($details['discount_price'] !=null) ? $details['discount_price'] : $details['product_price'];
                                @endphp
                                <tr data-id="{{ $key }}">
                                    <td>{{ $key }}</td>
                                    <td><img style="width: 80px; height: 70px" src="{{ asset('images/product/'.$details['image']) }}" alt="{{ $details['product_title'] }}"></td>
                                    <td>{{ $details['product_title'] }}</td>
                                    <td>${{ $price }}</td>
                                    <td id="cart-content">
                                        <input type="number"  value="{{ $details['product_quantity'] }}" class="update-cart quantity">
                                    </td>
                                    <td>${{ $price * $details['product_quantity'] }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm delete-cart show-message-btn" data-id="{{ $key }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                       
                </table>
            </div>
            <div class="all_product_price">
                @php
                    $totalprice=0;
                @endphp
                @if (session('cart'))
                    @foreach ((array) session('cart') as $id => $details)
                        @php
                            $price = ($details['discount_price'] != null) ? $details['discount_price'] : $details['product_price'];
                            $totalprice += $price * $details['product_quantity'];
                        @endphp
                    @endforeach
                @endif
                <h5 class="text-center">Total price ${{  $totalprice }}</h5>
            </div>
            <br><br>
            <div class="process_order text-center">
                <h4 class="mb-2" style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Proceed To Order Payment</h4>
                <a href="{{ route('stripe',$totalprice) }}" class="btn btn-sm btn-success">Pay Using Card</a>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
         $('.update-cart').on('change', function(e) {
            e.preventDefault();
            var ele=$(this);
            $.ajax({
                url: '{{ route('product.cart.update') }}',
                method: "post",
                data: {
                    _token:'{{ csrf_token() }}',
                    id: ele.closest("tr").attr("data-id"),
                    product_quantity: ele.closest("tr").find(".quantity").val()

                },
                success: function (response) {
                    window.location.reload()
                }
            });
        });

        $(".delete-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);

        Swal.fire({
            title: 'Are you sure?',
            text: 'product!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ route('product.cart.delete') }}',
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'DELETE',
                        id: ele.closest("tr").attr("data-id"),
                    },
                    success: function (response) {
                        location.reload();;
                    }
                });
            }
        });
    });
        
        
    </script>
   
@endpush