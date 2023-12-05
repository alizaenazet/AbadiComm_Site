<x-app-layout 
gap="15px" title="admin login">
<x-slot:navbar></x-slot>    
    <img src="/images/logo_small.svg" alt="" class="w-fit drop-shadow-md">
    <form method="POST" action="/login" class="w-full md:w-[50%] lg:w-[35%] flex flex-col gap-3 items-center p-[34px] rounded-md bg-[#00A9FF] shadow-lg">
        @csrf
        <h1 class="text-h1-sm md:text-h2-lg lg:text-h1-lg text-white font-serif ">Login</h1>
        <div class="w-full">
            <label for="username-input" class="block mb-1  md:text-medium-lg font-medium text-white dark:text-white text-normal-sm">Username</label>
            <input type="text" name="name" class=" text-input-sm md:text-input-lg bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="w-full">
            <label for="password-input" class="block mb-1 text-sm md:text-medium-lg font-medium text-white dark:text-white text-normal-sm">password</label>
            <input type="password" name="password" class=" text-input-sm md:text-input-lg bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <a href="/forget-password" class="w-full ">
        <p class="text-input-sm md:text-normal-lg text-blue-800 ">lupa password</p>
        </a>
        @if ($errors->any() )
            <p class=" flex flex-wrap h-full text-normal-sm md:text-normal-lg text-white">pastikan username dan password benar</p>
        @endif
        <button type="submit" class=" w-full px-[12px] py-[8px] text-h3-sm md:text-h3-lg font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
    </form>

</x-app-layout>