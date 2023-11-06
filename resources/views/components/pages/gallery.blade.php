<x-app-layout 
    gap="20px" title="Gallery" >
    
    <h1 class="text-h1-lg font-serif">Activity gallery</h1>
    <div class="w-full h-fit flex flex-row flex-wrap gap-3 justify-center">
        @foreach ($galleries as $gallery)
        <img class="w-[164px] h-[164px] sm:w-[100px] sm:h-[100px] rounded-md" src={{ $gallery->image_url }} alt={{ $gallery->content }}>
        @endforeach
    </div>
</x-app-layout>