@extends('layouts.app')
@section('content')
@include('components.hero')
    <div class="w-full py-12 hidden md:block">
        <div class="lg:w-3/5 w-full mx-auto flex flex-col lg:flex-row justify-evenly gap-y-6">
            <div class="flex flex-col justify-center lg:gap-y-6 gap-y-3">
                <img src="/storage/images/painting.png" class="lg:h-20 lg:w-20 h-16 w-16 mx-auto" alt="">
                <h3 class="text-black/90 lg:text-start text-center lg:text-4xl text-2xl font-ibarra">Painting</h3>
            </div>
            <div class="flex flex-col justify-center lg:gap-y-6 gap-y-3">
                <img src="/storage/images/building_and_basing.png" class="lg:h-20 lg:w-20 h-16 w-16 mx-auto" alt="">
                <h3 class="text-black/90 lg:text-start text-center lg:text-4xl text-2xl font-ibarra">Building & Basing</h3>
            </div>
            <div class="flex flex-col justify-center lg:gap-y-6 gap-y-3">
                <img src="/storage/images/3D_printing.png" class="lg:h-20 lg:w-20 h-16 w-16 mx-auto" alt="">
                <h3 class="text-black/90 lg:text-start text-center lg:text-4xl text-2xl font-ibarra">3D Printing</h3>
            </div>
        </div>
    </div>
    <div class="w-full py-12">
        <div class="lg:w-3/5 w-4/5 mx-auto mb-32">
            <img src="/storage/images/banner.png" class="w-full" alt="">
            <div class="mt-10">
                <h3 class="text-center mb-5 font-ibarra uppercase text-xl">About Brass Bear Minis</h3>
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
        </div>
        <div class="lg:w-3/5 w-4/5 mx-auto mb-32">
            <h3 class="text-center mb-5 font-ibarra uppercase text-xl">Featured Minis</h3>
            <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-1 gap-8">
                @foreach ($featuredProducts as $product)
                    @include('components.product', ['item' => $product])
                @endforeach
            </div>
            <div class="w-full flex justify-center mt-3">
                <a href="/products">
                    <button
                        class="text-decoration-none bg-primary px-10 py-3 font-ibarra text-white hover:text-primary hover:bg-white hover:text-bold border border-solid border-primary transition-all duration-200">
                        See More
                    </button>
                </a>
            </div>
        </div>
        <div class="lg:w-3/5 w-4/5 mx-auto mb-32">
            <div>
                <h3 class="text-center mb-5 font-ibarra uppercase text-xl">Contact</h3>
                <p class="font-ibarra text-lg">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, optio esse asperiores saepe
                    tempora nisi minima, laboriosam aperiam voluptates similique dolorem, debitis eos dolorum adipisci
                    veniam assumenda? Ea, id modi.
                </p>
                <form class="w-4/5 mx-auto my-5" name="contact-form" id="contact-form
                    ">
                    <div>
                        <label for="contact-email" class="font-ibarra text-xl">Email</label>
                        <br>
                        <input id="contact-email" name="contact-email" type="text"
                            class="w-full shadow-custom h-9 px-2 font-ibarra mt-3">
                    </div>
                    <div class="mt-5">
                        <label for="contact-message" class="font-ibarra text-xl">Message</label>
                        <br>
                        <textarea id="contact-message" name="contact-message" type="text" rows="8"
                            class="w-full shadow-custom p-2 font-ibarra mt-3"></textarea>
                    </div>
                    <div class="w-full flex justify-center mt-3">
                        <button
                            class="text-decoration-none bg-primary px-10 py-3 font-ibarra text-white hover:text-primary hover:bg-white hover:text-bold border border-solid border-primary transition-all duration-200">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
