@extends('layouts.shop.app')

@section('content')
    <?php $total = 0 ?>
    @if(session('cart'))
        @foreach(session('cart') as $id => $details)
            <?php $total += $details['price'] * $details['quantity'] ?>
        @endforeach
    @endif
    <section class="ftco-section">
        @if(isset($errors) && $errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('pay')}}" method="POST">
            @csrf
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate">
                    <form action="#" class="billing-form">
                        <h3 class="mb-4 billing-heading">Detalles de facturacion</h3>
                        <div class="row align-items-end">
                            <input id="value" name="value" type="hidden" value="{{$total}}">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="customer_name">Nombre</label>
                                    <input type="text" id="customer_name" name="customer_name" class="form-control" placeholder="" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="customer_email">Numero Celular</label>
                                    <input type="text" id="customer_mobile" name="customer_mobile" class="form-control" placeholder="" required>
                                </div>
                            </div>

                            <div class="w-100"></div>

                            <div class="w-100"></div>
                            <div class="w-100"></div>
                            <div class="w-100"></div>
                            <div class="w-100"></div>
                        </div>
                    </form><!-- END -->
                </div>
                <div class="col-xl-5">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Total del Carro</h3>
                                <p class="d-flex">
                                    <span>Subtotal</span>
                                    <span>${{$total}}</span>
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>Total</span>
                                    <span>${{$total}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cart-detail p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Metodo de pago</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            @foreach($paymentPlatforms as $paymentplatform)
                                                <label><input type="radio" name="payment_platform" value="{{$paymentplatform->id}}" class="mr-2" required>{{$paymentplatform->name}}</label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <p><button type="submit" class="btn btn-primary py-3 px-4">Realizar orden</button></p>
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
        </form>
    </section> <!-- .section -->
@endsection
