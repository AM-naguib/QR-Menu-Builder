@extends('menu.layouts.app')
@section('content')
    @if (count($menu->categories) > 0)
        @foreach ($menu->categories as $category)
            <div class="menu"style="
                background-image: url('{{ asset('themeimage') }}/1.png');
                background-repeat: no-repeat;
                background-size: cover;
              ">


                <div class="container">
                    <div class="row">
                        <div class="category-products d-flex justify-content-center align-items-center flex-column"
                            style="height: 100vh;">
                            <div class="col-12 text-center ">
                                <h1 class="text-light d-inline p-1 border-bottom">{{ $category->name }}</h1>
                            </div>
                            <div class="products text-light w-100 mt-3 border">
                                <div
                                    class="product-head d-flex justify-content-around align-items-center mt-1 w-100 border-bottom">
                                    <div class="name w-50 d-flex justify-content-center">
                                        <h1>Name</h1>
                                    </div>
                                    <div class="price d-flex w-50 justify-content-center">
                                        <h1>Price</h1>
                                    </div>
                                </div>
                                @if (count($category->products) > 0)
                                    @foreach ($category->products as $product)
                                        @if (!empty($product->price))
                                            <div
                                                class="product d-flex justify-content-around align-items-center py-2 w-100">
                                                <div class="name w-50 d-flex justify-content-center">
                                                    <p class="m-0">{{ $product->name }}</p>
                                                </div>
                                                <div class="price d-flex w-50 justify-content-center">
                                                    <p class="m-0">{{ $product->price }}</p>
                                                </div>
                                            </div>
                                        @else
                                            <div
                                                class="product-with-sizes d-flex justify-content-around align-items-center py-2 w-100 border-bottom">
                                                <div class="name w-50 d-flex justify-content-center">
                                                    <p class="m-0">{{ $product->name }}</p>
                                                </div>
                                                <div
                                                    class="price-Size d-flex gap-3 text-center w-50 justify-content-center">
                                                    @if (!empty($product->small))
                                                        <div class="size-price d-flex flex-column ">
                                                            <p class="m-0">S</p>
                                                            <p class="m-0">{{ $product->small }}</p>
                                                        </div>
                                                    @endif
                                                    @if (!empty($product->medium))
                                                        <div class="size-price d-flex flex-column ">
                                                            <p class="m-0">M</p>
                                                            <p class="m-0">{{ $product->medium }}</p>
                                                        </div>
                                                    @endif
                                                    @if (!empty($product->large))
                                                        <div class="size-price d-flex flex-column ">
                                                            <p class="m-0">L</p>
                                                            <p class="m-0">{{ $product->large }}</p>
                                                        </div>
                                                    @endif
                                                    @if (!empty($product->extra_large))
                                                        <div class="size-price d-flex flex-column ">
                                                            <p class="m-0">XL</p>
                                                            <p class="m-0">{{ $product->extra_large }}</p>
                                                        </div>
                                                    @endif

                                                </div>
                                        @endif
                            </div>
        @endforeach
    @endif


    </div>
    </div>
    </div>
    </div>
    </div>
    @endforeach
    @endif
@endsection
