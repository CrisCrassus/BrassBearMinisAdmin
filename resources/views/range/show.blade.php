@extends('layouts.app')

@section('content')
<div class="w-full py-12">
    <div class="w-3/5 mx-auto mb-32">
        <img src="{{$range->banner_path}}" class="w-full" alt="">
        <div class="mt-10">
            <h3 class="text-center mb-5 font-ibarra uppercase text-xl">{{ $range->title }}</h3>
            <p class="font-ibarra text-lg">
                {{$range->description}}
            </p>
        </div>
        <div class="grid grid-cols-4 my-24 gap-x-4" id="products">
            <div class="col-span-1">
                <product-filter :hide-range="true" />

            </div>
            <div class="col-span-3">
                <div class="grid grid-cols-3 gap-4">
                    <a href="/products/a41c9dbc-ef90-47e5-9a20-55cca289b787">
                        <div class="col-span-1 hover:bg-black/20 transition-all duration-200 p-4">
                            <div class="overflow-hidden">
                                <img src="/storage/images/product.png"
                                    class="w-full overflow-hidden hover:scale-110 transition-all duration-500 ease-out"
                                    alt="">
                            </div>
                            <p class="font-ibarra text-xl mt-2">Dark Master</p>
                            <p class="font-ibarra text-xl">£50</p>
                        </div>
                    </a>
                    <a href="/products/a41c9dbc-ef90-47e5-9a20-55cca289b787">
                        <div class="col-span-1 hover:bg-black/20 transition-all duration-200 p-4">
                            <div class="overflow-hidden">
                                <img src="/storage/images/product.png"
                                    class="w-full overflow-hidden hover:scale-110 transition-all duration-500 ease-out"
                                    alt="">
                            </div>
                            <p class="font-ibarra text-xl mt-2">Dark Master</p>
                            <p class="font-ibarra text-xl">£50</p>
                        </div>
                    </a>
                    <a href="/products/a41c9dbc-ef90-47e5-9a20-55cca289b787">
                        <div class="col-span-1 hover:bg-black/20 transition-all duration-200 p-4">
                            <div class="overflow-hidden">
                                <img src="/storage/images/product.png"
                                    class="w-full overflow-hidden hover:scale-110 transition-all duration-500 ease-out"
                                    alt="">
                            </div>
                            <p class="font-ibarra text-xl mt-2">Dark Master</p>
                            <p class="font-ibarra text-xl">£50</p>
                        </div>
                    </a>
                    <a href="/products/a41c9dbc-ef90-47e5-9a20-55cca289b787">
                        <div class="col-span-1 hover:bg-black/20 transition-all duration-200 p-4">
                            <div class="overflow-hidden">
                                <img src="/storage/images/product.png"
                                    class="w-full overflow-hidden hover:scale-110 transition-all duration-500 ease-out"
                                    alt="">
                            </div>
                            <p class="font-ibarra text-xl mt-2">Dark Master</p>
                            <p class="font-ibarra text-xl">£50</p>
                        </div>
                    </a>
                    <a href="/products/a41c9dbc-ef90-47e5-9a20-55cca289b787">
                        <div class="col-span-1 hover:bg-black/20 transition-all duration-200 p-4">
                            <div class="overflow-hidden">
                                <img src="/storage/images/product.png"
                                    class="w-full overflow-hidden hover:scale-110 transition-all duration-500 ease-out"
                                    alt="">
                            </div>
                            <p class="font-ibarra text-xl mt-2">Dark Master</p>
                            <p class="font-ibarra text-xl">£50</p>
                        </div>
                    </a>
                    <a href="/products/a41c9dbc-ef90-47e5-9a20-55cca289b787">
                        <div class="col-span-1 hover:bg-black/20 transition-all duration-200 p-4">
                            <div class="overflow-hidden">
                                <img src="/storage/images/product.png"
                                    class="w-full overflow-hidden hover:scale-110 transition-all duration-500 ease-out"
                                    alt="">
                            </div>
                            <p class="font-ibarra text-xl mt-2">Dark Master</p>
                            <p class="font-ibarra text-xl">£50</p>
                        </div>
                    </a>
                    <a href="/products/a41c9dbc-ef90-47e5-9a20-55cca289b787">
                        <div class="col-span-1 hover:bg-black/20 transition-all duration-200 p-4">
                            <div class="overflow-hidden">
                                <img src="/storage/images/product.png"
                                    class="w-full overflow-hidden hover:scale-110 transition-all duration-500 ease-out"
                                    alt="">
                            </div>
                            <p class="font-ibarra text-xl mt-2">Dark Master</p>
                            <p class="font-ibarra text-xl">£50</p>
                        </div>
                    </a>
                    <a href="/products/a41c9dbc-ef90-47e5-9a20-55cca289b787">
                        <div class="col-span-1 hover:bg-black/20 transition-all duration-200 p-4">
                            <div class="overflow-hidden">
                                <img src="/storage/images/product.png"
                                    class="w-full overflow-hidden hover:scale-110 transition-all duration-500 ease-out"
                                    alt="">
                            </div>
                            <p class="font-ibarra text-xl mt-2">Dark Master</p>
                            <p class="font-ibarra text-xl">£50</p>
                        </div>
                    </a>
                    <a href="/products/a41c9dbc-ef90-47e5-9a20-55cca289b787">
                        <div class="col-span-1 hover:bg-black/20 transition-all duration-200 p-4">
                            <div class="overflow-hidden">
                                <img src="/storage/images/product.png"
                                    class="w-full overflow-hidden hover:scale-110 transition-all duration-500 ease-out"
                                    alt="">
                            </div>
                            <p class="font-ibarra text-xl mt-2">Dark Master</p>
                            <p class="font-ibarra text-xl">£50</p>
                        </div>
                    </a>
                    <a href="/products/a41c9dbc-ef90-47e5-9a20-55cca289b787">
                        <div class="col-span-1 hover:bg-black/20 transition-all duration-200 p-4">
                            <div class="overflow-hidden">
                                <img src="/storage/images/product.png"
                                    class="w-full overflow-hidden hover:scale-110 transition-all duration-500 ease-out"
                                    alt="">
                            </div>
                            <p class="font-ibarra text-xl mt-2">Dark Master</p>
                            <p class="font-ibarra text-xl">£50</p>
                        </div>
                    </a>
                    <a href="/products/a41c9dbc-ef90-47e5-9a20-55cca289b787">
                        <div class="col-span-1 hover:bg-black/20 transition-all duration-200 p-4">
                            <div class="overflow-hidden">
                                <img src="/storage/images/product.png"
                                    class="w-full overflow-hidden hover:scale-110 transition-all duration-500 ease-out"
                                    alt="">
                            </div>
                            <p class="font-ibarra text-xl mt-2">Dark Master</p>
                            <p class="font-ibarra text-xl">£50</p>
                        </div>
                    </a>
                    <a href="/products/a41c9dbc-ef90-47e5-9a20-55cca289b787">
                        <div class="col-span-1 hover:bg-black/20 transition-all duration-200 p-4">
                            <div class="overflow-hidden">
                                <img src="/storage/images/product.png"
                                    class="w-full overflow-hidden hover:scale-110 transition-all duration-500 ease-out"
                                    alt="">
                            </div>
                            <p class="font-ibarra text-xl mt-2">Dark Master</p>
                            <p class="font-ibarra text-xl">£50</p>
                        </div>
                    </a>
                    <a href="/products/a41c9dbc-ef90-47e5-9a20-55cca289b787">
                        <div class="col-span-1 hover:bg-black/20 transition-all duration-200 p-4">
                            <div class="overflow-hidden">
                                <img src="/storage/images/product.png"
                                    class="w-full overflow-hidden hover:scale-110 transition-all duration-500 ease-out"
                                    alt="">
                            </div>
                            <p class="font-ibarra text-xl mt-2">Dark Master</p>
                            <p class="font-ibarra text-xl">£50</p>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
