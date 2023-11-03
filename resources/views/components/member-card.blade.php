<div class="flex flex-col justify-center  gap-10 bg-accent rounded-xl px-[13px] pt-[27px] pb-[58px] "> 
    <div class="flex justify-center w-[280px] h-[213px] bg-red-800">
        <img class="object-cover rounded-md max-h-[213px] " src={{ $imageUrl }} alt="">
    </div>

    <div class="flex-col items-start gap-20">
        <div class="">
            <h1 class="text-medium-lg font-sans text-white" style="gap: 10px"> {{ $name }} </h1>
        </div>
        <div>
            <h4 class="text-white text-normal-lg font-sans">{{ $divisionName }}</h4>
        </div>
        <div>
            <p class="text-white text-input-lg font-sans">{{ $qualification }}</p>
        </div>
    </div>

</div>
