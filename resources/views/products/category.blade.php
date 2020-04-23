@extends('layouts.shop.app')

@section('content')
    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 text-center">
                    <ul class="product-category">
                        <li><a href="{{url('/shop')}}">Todos</a></li>
                        @foreach($categories as $category)
                            @if($category->id == $selectedCategory)
                                <li><a class="active" href="{{url('/shop/category',$category->id)}}">{{$category->name}}</a></li>
                            @else
                                <li><a href="{{url('/shop/category',$category->id)}}">{{$category->name}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <a href="{{url('/shop',$product->id)}}" class="img-prod"><img class="img-fluid" src="<?php $random = rand(1,12); echo asset("vegefood/images/product-$random.jpg") ?>" alt="Colorlib Template">
                                <span class="status">30%</span>
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="{{url('/shop',$product->id)}}">{{$product->product_name}}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price"><span class="price-sale">${{$product->price}}</span></p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="{{url('/shop',$product->id)}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        @auth
                                            <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                                <span><i class="ion-ios-cart"></i></span>
                                            </a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{$products->links()}}
        </div>
    </section>
@endsection
