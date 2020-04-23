@extends('layouts.shop.app')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="<?php $random = rand(1,12); echo asset("vegefood/images/product-$random.jpg") ?>" class="image-popup"><img src="{{asset("vegefood/images/product-$random.jpg")}}" class="img-fluid" alt="Colorlib Template"></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{$product->product_name}}</h3>
                    <p class="price"><span>${{$product->price}}</span></p>
                    <p>
                        {{$product->description}}
                    </p>
                    <div class="row mt-4">

                        <div class="w-100"></div>
                        <div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
                            <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                            <span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span>
                        </div>
                        <div class="w-100"></div>
                    </div>
                    @auth
                        <p>
                            <a href="#" class="btn btn-primary py-3 px-5" data-toggle="modal" data-target="#modal">
                                Agregar al carrito
                            </a>
                        </p>
                    @endauth
                    @guest
                        <p><a href="{{url('/login')}}" class="btn btn-black py-3 px-5">Agregar al carrito</a></p>
                    @endguest
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Continuar comprando</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    El producto ha sido agregado correctamente deseas ir al carrito o continuar comprando
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Seguir comprando</button>
                    <button type="button" class="btn btn-primary">Seguir al carrito</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){

            var quantitiy=0;
            $('.quantity-right-plus').click(function(e){
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                // If is not undefined
                $('#quantity').val(quantity + 1);
                // Increment
            });

            $('.quantity-left-minus').click(function(e){
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                // If is not undefined
                // Increment
                if(quantity>0){
                    $('#quantity').val(quantity - 1);
                }
            });
        });
    </script>
@endpush

