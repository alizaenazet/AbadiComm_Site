<x-app-layout 
gap="18px" title="admin login">
    <x-slot:navbar>
        <x-dashboard-navbar />    
    </x-slot> 

    <div class="flex flex-col justify-center gap-2 md:gap-3 items-start w-full h-fit" >
        {{-- alert dialog for division status --}}
        @if (session('divisionStatus'))
                <div id="division-status-alert" class="alert alert-success">
                    <div class="flex items-center p-[10px] mb-[5px] text-sm text-green-800 rounded-lg bg-success dark:bg-gray-800 dark:text-green-400" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                        <span class="font-medium">alert!</span> {{ session('divisionStatus') }}
                        </div>
                    </div>
                </div>
        @endif
        
        {{-- alert dialog for team member status --}}
        @if (session('teamMemberStatus'))
                <div id="division-status-alert" class="alert alert-success">
                    <div class="flex items-center p-[10px] mb-[5px] text-sm text-green-800 rounded-lg bg-success dark:bg-gray-800 dark:text-green-400" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                        <span class="font-medium">alert!</span> {{ session('teamMemberStatus') }}
                        </div>
                    </div>
                </div>
        @endif

        <h2 class="text-h1-sm md:text-h2-lg">Team member list</h2>
        <div class="flex flex-row w-full flex-wrap gap-2 items-start">
            <a href='/dashboard/team-members/create' class="w-max">
                <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-normal-sm md:text-input-lg px-[10px] md:px-[10px] py-[5px] md:py-[5px] text-center  dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Tambah member</button> 
            </a>
            
<button data-modal-target="add-devision-modal" data-modal-toggle="add-devision-modal" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-normal-sm md:text-input-lg px-[10px] md:px-[10px] py-[5px] md:py-[5px] text-center  dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" type="button">
    Tambah devisi
    </button>
    
    <div id="add-devision-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-[90%] max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-devision-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-[15px] md:p-5 text-center">
                    <div class="w-full h-fit flex flex-col items-center justify-center flex-wrap gap-2">
                        <h3 class="w-full text-center text-h3-sm font-medium md:text-h3-lg">Divisions</h3>
                        <form action="/dashboard/division/create" method="POST" class="flex flex-row gap-1 w-full h-fit justify-end items-end">
                            @csrf
                            <div class="flex flex-col gap-1 items-start w-full ">
                                <label for="division-name-input" class="block  text-sm font-medium text-gray-900 dark:text-white">Divisi baru</label>
                                <input type="text" id="division-name-input" name="divisionName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            </div>
                            <div class="min-h-full w-fit">
                                <button type="submit" class="w-max h-full text-white bg-blue-700 border-[1px] border-accent hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[10px] py-[8px] text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-6 h-fit  fill-accent" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z"/></svg>
                                    Add
                                    </button>
                            </div>
                        </form>
                        <ul class="my-4 space-y-3 w-full h-[75%] overflow-y-auto">
                            @foreach ($division as $division)
                            <li class="w-full">
                            <div class="flex w-full justify-between items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-100 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                <span class="flex-1 text-start text-input-sm md:text-input-lg font-normal ms-3 whitespace-nowrap text-ellipsis overflow-hidden">{{$division->name}}</span>
                                <span class="inline-flex items-center justify-center px-2 py-0.5 ms-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">
                                    <form action="/dashboard/division/{{$division->id}}" method="POST" class="h-full w-full">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-max h-full text-white bg-secondary border-[1px] border-accent hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[10px] py-[8px] text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="w-4 h-fit me-2 fill-accent" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                                            remove
                                            </button>
                                    </form>
                                </span>
                            </div>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
        </div>
    </div>
    
    <div class="w-full h-full flex flex-row flex-wrap gap-3 justify-center">
        @foreach ($members as $member)
        <div class="w-[301px] h-ull flex-warp flex flex-col gap-3 bg-gradient-to-br from-primary from-45% to-secondary rounded-xl px-[20px] py-[27px]"> 

            <div class="flex justify-center backdrop-blur-md rounded-lg" style="box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37)">
                <img class="object-cover rounded-md max-h-[213px] " src={{ $member->image_url }} alt="">
            </div>
        
            <div class="flex-col items-start flex ">
                <div class="">
                    <h1 class="font-bold text-h3-lg font-sans text-white"> {{ $member->name }} </h1>
                </div>
                <div>
                    <h4 class="font-bold text-white text-normal-lg font-sans">{{ $member->division->name }}</h4>
                </div>
                <div>
                    <p class="text-white text-input-lg font-sans">{{ $member->qualification }}</p>
                </div>
            </div>
            <div class="w-full h-fit flex flex-row gap-1 justify-start">
                <a href="/dashboard/team-members/{{$member->id}}/update" type="button" class="w-max border-[1px] border-accent text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[10px] py-[8px] text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    update
                </a>
                <form action="/dashboard/team-member/{{$member->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-max text-white bg-blue-700 border-[1px] border-accent hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[10px] py-[8px] text-center inline-flex items-center  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-fit me-2 fill-accent" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                        Hapus
                        </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    <script>
        $(document).ready(function () {
            $('#division-status-alert').delay(1300).fadeOut();
            $('#teamMemberStatus').delay(1300).fadeOut();
        });
    </script>

</x-app-layout >
