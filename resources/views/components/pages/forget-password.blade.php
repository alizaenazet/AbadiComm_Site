<x-app-layout 
gap="12px" title="admin login">
    <x-slot:navbar> {{-- not using navbar  --}} </x-slot> 
    <div class="w-full flex justify-start md:justify-center">
        <a href="/login">
            <p class="text-blue-600 cursor-pointer hover:text-accent hover:font-bold">kembali</p>
        </a>
    </div>
    <form action="/forger-password/notice" method="POST" class="w-full h-full">
        @csrf
    <button type="submit" class="w-full h-full flex justify-center">
        <div class="w-max h-fit border-2 flex flex-row items-start gap-3 py-[10px] px-[20px] rounded-md">
            <div class=" w-full h-full flex justify-center items-center ">
                <svg class="w-[50px] h-fit" xmlns="http://www.w3.org/2000/svg" height="84" viewBox="0 -960 960 960" width="84"><path d="m720-160-56-56 63-64H560v-80h167l-63-64 56-56 160 160-160 160ZM160-280q-33 0-56.5-23.5T80-360v-400q0-33 23.5-56.5T160-840h520q33 0 56.5 23.5T760-760v204q-10-2-20-3t-20-1q-10 0-20 .5t-20 2.5v-147L416-520 160-703v343h323q-2 10-2.5 20t-.5 20q0 10 1 20t3 20H160Zm58-480 198 142 204-142H218Zm-58 400v-400 400Z"/></svg>
            </div>
            <div class=" flex flex-col  items-start ">
                <p class="text-normal-sm md:text-normal-lg font-sans font-bold">send link into</p>
                <p class="text-normal-sm md:text-normal-lg font-sans">{{$email}}</p>
            </div>
        </div>
    </button>
    </form>

</x-app-layout >