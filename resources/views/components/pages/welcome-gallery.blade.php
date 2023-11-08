<div>
    <h1 class="w-full  text-h1-lg font-serif font-bold text-center">Activity Gallery</h1>
    <div class="py-[31px] w-full flex flex-center justify-center">
        <div class="w-[80%] flex flex-center justify-center flex-row flex-wrap gap-x-2 md:gap-x-4 lg:gap-x-8 gap-y-3 md:gap-y-3 lg:gap-y-3 ">
            @foreach ($globalActivityGallery as $gallery)
            <img src={{$gallery->image_url}} alt="" class= "w-16 md:w-32 h-16 md:h-32 rounded-md">
            @endforeach
            
        </div>
    </div>
    <div class="flex flex-warp justify-center items-center">
        <form action="">
            <a href="/gallery" style="padding: 2px 6px"
                class="border-2 flex flex-row items-center gap-1 w-fit  px-8 border-blue-500 font-medium lg:text-h3-lg rounded-lg text-center ">
                Show More
            </a>
        </form>
    </div>
</div>