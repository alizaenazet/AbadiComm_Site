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
                <div id="imageModal" class="fixed inset-0 z-50 flex justify-center items-center bg-black/60 backdrop-blur-sm">
                <div class="relative bg-gray-200 bg-opacity-30 rounded-xl border border-gray-100 shadow-2xl p-4 max-w-[90vw] max-h-[90vh] overflow-auto">
                    <button id="close-modal-button"
                    class="absolute top-2 right-2 text-black font-bold text-lg bg-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-accent z-[9999]">
                    ✕
                    </button>
                    <img src="${imageUrl}" alt="${description}" class="max-w-full max-h-[80vh] rounded-lg object-contain mx-auto" />
                    <p class="text-center text-lg mt-3 font-semibold">${description}</p>
                </div>
                </div>
                `);
            });

      $(document).on('click', '#close-modal-button', function() {
        $('#imageModal').remove();
        });

      $(document).on('click', '#imageModal', function(e) {
        if (!$(e.target).closest('#modalContent').length) {
            $('#imageModal').remove();
        }
        });

      $(document).on('click', 'h2', function(e){
        e.preventDefault();
        console.log("removeing");
        $('#imageModal').remove();
      })
        });
    </script>

</x-app-layout>
