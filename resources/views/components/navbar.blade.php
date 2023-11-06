<div id="navbar" class="
    w-full h-full
    flex flex-row justify-between items-center
">
<a href="/">
    <img src="/images/logo_small.svg" alt="">
</a>

<div class="flex flex-row gap-9">
    <a class="hover:border-b-2 hover:border-accent"
     href="/portfolio">
        <p>Portfolio</p>
    </a>
    <a class="hover:border-b-2 hover:border-accent"
     href="/galery">
        <p>Galery</p>
    </a>
    <a class="hover:border-b-2 hover:border-accent"
     href="/articles">
        <p>Articles</p>
    </a>
    <a class="hover:border-b-2 hover:border-accent"
     href="/partner">
        <p>Partner</p>
    </a>
</div>


<!-- Modal toggle -->
<button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class=" px-[10px] py-[8px] text-gray-900 w-max  bg-white border-2 border-primary focus:outline-none hover:bg-gray-100 focus:ring-4 hover:border-accent focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
    Contact us
  </button>
  
  <!-- Main modal -->
  <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">

<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">contact us</span>
    </button>
    
<x-contact-modal >
    <div class="flex flex-col gap-4">
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
            <input type="text" id="name" class="bg-gray-50 border-2 border-primary text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent invalid:text-pink-600 invalid:border-pink-500"  placeholder="John"  required>
        </div>
        <div>
            <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">asal instansi</label>
            <select type="text" id="instansi" class="bg-gray-50 border-2 border-primary text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent invalid:text-pink-600 invalid:border-pink-500" placeholder="John" required>
                <option value="0">Pribadi</option>
                <option value="1">Swasta</option>
                <option value="2">Pemerintahan</option>
            </select>    
        </div>
        <div id="nama_instansi" class="hidden">
            <input type="text" class="bg-gray-50 border-2 border-primary text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent invalid:text-pink-600 invalid:border-pink-500 " placeholder="nama instansi" required>
        </div>
        <div>
            <label for="keperluan_event" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keperluan</label>
            <select type="text" id="keperluan_event" class="bg-gray-50 border-2 border-primary text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border invalid:text-pink-600 invalid:border-pink-500 -accent" placeholder="John" required>
                <option value="0">Membuat event</option>
                <option value="1">Kebutuhan event</option>
                <option value="-1">Lainnya</option>
            </select>    
        </div>

        <div id="keperluan_edit" class="hidden">
            <input type="text" class="bg-gray-50 border-2 border-primary text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent invalid:text-pink-600 invalid:border-pink-500 " placeholder="Keperluan anda" required>
        </div>
        
        <div>
            <label for="addtional_information" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">informasi tambahan</label>
            <textarea name="addtional_information" id="" cols="18" rows="6" class="bg-gray-50 border-2 border-primary text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent" placeholder="saya ingin membuat acara sekolah"></textarea>
        </div>

        <div>
            <label for="no telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">no telp</label>
            <input type="text" id="no telp" class="bg-gray-50 border-2 border-primary text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent invalid:text-pink-600 invalid:border-pink-500 " placeholder="08..." required>
        </div>
        <div>
            <input type="checkbox" id="no_telp" class="bg-gray-50 border-2 border-primary text-primary text-sm rounded-lg focus:ring-accent focus:border-accent  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent" placeholder="08..." checked>
            <label for="no_telp" class=" mb-2 text-sm font-medium text-gray-900 dark:text-white">Whatsapp</label>
        </div>

        <button style="padding:4px 8px" type="button" class=" w-max text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lets talk</button>
    </div>
    

</x-contact-modal >
  

<script>
    $(document).ready(function () {

        if ($('#keperluan_event').val() == "-1") {
            $('#keperluan_edit').show();
        }

        if ($('#instansi').val() != "0") {
            $('#nama_instansi').show();
        }

        $('#instansi').change(function (e) { 
            e.preventDefault();
            var instansiValue = $('#instansi').val();
            if (instansiValue != '0') {
                $('#nama_instansi').show();
            }else if ($('#nama_instansi').is(':visible')) {
                $('#nama_instansi').hide();
            }
        });

        $('#keperluan_event').change(function (e) { 
            e.preventDefault();
            var keperluanValue = $('#keperluan_event').val();
            if (keperluanValue == "-1") {
                $('#keperluan_edit').show();
            }else if( $('#keperluan_edit').is(':visible')){
                $('#keperluan_edit').hide();
            }
        });
    });
</script>
</div>