<x-app-layout 
gap="18px" title="admin login">
    <x-slot:navbar>
        <x-dashboard-navbar />    
    </x-slot> 
    <h1 class="text-h1-sm md:text-h1-lg font-medium font-serif">Create Portfolio</h1>
    @if (session('status'))
    <div id="category-status-alert" class="alert alert-success">
        <div class="flex items-center p-[10px] mb-[5px] text-sm text-green-800 rounded-lg bg-success dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
            <span class="font-medium">alert!</span> {{ session('status') }}
            </div>
        </div>
    </div>
    @endif
    
    <div class="w-full h-fit">
        <h3 class="ms-2 mb-1 font-medium text-medium-sm md:text-medium-lg">Gambar</h3>
        <div class="w-full min-h-[80px] md:min-h-[90px] py-[3px] bg-gray-100 rounded-md  h-fit flex flex-col justify-center items-start ">
            <div id="image-list" class="flex flex-row h-max  overflow-x-auto gap-2">
            </div>
        </div>
    </div>

    <div id="image-modal" class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
      
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
          <div class="flex min-h-full items-center  justify-center p-[16px] text-center sm:items-center sm:p-0">

            <div id="image-modal-body" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class=" px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button" id="close-modal-button" class="absolute top-3 end-2.5 text-primary bg-accent  hover:bg-primary hover:text-gray-900 rounded-full text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                        <svg class="w-3 h-3 fill-accent" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="bg-white px-[16px] pb-[16px] pt-[20px] sm:p-[24px] sm:pb-[16px]">
                <div class="sm:flex justify-center sm:items-start">
                    {{-- Modal body --}}
                    <div class="p-[16px] md:p-[20px] flex flex-col gap-3 text-center">
                        <div class="w-full h-max flex flex-row justify-center">
                            <img id="modal-image" class="imagesItem w-full aspect-[3/2]     rounded-md hover:rounded-xl cursor-pointer " src=''  alt="">
                        </div>
                        <div class="w-full h-max flex flex-col flex-wrap justify-center items-center gap-5">
                            <div  class="w-max h-max">
                                <button id="delete-file-image" image-name="" id="delete-image-button" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-[15px] py-[5px] text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <form id="create-form" method="POST" action="/dashboard/portfolios/create" class="w-full md:justify-start" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="categories" id="categories-val" value="">
        <input type="hidden" name="promoters" id="promoters-val" value="">

      <div class="w-full justify-start  mb-12">
          <label for="attachment"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-[10px] py-[6px]  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 cursor-pointer">
              Upload gambar
              <input type="file" name="imageFiles[]" id="attachment"  class="hidden " multiple/>
          </label>
          @error('imageFiles')
            <p class="text-input-sm md:text-input-lg text-gray-800">{{$message}}</p>
          @enderror
      </div>

    <div class="relative z-0 w-full mb-6 group">
        <input  type="text" name="portfolioTitle" id="portfolio-title" class="block py-2.5 px-0 w-full text-input-sm md:text-input-lg text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="portfolio-title" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Judul portfolio</label>
        @error('portfolioTitle')
            <p class="text-input-sm md:text-input-lg text-gray-800">{{$message}}</p>
        @enderror
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <input type="date"  name="time" id="time" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="time" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Waktu</label>
        @error('time')
            <p class="text-input-sm md:text-input-lg text-gray-800">{{$message}}</p>
        @enderror
    </div>

    <div class="w-full h-fit mb-6 flex flex-col items-start justify-start gap-3">
        <h3 class=" font-medium text-medium-sm md:text-medium-lg">Kategori</h3>
        <div class="w-full h-fit  " >
            <select id="category-options" class="text-input-sm md:text-input-lg rounded-md">
                <option class="text-input-sm md:text-input-lg" selected disabled>pilih kategori</option>
                @foreach ($categories as $category)
                <option class="text-input-sm md:text-input-lg" value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('categories')
            <p class="text-input-sm md:text-input-lg text-gray-800">{{$message}}</p>
            @enderror
            <button id="reset-category-button" class="w-fit mt-2 md:mt-0 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm  sm:w-auto px-[10px] py-[6px] text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Reset</button>
        </div>

        <div id="category-list" class="w-full md:w-[60%] h-fit flex flex-col gap-2 bg-gray-200 px-[8px] py-[5px] rounded-md">
        </div>
    </div>
    
    <div class="w-full h-fit mb-6 flex flex-col items-start justify-start gap-3">
        <h3 class=" font-medium text-medium-sm md:text-medium-lg">Penyelenggara</h3>

        <div class="w-full h-fit flex flex-row gap-2 items-end">
            <div class="relative w-fit">
                <input id="add-promoter-input"  class="block w-full px-[12px] py-[15px]  text-input-sm md:text-input-lg text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="penyelenggara..." required>
                <button id="add-promoter-button" class=" text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 text-normal-sm md:text-normal-lg rounded-lg text-sm px-[8px] py-[5px] dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
            </div>
            @error('promoters')
            <p class="text-input-sm md:text-input-lg text-gray-800">{{$message}}</p>
            @enderror
            <button id="reset-portfolio-button" class="w-fit h-fit mt-2 md:mt-0 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm  sm:w-auto px-[10px] py-[6px] text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Reset</button>
        </div>


        <div id="promoter-list" class="w-full md:w-[60%] h-fit flex flex-col gap-2 bg-gray-200 px-[8px] py-[5px] rounded-md">

        </div>
    </div>

    <div class="w-full h-fit mb-6">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
        <textarea id="description" name="description" rows="12" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 text-input-sm md:text-input-lg" placeholder="Deskripsi..."></textarea>
    </div>
    <button type="submit" form="create-form" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-[10px] py-[6px] text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
</form>
  

    <script>
        $(document).ready(function () {
            var categories = [];
            var promoters = [];


            const imageDataTransfer = new DataTransfer(); 
            
            $('#close-modal-button').click(function (e) { 
                e.preventDefault();
                $('#image-modal').hide();
            });

            $(document).mouseup(function (e) { 
                var container = $("#image-modal-body");
                if (!container.is(e.target) && container.has(e.target).length === 0) 
                    {
                        $('#image-modal').hide();
                    }
            });


            $('#image-modal-background').click(function (e) { 
                e.preventDefault();
                $('#image-modal').hide();
            });
            
            $('#attachment').change(function (e) { 
                e.preventDefault();
                for(var i = 0; i < this.files.length; i++){
                    var fileItem = this.files.item(i);
                    $('#image-list').append(`
                        <img  name='${fileItem.name}' class="imagesItem w-[93px] aspect-[3/2]   md:w-[137px]  rounded-md hover:rounded-xl cursor-pointer " 
                        src='${URL.createObjectURL(fileItem)}'  alt="">
                    `);
                };
                for (let file of this.files) {
                    imageDataTransfer.items.add(file);
                }
                    this.files = imageDataTransfer.files;

                $('img.imagesItem').click(function (e) { 
                    var name = $(this).attr('name');
                    var imageUrl = $(this).attr('src');
                    $('#update-file-image').attr('image-name', name);
                    $('#delete-file-image').attr('image-name', name);
                    $('#modal-image').attr('src', imageUrl);
                    $('#image-modal').show();
                })

                $('#delete-file-image').click(function (e) { 
                    e.preventDefault();
                    var name = $(this).attr('image-name');
                    for(let i = 0; i < imageDataTransfer.items.length; i++){
                        if(name === imageDataTransfer.items[i].getAsFile().name){
                            imageDataTransfer.items.remove(i);
                            break;
                        }
                    }
                    
                    $('#attachment')[0].files = imageDataTransfer.files;
                    $(`img[name = "${name}"]`).remove()
                    $('#image-modal').hide();
                });
                
            });
            
            $('#update-file-image').change(function (e) { 
                var dtLenght = imageDataTransfer.items.length
                e.preventDefault();
                var name = $(this).attr('image-name');
                var changedFileImage = this.files[0];
                for(let i = 0; i < imageDataTransfer.items.length; i++){
                        if(name === imageDataTransfer.items[i].getAsFile().name){
                            imageDataTransfer.items.remove(i);
                            imageDataTransfer.items.add(changedFileImage);

                            $('#image-list').append(`
                                    <img  name='${changedFileImage.name}' class="imagesItem w-[93px] aspect-[3/2]   md:w-[137px]  rounded-md hover:rounded-xl cursor-pointer " 
                                    src='${URL.createObjectURL(changedFileImage)}'  alt="">
                            `);
                            continue;
                        }
                    }
                
                
                $('#attachment')[0].files = imageDataTransfer.files;
                $(`img[name = "${name}"]`).remove()
                $('#image-modal').hide();


                $('img.imagesItem').click(function (e) { 
                    var name = $(this).attr('name');
                    var imageUrl = $(this).attr('src');
                    $('#update-file-image').attr('image-name', name);
                    $('#delete-file-image').attr('image-name', name);
                    $('#modal-image').attr('src', imageUrl);
                    $('#image-modal').show();
                })
            });
            

            $('#reset-category-button').click(function (e) { 
                e.preventDefault();
                categories  = []
                $('#categories-val').val(categories.toString());
                $('#category-list').empty();
            });


            $('#category-options').change(function (e) { 
                e.preventDefault();
                var categoryName = $('#category-options').find(":selected").text();
                var categoryId = $('#category-options').val();
                if (!categories.includes(categoryId)) {
                    categories.push(categoryId)
                    $('#categories-val').val(categories.toString());
                    $('#category-list').append(`
                    <div class="flex w-full justify-between items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-100 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                        <span class="flex-1 text-start text-input-sm md:text-input-lg font-normal ms-3 whitespace-nowrap text-ellipsis overflow-hidden">${categoryName}</span>
                    </div>
                    `);
                }
            });

            $('#add-promoter-button').click(function (e) { 
                e.preventDefault();
                var inputValue = $('#add-promoter-input').val();
                if (!promoters.includes(inputValue)) {
                    promoters.push(inputValue)
                    $('#promoters-val').val(promoters.toString());
                    $('#promoter-list').append(`
                    <div class="flex w-full justify-between items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-100 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                        <span class="flex-1 text-start text-input-sm md:text-input-lg font-normal ms-3 whitespace-nowrap text-ellipsis overflow-hidden">${inputValue}</span>
                    </div>
                    `);
                }
            });

            $('#reset-portfolio-button').click(function (e) { 
                e.preventDefault();
                promoters = []
                $('#promoters-val').val(promoters.toString());
                $('#promoter-list').empty();
            });
            

            });

            </script>

</x-app-layout >
