<main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
    <div class="text-[13px] leading-[20px] flex-1 p-6 pb-6 lg:p-20 lg:pb-10 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
        
        @guest
            <h1 class="mb-2 text-2xl font-black uppercase text-gray-900 dark:text-white">Find Your Best Step.</h1>
            <p class="mb-6 text-[#706f6c] dark:text-[#A1A09A]">
                Welcome to our premium shoe store. Please login or register to explore our exclusive collection and start shopping.
            </p>
            <div class="flex gap-4">
                <a href="{{ route('login') }}" class="px-6 py-2 bg-black text-white rounded font-bold hover:bg-gray-800 transition">Log In</a>
                <a href="{{ route('register') }}" class="px-6 py-2 border border-gray-300 rounded font-bold hover:bg-gray-50 dark:text-white transition">Register</a>
            </div>
        @endguest

        @auth
            <h1 class="mb-2 text-2xl font-black uppercase text-blue-600">Hello, {{ Auth::user()->name }}!</h1>
            <p class="mb-6 text-[#706f6c] dark:text-[#A1A09A]">
                You are logged in. Now you can access our full footwear catalog and latest arrivals.
            </p>
            <a href="{{ route('user.shoes.index') }}" class="inline-flex items-center px-8 py-3 bg-blue-600 text-white rounded-lg font-black uppercase tracking-wider hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">
                Browse Catalog &rarr;
            </a>
        @endauth

    </div>

    <div class="bg-[#fff2f2] dark:bg-[#1D0002] relative lg:-ml-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg w-full lg:w-[438px] shrink-0 overflow-hidden">
        </div>
</main>