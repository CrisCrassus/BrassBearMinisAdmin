@extends('layouts.app')

@section('content')
    <div class="w-full">
        <div class="w-3/5 mx-auto border-b border-black border-solid py-24">
            <div class="mx-auto w-3/4">
                <div class="font-ibarra italic mx-auto pb-5">
                    <p>{{ $product->range->title }} / {{ $product->title }}</p>
                </div>
                <div class="grid grid-cols-2 gap-x-12">
                    <div class="col-span-1">
                        <product-carousel :paths="{{ $images }}"></product-carousel>
                        <div class="flex flex-col gap-y-5 my-5">
                            @if ($product->features)
                                @foreach ($product->features as $feature)
                                    <div class="flex justify-start items-center gap-x-5">
                                        <img src="/storage/images/feature_icons/{{ \App\Enums\Feature::getIcons()[$feature] }}"
                                            class="h-12 w-12" alt="">
                                        <p class="text-lg font-ibarra italic">
                                            {{ \App\Enums\Feature::getLabels()[$feature] }}
                                        </p>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                    </div>
                    <div class="col-span-1 font-ibarra">
                        <h4 class="text-3xl">
                            {{ $product->title }}
                        </h4>
                        <div class="my-5 text-md">
                            <h6 class="font-bold">Includes {{ $product->model_count }} Models</h6>
                        </div>
                        <div class="text-lg">
                            <p>
                                {{ $product->description }}
                            </p>
                        </div>
                        @if (count($product->wargear) > 0)
                            <div class="my-8 text-md">
                                <h6 class="font-bold">Wargear</h6>
                                <ul class="ml-4 mt-1">
                                    @foreach ($product->wargear as $item)
                                        <li class="capitalize">{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (count($product->keywords) > 0)
                            <div class="my-8 text-md">
                                <h6><strong>Keywords</strong> (Faction Codex/Battletome)</h6>
                                <p class="mt-1 uppercase">
                                    @foreach ($product->keywords as $index => $keyword)
                                        @if ($index != count($product->keywords) - 1)
                                            {{ $keyword }},
                                        @else
                                            {{ $keyword }}
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                        @endif
                        @if ($product->sold_at === null)
                            <a href="https://{{ $product->ebay_link }}" target="_blank">
                                <div
                                    class="w-full mt-8 hover:cursor-pointer text-decoration-none bg-primary px-10 py-3 font-ibarra text-white hover:text-primary hover:bg-white hover:text-bold border border-solid border-primary transition-all duration-200">
                                    <p class="text-2xl font-bold border-b border-white border-solid text-center py-2">
                                        £{{ $product->price }}
                                    </p>
                                    <p class="text-2xl text-center py-2">
                                        Purchase On Ebay
                                    </p>
                                </div>
                            </a>
                        @else
                            <div
                                class="w-full mt-8 hover:cursor-pointer text-decoration-none bg-primary px-10 py-3 font-ibarra text-white border border-solid border-primary transition-all duration-200">
                                <p class="text-2xl text-center py-2">
                                    Sold Out
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-24 w-3/5 mx-auto">
        @if (sizeOf($relatedRangeProducts) > 0)
            <div class="w-full mb-16">
                <h4 class="font-ibarra text-xl mb-5">More from {{ $product->range->title }}</h4>
                <div class="grid grid-cols-4 gap-x-8">
                    @foreach ($relatedRangeProducts as $relatedRangeProduct)
                        @include('components.product', ['item' => $relatedRangeProduct])
                    @endforeach
                </div>
                <div class="w-full flex justify-center mt-10">
                    <a href="/products?range={{ $product->range->slug }}">
                        <button
                            class="text-decoration-none bg-primary px-10 py-3 font-ibarra text-white hover:text-primary hover:bg-white hover:text-bold border border-solid border-primary transition-all duration-200">
                            See More
                        </button>
                    </a>
                </div>
            </div>
        @endif
        @if (sizeOf($relatedUnitTypeProducts) > 0)
            <div class="w-full">
                <h4 class="font-ibarra text-xl mb-5">More {{ $product->unitType->title }}</h4>
                <div class="grid grid-cols-4 gap-x-8">
                    @foreach ($relatedUnitTypeProducts as $relatedUnitProduct)
                        @include('components.product', ['item' => $relatedUnitProduct])
                    @endforeach
                </div>
                <div class="w-full flex justify-center mt-10">
                    <a href="/products?unit_type={{ $product->unitType->slug }}">
                        <button
                            class="text-decoration-none bg-primary px-10 py-3 font-ibarra text-white hover:text-primary hover:bg-white hover:text-bold border border-solid border-primary transition-all duration-200">
                            See More
                        </button>
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection
