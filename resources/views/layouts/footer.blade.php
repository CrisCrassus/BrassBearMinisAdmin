<div class="bg-primary py-12">
    <div class="w-3/5 mx-auto text-white font-ibarra">
        <div class="w-full flex justify-between">
            <div class="pt-5">
                <h6 class="text-2xl mb-3">
                    Brass Bear Minis
                </h6>
                <p>Sign up for the newsletter</p>
            </div>
        </div>
        <div class="w-full flex justify-between border-b border-white border-solid items-center">
            <div class="w-1/3 my-4">
                <div class="flex gap-x-5">
                    <input type="text" class="w-3/4 shadow-custom text-xl py-2 px-2 font-ibarra text-black"
                        id="newsletter-email" name="newsletter-email">
                    <div class="w-1/4 bg-white/20 flex justify-center items-center">
                        <a href="#">Sign Up</a>
                    </div>
                </div>
            </div>
            <div class="flex gap-x-5">
                <a href="" class="text-lg text-white/70 hover:text-white transition-colors duration-150">On
                    Sale</a>
                <a href="" class="text-lg text-white/70 hover:text-white transition-colors duration-150">View
                    Ranges</a>
                @if (App\Models\Configuration::getConfiguration()->services())
                    <a href="" class="text-lg text-white/70 hover:text-white transition-colors duration-150">3D
                        Printing</a>
                @endif
                @if (App\Models\Configuration::getConfiguration()->contact())
                    <a href=""
                        class="text-lg text-white/70 hover:text-white transition-colors duration-150">Contact</a>
                @endif
            </div>
        </div>
        <div class="text-center pt-4">
            <a href="#">
                <p class="text-lg text-white/70 hover:text-white transition-colors duration-150">Privacy Policy</p>
            </a>
        </div>
    </div>
</div>
