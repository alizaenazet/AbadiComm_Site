<x-app-layout 
gap="12px" title="admin login">
    <x-slot:navbar>
        <x-dashboard-navbar />    
    </x-slot> 
    <div class=" mt-12 w-full h-max">
<h1 class="text-h1-sm md:text-h1-lg font-serif font-medium">Dashboard menu</h1>
<div class="mt-3 flex flex-row items-center justify-center flex-wrap gap-2 w-full h-full shadow-inner bg-gray-50 py-[30px] px-[15px] rounded-sm">
    
    <div class="flex flex-col items-center justify-center w-full max-w-[336px] md:max-w-[245px] lg:max-w-[271px] h-fit gap-5 pt-[8px] pb-[11px] px-[18px] bg-white hover:shadow-inner shadow-lg border-1 border-gray-300  rounded-md">
        <div class="w-full h-fit flex justify-between flex-row">
            <h3 class="text-h3-sm md:text-h3-lg text-primary">Portfolio</h3>
            <a href="/dashboard/portfolios/create" class="w-fit h-fit">
                <svg class="md:w-[34px] h-fit fill-accent" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
            </a>    
        </div>
        <a href="/dashboard/portfolios" class="w-full h-fit">
            <button type="button" class="text-accent w-full hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  dark:border-yellow-300 dark:text-accent dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">more options</button>
        </a>    
    </div>
    <div class="flex flex-col items-center justify-center w-full max-w-[336px] md:max-w-[245px] lg:max-w-[271px] h-fit gap-5 pt-[8px] pb-[11px] px-[18px] bg-white hover:shadow-inner shadow-lg border-1 border-gray-300  rounded-md">
        <div class="w-full h-fit flex justify-between flex-row">
            <h3 class="text-h3-sm md:text-h3-lg text-primary">Activity Gallery</h3>
            <a href="/dashboard/galleries/create" class="w-fit h-fit">
                <svg class="md:w-[34px] h-fit fill-accent" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
            </a>    
        </div>
        <a href="/dashboard/galleries" class="w-full h-fit">
            <button type="button" class="text-accent w-full hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  dark:border-yellow-300 dark:text-accent dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">more options</button>
        </a>    
    </div>
    <div class="flex flex-col items-center justify-center w-full max-w-[336px] md:max-w-[245px] lg:max-w-[271px] h-fit gap-5 pt-[8px] pb-[11px] px-[18px] bg-white hover:shadow-inner shadow-lg border-1 border-gray-300  rounded-md">
        <div class="w-full h-fit flex justify-between flex-row">
            <h3 class="text-h3-sm md:text-h3-lg text-primary">Team member</h3>
            <a href="/dashboard/team-members/create" class="w-fit h-fit">
                <svg class="md:w-[34px] h-fit fill-accent" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
            </a>    
        </div>
        <a href="/dashboard/team-members" class="w-full h-fit">
            <button type="button" class="text-accent w-full hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  dark:border-yellow-300 dark:text-accent dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">more options</button>
        </a>    
    </div>
    
    
</div>
</div>
</x-app-layout >