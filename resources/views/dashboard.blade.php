<x-app-layout 
gap="12px" title="admin login">
    <x-slot:navbar>
        <x-dashboard-navbar />    
    </x-slot> 
<div class="mt-[30px] flex flex-row items-center justify-center flex-wrap gap-2 w-full h-full">
    
    <div class="flex flex-col items-center justify-center w-full max-w-[336px] md:max-w-[245px] lg:max-w-[271px] h-fit gap-5 pt-[8px] pb-[11px] px-[18px] bg-primary rounded-md">
        <div class="w-full h-fit flex justify-between flex-row">
            <h3 class="text-h3-sm md:text-h3-lg text-white">Portfolio</h3>
            <a href="/dashboard/portfolio/create" class="w-fit h-fit">
                <svg class="md:w-[34px] h-fit fill-accent" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
            </a>    
        </div>
        <a href="/dashboard/list-portfolio" class="w-full h-fit">
            <button type="button" class="text-accent w-full hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  dark:border-yellow-300 dark:text-accent dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">more options</button>
        </a>    
    </div>
    
    <div class="flex flex-col items-center justify-center w-full max-w-[336px] md:max-w-[245px] lg:max-w-[271px] h-fit gap-5 pt-[8px] pb-[11px] px-[18px] bg-primary rounded-md">
        <div class="w-full h-fit flex justify-between flex-row">
            <h3 class="text-h3-sm md:text-h3-lg text-white">gallery</h3>
            <a href="/dashboard/gallery/create" class="w-fit h-fit">
                <svg class="md:w-[34px] h-fit fill-accent" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
            </a>    
        </div>
        <a href="/dashboard/list-gallery" class="w-full h-fit">
            <button type="button" class="text-accent w-full hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  dark:border-yellow-300 dark:text-accent dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">more options</button>
        </a>    
    </div>
    
    <div class="flex flex-col items-center justify-center w-full max-w-[336px] md:max-w-[245px] lg:max-w-[271px] h-fit gap-5 pt-[8px] pb-[11px] px-[18px] bg-primary rounded-md">
        <div class="w-full h-fit flex justify-between flex-row">
            <h3 class="text-h3-sm md:text-h3-lg text-white">team member</h3>
            <a href="/dashboard/team/create" class="w-fit h-fit">
                <svg class="md:w-[34px] h-fit fill-accent" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
            </a>    
        </div>
        <a href="/dashboard/list-team" class="w-full h-fit">
            <button type="button" class="text-accent w-full hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  dark:border-yellow-300 dark:text-accent dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">more options</button>
        </a>    
    </div>
    
    
</div>
</x-app-layout >