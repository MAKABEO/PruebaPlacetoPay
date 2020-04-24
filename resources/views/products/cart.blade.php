@extends('layouts.shop.app')

@section('content')
    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $total = 0 ?>
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    <?php $total += $details['price'] * $details['quantity'] ?>
                                    <tr class="text-center">

                                        <form action="/shop/cart" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="delete" />
                                            <input id="id" name="id" type="hidden" value="{{$id}}">
                                            <td class="product-remove"><button type="submit" class="btn-white px-3">X</button></td>
                                        </form>

                                        <td class="image-prod"><div class="img" style="background-image:url(<?php $random = rand(1,12); echo asset("vegefood/images/product-$random.jpg") ?>);"></div></td>

                                        <td class="product-name">
                                            <h3>{{ $details['name'] }}</h3>
                                        </td>

                                        <td class="price">${{ $details['price'] }}</td>

                                        <td class="quantity">
                                            <div class="input-group mb-3">
                                                <input type="text" name="quantity" class="quantity form-control input-number" value="{{ $details['quantity'] }}" min="1" max="100" disabled>
                                            </div>
                                        </td>

                                        <td class="total">${{$details['price']*$details['quantity']}}</td>
                                    </tr><!-- END TR-->
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>${{$total}}</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>$0.00</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>$0.00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>${{$total}}</span>
                        </p>
                    </div>
                    <p><a href="{{ url('/checkout') }}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                </div>
            </div>
        </div>
    </section>
@endsection
