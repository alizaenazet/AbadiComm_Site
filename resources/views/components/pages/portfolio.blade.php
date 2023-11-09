<x-app-layout gap="20px" title="ListPortfolio">
    <div class="mt-6 w-full h-fit flex flex-col justify-center items-center gap-3">
        <div id="imageDisplay" class="w-[300px] h-[300px] md:w-[678px] md:h-[578px] rounded-lg bg-contain" style="background-image: url(https://random.imagecdn.app/300/300#ef7449/cf4040?text=Elsa+Kohler)"></div>
        {{-- <div id="imageDisplay" class="w-[300px] h-[300px] md:w-[678px] md:h-[578px] rounded-lg bg-contain" style="background-image: url({{$portfolio->portfolioImage[0]->image_url}})"></div> --}}
        <div class="flex flex-row h-max  overflow-x-auto gap-2">
            @foreach ($portfolio->portfolioImage as $image)
                <img id={{$image->id . "1"}} class="imagesItem w-[62px] h-[62px] md:w-[72px] md:h-[72px] hover:border-4 hover:border-accent hover:rounded-md cursor-pointer " src={{$image->image_url}}  alt="">
                <img id={{$image->id . "2"}} class="imagesItem w-[62px] h-[62px] md:w-[72px] md:h-[72px] hover:border-4 hover:border-accent hover:rounded-md cursor-pointer " src={{$image->image_url}}  alt="">
                <img id={{$image->id . "3"}} class="imagesItem w-[62px] h-[62px] md:w-[72px] md:h-[72px] hover:border-4 hover:border-accent hover:rounded-md cursor-pointer " src={{$image->image_url}}  alt="">
                <img id={{$image->id . "4"}} class="imagesItem w-[62px] h-[62px] md:w-[72px] md:h-[72px] hover:border-4 hover:border-accent hover:rounded-md cursor-pointer " src={{$image->image_url}}  alt="">
                <img id={{$image->id . "5"}} class="imagesItem w-[62px] h-[62px] md:w-[72px] md:h-[72px] hover:border-4 hover:border-accent hover:rounded-md cursor-pointer " src={{$image->image_url}}  alt="">
            @endforeach
        </div>
    </div>

    <div class="flex flex-col gap-1 items-center" >
        <h1 class="font-serif font-bold text-h1-sm md:text-h1-lg" >{{$portfolio->title}}</h1>
        <h3 class="text-h3-sm md:text-h3-lg" >{{$portfolio->date}}</h3>
    </div>

    <div class=" w-full max-h-[200px] lg:w-[750px] grid grid-rows-2 md:grid-cols-2 gap-4 md:gap-6 ">
        <div class="flex flex-col gap-3 w-full md:border-r-2 md:border-black pr-[16px]">
            <h3 class="text-h3-sm md:text-h3-lg w-full text-start">Kategori event</h3>
            <div class="w-fit  flex flex-row flex-wrap gap-2">
                @foreach ($portfolio->categories as $category)
                <x-category name='{{ $category->name }}' />    
                <x-category name='{{ $category->name }}' />    
                <x-category name='{{ $category->name }}' />    
                <x-category name='{{ $category->name }}' />    
                   
                @endforeach
            </div>
        </div>
        <div class="flex flex-col gap-3 ">
            <h3 class="text-h3-sm md:text-h3-lg">Penyelenggara</h3>
            <ul class="pl-[15px] list-disc list-outside">
                <li class="text-medium-sm md:text-medium-lg">Penyelenggara</li>
            </ul>
        </div>
    </div>
    <div class="w-full flex flex-col gap-4 items-start">
        <h2 class="font-serif text-h2-lg">Deskripsi</h3>
        <p class="text-medium-sm md:text-h3-lg">{{$portfolio->content}}</p>
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