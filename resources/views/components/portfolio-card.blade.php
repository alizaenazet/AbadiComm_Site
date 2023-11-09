<div class="flex flex-wrap flex-col w-[40%] flex-1">

    <div class="w-full h-[200px]">
        <img class="object-cover max-h-full min-h-full rounded-lg flex-col" src={{ $image }} alt="" />
    </div>

    <p class="w-[497px] text-black text-2xl font-bold font-['Poppins']">{{ $title }}</p>

    <div class="w-fit h-fit flex flex-row flex-wrap gap-3">
        @foreach ($categories as $category)
        <x-category name={{$category->name}}/>
        @endforeach
    </div>

    <p class="w-[418px] h-[37px] text-black text-base font-normal font-['Poppins']">
        {{ $date }}, {{ $promoter }}
    </p>

    <button type="button"
        class=" px-[22px] py-[3px] max-w-fit border-2 border-amber-300 justify-center items-center gap-2.5 flextext-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
        See Detail
    </button>
</div>
