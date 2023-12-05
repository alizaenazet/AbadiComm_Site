<x-app-layout 
    gap="20px" title="Gallery" >
    <x-slot:navbar>
        <x-navbar />
    </x-slot>
    
    <h1 class="text-h1-lg text-center font-serif">Activity gallery</h1>
    <div id="galleryList" class="w-full h-fit flex flex-row flex-wrap gap-2 md:gap-3 justify-center items-center">
        @foreach ($galleries as $gallery)
        <img id={{$gallery->id}} class=" imageList  aspect-[1/1] w-[64px] md:w-[164px] h-[64px] md:h-[164px] sm:w-[100px] sm:h-[100px] rounded-md hover:-translate-y-1 hover:scale-500 cursor-pointer" src={{ $gallery->image_url }} alt="{{ $gallery->content }}">
        @endforeach
    </div>

   

    <script>
        $(document).ready(function () {
            $('img.imageList').click(function (e) { 
                e.preventDefault();
                var id = $(this).attr('id');
                var imageUrl = $(this).attr('src');
                var description = $(this).attr('alt');
                console.log("the img is clicked with id: " + id);

                $('#galleryList').append(`
                <div id="imageModal" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
      
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center items-center sm:p-0">
            <div class=" flex justify-center relative transform overflow-hidden rounded-lg  text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <div  class="flex flex-col flex-wrap justify-center items-center p-[15px] h-fit w-fit bg-gray-300 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-30 border border-gray-100 gap-4">
                        <div>
                        <div  class="w-full flex flex-end mb-2">
                            <h2 id="close-modal-button" class="font-bold text-lg px-[7px] rounded-full hover:bg-accent bg-white cursor-pointer ">X</h2>
                            </div>
                            <div class=" aspect-[1/1] bg-contain w-[284px] h-[284px]" style="background-image: url(${imageUrl})"></div>
                            </div>
                            <p class="text-medium-sm md:text-medium-lg" >${description}</p>
                    </div>
            </div>
          </div>
        </div>
      </div>  `); });

      $('#close-modal-button').click(function (e) { 
        e.preventDefault();
        console.log("removeing");
        $('#imageModal').remove();
      });
        

      $(document).on('click', 'h2', function(e){
        e.preventDefault();
        console.log("removeing");
        $('#imageModal').remove();
      })
        });
    </script>

</x-app-layout>