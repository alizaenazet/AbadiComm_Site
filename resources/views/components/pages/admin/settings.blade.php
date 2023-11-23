<x-app-layout 
gap="18px" title="admin login">
    <x-slot:navbar> 
    </x-slot> 

<div>
    <div>
        <a href="/dashboard">Kembali</a>
        <button form="settings-form" type="submit">Confirm</button>
    </div>
    <form class="max-w-sm mx-auto" action="/dashboard/settings" method="POST" id="settings-form">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username : </label>
            <input type="username" name="username"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required value="{{$user -> name}}">
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                password</label>
            <input type="password" name="password"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required>
        </div>
        <div class="mb-5">
            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repeat
                password</label>
            <input type="password" name="password_confirmation"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                required>
        </div>
        <div class="mb-5">
            <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Whatsapp : </label>
            <input type="contact" name="contact" max="13" min="7"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                value="{{!empty($whatsappContact) ? $whatsappContact -> phone_number : ''}}">
        </div>
        <div class="mb-5">
            <label for="partner" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Partner Whatsapp : </label>
            <input type="partner" name="partner" max="13" min="7"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                value="{{!empty($whatsappPartner) ? $whatsappPartner -> phone_number : ''}}">
        </div>
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                email</label>
            <input type="email" name="email"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                placeholder="name@flowbite.com" required value="{{$user -> email}}">
        </div>
       
       
    </form>

</div>
</x-app-layout >
