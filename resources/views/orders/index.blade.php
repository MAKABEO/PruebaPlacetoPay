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
                                <th>ID</th>
                                <th>Nombre del Comprador</th>
                                <th>Correo</th>
                                <th>Numero Celular</th>
                                <th>Status</th>
                                <th>Costo Total</th>
                                <th>Cantidad</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\Illuminate\Support\Facades\Auth::user()->orders as $order)

                                <tr class="text-center">

                                    <td class="product-name">
                                        <a href="{{url('/profile/orders',$order->id)}}"><h3>{{$order->id}}</h3></a>
                                    </td>

                                    <td class="product-name">
                                        <h3>{{ $order->customer_name }}</h3>
                                    </td>

                                    <td class="product-name">
                                        <h3>{{ $order->customer_email }}</h3>
                                    </td>

                                    <td class="product-name">
                                        <h3>{{ $order->customer_mobile }}</h3>
                                    </td>

                                    <td class="product-name">
                                        <h3>{{ $order->status }}</h3>
                                    </td>

                                    <td class="price">${{ $order->totalAmmount }}</td>

                                    <td class="product-name">
                                        <h3>{{ count($order->products) }}</h3>
                                    </td>

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
