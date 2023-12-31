<x-app-layout 
gap="18px" title="admin login">
    <x-slot:navbar>
        <x-dashboard-navbar />    
    </x-slot> 
    <h1 class="text-h1-sm font-medium ">Create Team member</h1>
    
    <form class="w-full h-fit flex flex-col items-center gap-3 justify-center" action="/dashboard/team-member/create" method="POST" enctype="multipart/form-data">
        @csrf
    <div  class="w-full md:w-[348px] h-fit ">
            <img id="image-preview" class="w-full h-fit aspect-square drop-shadow-md rounded-sm" src="" alt="" hidden>
            <label id="upload-area" for="dropzone-file" class="flex flex-col items-center justify-center w-full h-full aspect-[1/1] border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                <div class="flex flex-col items-center justify-center pt-[20px] pb-[24px] gap-2">
                    <svg class="w-8 h-8  text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 text-center dark:text-gray-400">PNG, JPG <br>(Rasio 1:1, max-Size: 25mb)</p>
                </div>
                <input id="dropzone-file" name="fileImage" type="file" class="hidden" />
            </label>
            @error('fileImage')
                <div class="w-full flex flex-col justify-center items-center ">
                    <p class="text-input-sm md:text-input-lg">pastikan mengunggah foto</p>
                    <p class="text-input-sm md:text-input-lg">{{$message}}</p>
                </div>
            @enderror
    </div>
    <button id="reset-image-preview" type="button" class="w-fit text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[10px] py-[5px]  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" hidden>Ganti gambar</button>
        <div class="flex flex-col items-start gap-2">
            <div class="w-full h-fit">
                <label for="name-input" class="block mb-0.5 md:mb-1 text-input-sm md:text-normal-lg font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="name-input" name="name" class="bg-gray-50 text-input-sm md:text-input-lg border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                @error('name')
                    <p class="text-input-sm md:text-input-lg">{{$message}}</p>
                @enderror
            </div>
            <div class="w-full h-fit">
                <label for="divisions" class="block mb-0.5 md:mb-1  text-input-sm md:text-normal-lg font-medium text-gray-900 dark:text-white">Pilih divisi</label>
                <select id="divisions" name="division" class="bg-gray-50 border text-input-sm md:text-normal-lg border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <option selected disabled>pilih divisi</option>
                @foreach ($divisions as $division)
                <option value={{$division->id}}>{{$division->name}}</option>
                @endforeach
                </select>
                @error('division')
                    <p class="text-input-sm md:text-input-lg">{{$message}}</p>
                @enderror
            </div>
            <div class="w-full h-fit">
                <label for="qualification-input" class="block mb-0.5 md:mb-1 text-input-sm md:text-normal-lg font-medium text-gray-900 dark:text-white">Kualifikasi</label>
                <input type="text" id="qualification-input" name="qualification" class="bg-gray-50 text-input-sm md:text-input-lg border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="tersetifikasi/sarjana ..." required>
                @error('qualification')
                    <p class="text-input-sm md:text-input-lg">{{$message}}</p>
                @enderror
            </div>
        </div>

    <button type="submit" class="w-full md:w-[160px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-input-sm md:text-input-lg px-[10px] py-[5px]  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah member</button>
    </form>

    <script>
        $(document).ready(function () {

            $('#dropzone-file').change(function (e) { 
                e.preventDefault();
                const imageFile = this.files[0];
                $('#upload-area').hide();
                $('#image-preview').addClass("aspect-[1/1] ");
                let reader = new FileReader();
                reader.onload = function(event){
                    $('#image-preview').attr('src', event.target.result);
                }
                reader.readAsDataURL(imageFile);
                $('#image-preview').show();
                $('#reset-image-preview').show();
            });

            $('#reset-image-preview').click(function (e) { 
                e.preventDefault();
                $('#upload-area').show();
                $('#image-preview').hide();
                $('#reset-image-preview').hide();
                $('#image-preview').attr('src','');
            });
        });
    </script>
</x-app-layout >
