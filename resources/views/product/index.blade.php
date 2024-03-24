@extends('layouts.app')

@section('content')
<div class="w-full py-12">
    <div class="w-3/5 mx-auto mb-32">
        <img src="/storage/images/banner_2.png" class="w-full" alt="">
        <div class="mt-10">
            <h3 class="text-center mb-5 font-ibarra uppercase text-xl">Available To Buy</h3>
            <p class="font-ibarra text-lg">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, optio esse asperiores saepe
                tempora nisi minima, laboriosam aperiam voluptates similique dolorem, debitis eos dolorum adipisci
                veniam assumenda? Ea, id modi.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, optio esse asperiores saepe
                tempora nisi minima, laboriosam aperiam voluptates similique dolorem, debitis eos dolorum adipisci
                veniam assumenda? Ea, id modi.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, optio esse asperiores saepe
                tempora nisi minima, laboriosam aperiam voluptates similique dolorem, debitis eos dolorum adipisci
                veniam assumenda? Ea, id modi.
            </p>
        </div>
        <div class="grid grid-cols-4 my-24 gap-x-4" id="products">
            <div class="col-span-1">
                <product-filter>

                </product-filter>
            </div>
            <div class="col-span-3">
                <div class="grid grid-cols-3 gap-4">
                    @foreach ($products as $product)
                        @include('components.product', ['item' => $product])
                    @endforeach

                </div>
                <div class="mt-10">
                    {{ $products->links() }}
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
