@extends('layouts.app')

@include('models.badge')
@include('models.product')

@php
    $productsClass = [];
    foreach ($products as $product) {
        foreach ($product as $item) {
            $newProduct = new Product();
            $newProduct->setId($item['id']);
            $newProduct->setFrontImage($item['frontImage']);
            $newProduct->setBackImage($item['backImage']);
            $newProduct->setBrand($item['brand']);
            $newProduct->setName($item['name']);
            $newProduct->setPrice($item['price']);
            $newProduct->setIsInFavorites($item['isInFavorites']);
            // dd($item['badges']);
            foreach ($item['badges'] as $badge) {
                $newProduct->setBadges($badge['type'], $badge['value']);
            }
            $productsClass[] = $newProduct;
        }
    }

    // dd($productsClass);

@endphp

@section('content')
    <div class="container mt-3">
        <div class="row">
            @foreach ($productsClass as $product)
                <div class="col-4">
                    <div class="ms_card">
                        {{-- Card Image and Tags --}}
                        <div class="thumb">
                            <div class="heart">
                                <span>&hearts;</span>
                            </div>
                            <img class="show" src="{{ Vite::asset($product->getFrontImage()) }}" alt="">
                            <img class="hidden" src="{{ Vite::asset($product->getBackImage()) }}" alt="">

                            <div class="container-tag">
                                @php
                                    $badge = $product->getBadges();
                                    // dd($badge[0]);
                                @endphp
                                @foreach ($badge as $key => $item)
                                    @if (empty($item->getTag()))
                                        <div class="tag red">
                                            {{ $item->getDiscount() }}
                                        </div>
                                    @endif
                                @endforeach

                                @foreach ($badge as $key => $item)
                                    @if (empty($item->getDiscount()))
                                        <div class="tag green">
                                            {{ $item->getTag() }}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        {{-- Card Text --}}
                        <div class="card-text">
                            <div class="brand">
                                {{ $product->getBrand() }}
                            </div>
                            <div class="name">
                                {{ $product->getName() }}
                            </div>
                            <div class="price">
                                {{ $product->getPrice() }}&euro;

                                @if ($product->getOldPrice() != 0)
                                    <span class="old-price">
                                        {{ strval($product->getOldPrice()) }}&euro;
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
