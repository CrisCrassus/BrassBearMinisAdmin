<a href="/products/{{ $item->slug }}">
    <div class="col-span-1 hover:bg-black/20 transition-all duration-200 p-4">
        @if ($product->id <= 7)
            <div class="overflow-hidden">
                <img src="{{ $product->primaryImage[0]->path }}"
                    class="w-full overflow-hidden hover:scale-110 transition-all duration-500 ease-out" alt="">
            </div>
        @endif
        <p class="font-ibarra text-xl mt-2 line-clamp-2 min-h-[4.2rem] overflow-ellipsis">{{ $item->title }}</p>
        <p class="font-ibarra text-xl">£{{ $item->price }}</p>
    </div>
</a>
