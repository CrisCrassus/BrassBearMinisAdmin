@extends('layouts.app')

@section('content')
<div class="w-full py-12">
    <div class="w-3/5 mx-auto mb-32">
        <img src="/storage/images/banner_2.png" class="w-full" alt="">
        <div class="mt-10">
            <h3 class="text-center mb-5 font-ibarra uppercase text-xl">View Ranges</h3>
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
        <div class="grid grid-cols-2 my-24 gap-y-4 gap-x-8">
            @foreach ($ranges as $range)
            <a href="/products?range={{$range->slug}}" >
                <div class="col-span-1 flex flex-col text-center hover:bg-black/20 transition-all duration-200 p-4">
                    <img src="{{$range->banner_path}}" alt="{{$range->description}}">
                    <h4 class="font-ibarra uppercase mt-4 text-xl">{{$range->title}}</h4>
                </div>
            </a>
            @endforeach

        </div>
    </div>
</div>
@endsection
