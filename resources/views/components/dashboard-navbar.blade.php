<div class="w-full h-fit p-3 flex flex-row justify-between" >
    <a href="/dashboard">
        <img class="w-14 lg:w-24 h-fit" src="/images/logo_small.svg" alt="">
    </a>
    <div>
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white   focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 md:hidden" type="button">
            <svg class="fill-primary" xmlns="http://www.w3.org/2000/svg" height="34" viewBox="0 -960 960 960" width="24"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
        </button>

        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden drop-shadow-md bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 ">
            <ul class="p-[8px] text-sm text-gray-700  dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            <li>
                <a href="/list-portfolio" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
            </li>
            <li>
                <form action="/logout" method="POST" class="w-full h-fit">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
            </ul>
        </div>
    </div>

    <div class="hidden md:flex flex-row gap-1  ">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Settings</button>
        <form action="/logout" method="POST" class="w-full h-full">
        @csrf
        <button type="submit" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Logout</button>
        </form>
    </div>
</div>