<div class="w-[301px] h-ull flex-warp flex flex-col gap-3 bg-gradient-to-br from-primary from-45% to-secondary rounded-xl px-[20px] py-[27px]"> 

    <div class="flex justify-center backdrop-blur-md rounded-lg" style="box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37)">
        <img class="object-cover rounded-md max-h-[213px] " src={{ $imageUrl }} alt="">
    </div>

    <div class="flex-col items-start flex ">
        <div class="">
            <h1 class="font-bold text-h3-lg font-sans text-white"> {{ $name }} </h1>
        </div>
        <div>
            <h4 class="font-bold text-white text-normal-lg font-sans">{{ $divisionName }}</h4>
        </div>
        <div>
            <p class="text-white text-input-lg font-sans">{{ $qualification }}</p>
        </div>
    </div>
</div>