<x-app-layout gap="40px" title="ListPortfolio">
    <div class="w-full h-fit flex flex-col justify-center items-center gap-3">
        <div class="w-[70%] h-[578px] rounded-lg bg-contain" style="background-image: url({{$portfolio->portfolioImage[0]->image_url}})"></div>
        <div class="flex flex-row gap-1">
            @foreach ($portfolio->portfolioImage as $image)
                <img class="w-[72px] h-[72px]" src={{$image->image_url}}  alt="">
            @endforeach
        </div>
    </div>

    <div class="flex flex-col gap-1 items-center" >
        <h1 class="font-serif font-bold text-h1-lg" >{{$portfolio->title}}</h1>
        <h3 class="text-h3-lg" >{{$portfolio->date}}</h3>
    </div>

    <div class="flex flex-row w-full h-max gap-8">
        <div class="flex-1 border-r-2 border-gray-500">
            <h3 class="text-h3-lg">Kategori event</h3>
        </div>
        <div class="flex-1">
            <h3 class="text-h3-lg">Penyelenggara</h3>
            
        </div>
    </div>
    <div class="w-full flex flex-col gap-4 items-start">
        <h2 class="font-serif text-h2-lg">Deskripsi</h3>
        <p>{{$portfolio->content}}</p>
    </div>
</x-app-layout>