<div>
    <h3 class="text-center mb-5 font-ibarra uppercase text-xl">Contact</h3>
    <p class="font-ibarra text-lg">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, optio esse asperiores saepe
        tempora nisi minima, laboriosam aperiam voluptates similique dolorem, debitis eos dolorum adipisci
        veniam assumenda? Ea, id modi.
    </p>
    <form class="w-4/5 mx-auto my-5" name="contact-form" id="contact-form" method="POST" action="{{route('send-mail')}}">
        <div>
            <label for="contact-email" class="font-ibarra text-xl">Email</label>
            <br>
            <input id="contact-email" name="contact-email" type="text"
                class="w-full shadow-custom h-9 px-2 font-ibarra mt-3 border-none">
        </div>
        <div class="mt-5">
            <label for="contact-message" class="font-ibarra text-xl">Message</label>
            <br>
            <textarea id="contact-message" name="contact-message" type="text" rows="8"
                class="w-full shadow-custom p-2 font-ibarra mt-3 border-none"></textarea>
        </div>
        <div class="w-full flex justify-center mt-3">
            <button
                type="submit"
                class="text-decoration-none bg-primary px-10 py-3 font-ibarra text-white hover:text-primary hover:bg-white hover:text-bold border border-solid border-primary transition-all duration-200">
                Send Message
            </button>
        </div>
    </form>
</div>
