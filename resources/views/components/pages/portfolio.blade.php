<x-app-layout gap="20px" title='{{$portfolio->title}}'>
    <x-slot:navbar>
        <x-navbar />
    </x-slot>
    <div class="mt-6 w-full h-fit flex flex-col justify-center items-center gap-3">
        <div id="imageDisplay" class="aspect-[3/2] w-full max-h-[300px]  md:max-h-[578px] lg:w-fit lg:h-[638px]  rounded-lg bg-contain" style="background-image: url({{$portfolio->portfolioImage[0]->image_url}})"></div>
        <div class="flex flex-row h-max  overflow-x-auto gap-2">
            @foreach ($portfolio->portfolioImage as $image)
                <img id={{$image->id}} class="imagesItem aspect-[3/2] max-w-[62px]  md:max-w-[72px]  hover:border-4 hover:border-accent hover:rounded-md cursor-pointer " src={{$image->image_url}}  alt="">
            @endforeach
        </div>
    </div>

    <div class="flex flex-col h-full gap-1 items-center" >
        <h1 class="font-serif font-bold text-h1-sm md:text-h1-lg" >{{$portfolio->title}}</h1>
        <h3 class="text-h3-sm md:text-h3-lg" >{{$portfolio->date}}</h3>
    </div>

    <div class="max-w-full h-max flex flex-col justify-start items-center gap-20 ">
        <div class=" w-fit  max-h-[200px] lg:max-w-[750px] grid grid-rows-2 md:grid-cols-2 gap-16 md:gap-6 place-content-center ">
            <div class="flex flex-col gap-3 w-full h-full md:border-r-2 md:border-black pr-[16px]">
                <h3 class="text-h3-sm md:text-h3-lg w-full text-start">Kategori event</h3>
                <div class="w-fit  flex flex-row flex-wrap gap-2">
                    @foreach ($portfolio->categories as $category)
                    <x-category name='{{ $category->name }}' />    
                    @endforeach
                </div>
            </div>
            <div class="flex w-fit flex-col gap-3 lg:max-w-[250px]">
                <h3 class="text-h3-sm md:text-h3-lg">Penyelenggara</h3>
                <ul class="pl-[15px] list-disc list-outside">
                    @foreach ($portfolio->portfolioPromoter as $promoter)
                    <li class="text-medium-sm md:text-medium-lg">{{$promoter->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="w-full flex flex-col gap-1 items-start">
            <h2 class="font-serif text-h2-lg">Deskripsi</h3>
            <p class="text-medium-sm md:text-h3-lg">{{$portfolio->content}}</p>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            var onDisplayId = ""
            $('img.imagesItem').click(function (e) { 
                e.preventDefault();
                var id = $(this).attr('id');
                if (onDisplayId) {
                    $('#'+onDisplayId).removeClass('border-4 border-primary rounded-md drop-shadow-xl');
                }
                var imageUrl = $(this).attr('src');
                var imageClass = $(this).attr('class')
                $('#imageDisplay').attr('style', `background-image: url(${imageUrl})`);
                $(this).addClass(`border-4 border-primary rounded-md drop-shadow-xl`);
                onDisplayId = id
            });
        });
    </script>
</x-app-layout>