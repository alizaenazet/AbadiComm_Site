<x-app-layout 
gap="18px" title="admin login">
    <x-slot:navbar>
        <x-dashboard-navbar />    
    </x-slot> 

    <div class="flex flex-col justify-center md:gap-1 items-start w-full h-fit" >
        <h2 class="text-h1-sm md:text-h2-lg">Gallery list</h2>
        <a href='/dashboard/galleries/create' class="w-full">
            <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-normal-sm md:text-input-lg px-[10px] md:px-[10px] py-[5px] md:py-[5px] text-center  dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">tambah</button> </a>
    </div>
    
    <div class="w-full h-full flex flex-row flex-wrap gap-3 justify-center">
        @foreach ($galleries as $gallery)
        <div class="flex w-full h-[125px] flex-row md:flex-col items-center  justify-center md:items-center gap-2 md:w-[256px] md:h-[297px] px-[10px] py-[10px] bg-primary border-gray-400 rounded-md">
            <img class=" w-full md:w-[152px] h-full aspect-[1/1] rounded-md " src={{$gallery->image_url}} alt="">
            <div class=" w-full h-full  flex flex-col gap-3 items-center " >
                <p class=" w-fit h-full md:h-[72px] text-white text-input-sm md:text-input-lg text-ellipsis overflow-hidden" >{{$gallery->content}}</p>
                <div class="w-full h-fit flex flex-row gap-1 justify-start">
                    <a href="/dashboard/galleries/{{$gallery->id}}/update" type="button" class="w-max text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[10px] py-[8px] text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        update
                    </a>
                    <form action="/dashboard/galleries/{{$gallery->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-max text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[10px] py-[8px] text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-fit me-2 fill-accent" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                            Hapus
                            </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</x-app-layout >
