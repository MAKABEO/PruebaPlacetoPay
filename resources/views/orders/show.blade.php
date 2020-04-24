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
                                <th>ID Producto</th>
                                <th>Nombre Producto</th>
                                <th>Cantidad</th>
                                <th>SubTotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->products as $product)
                                <tr class="text-center">

                                    <td class="product-name">
                                        <h3>{{$product->id }}</h3>
                                    </td>

                                    <td class="product-name">
                                        <h3>{{ $product->product_name }}</h3>
                                    </td>

                                    <td class="product-name">
                                        <h3>{{ $product->pivot->quantity }}</h3>
                                    </td>

                                    <td class="price">${{ $product->pivot->ammount }}</td>

                                </tr><!-- END TR-->
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
