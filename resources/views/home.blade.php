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

            foreach ($item['badges'] as $badge) {
                $newProduct->setBadges($badge['type'], $badge['value']);
            }
            $productsClass[] = $newProduct;
        }
    }

    dd($productsClass);
@endphp

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-3">
                    {{-- @dd($product) --}}
                    <div class="ms_card">
                        {{-- <img src="{{ Vite::asset($product) }}" alt=""> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
