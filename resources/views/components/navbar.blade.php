<div id="navbar" class="
    w-full h-full
    flex flex-row justify-between items-center
">
<a href="/">
    <img src="/images/logo_small.svg" alt="">
</a>

<div class="md:flex flex-row gap-9 hidden ">
    <a class="hover:border-b-2 hover:border-accent"
     href="/list-portfolio">
        <p>Portfolio</p>
    </a>
    <a class="hover:border-b-2 hover:border-accent"
     href="/gallery">
        <p>Gallery</p>
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


<button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white   focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 md:hidden" type="button">
    <svg class="fill-primary" xmlns="http://www.w3.org/2000/svg" height="34" viewBox="0 -960 960 960" width="24"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
</button>

<!-- Dropdown menu -->
<div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 ">
    <ul class="p-[8px] text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
      <li>
        <a href="/list-portfolio" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Portfolio</a>
      </li>
      <li>
        <a href="/gallery" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Gallery</a>
      </li>
      <li>
        <a href="/partner" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Partner</a>
      </li>
    </ul>
</div>


<!-- Modal toggle -->
<button data-modal-target="contact-modal" data-modal-toggle="contact-modal" class=" px-[10px] py-[8px] text-gray-900 w-max  bg-white border-2 border-primary focus:outline-none hover:bg-gray-100 focus:ring-4 hover:border-accent focus:ring-gray-200 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 hidden md:flex" type="button">
    Contact us
  </button>

  <!-- Main modal -->
  <div id="contact-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
<x-contact-modal >
    {{-- <div class="flex flex-col gap-4"> --}}
            <form class="w-full h-max flex flex-col gap-4 px-[20px] py-[35px]" action="/whatsapp-redirect/contact" method="POST">
                @csrf
                
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                <input type="text" id="name" name="nama" class="bg-gray-50 border-2 border-primary text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent invalid:text-pink-600 invalid:border-pink-500"  placeholder="John"  required>
            </div>
            <div>
                <label for="instansi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">asal instansi</label>
                <select name="opsiInstansi" type="text" id="instansi" class="bg-gray-50 border-2 border-primary text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent invalid:text-pink-600 invalid:border-pink-500" placeholder="instansi" required>
                    <option value="0">Pribadi</option>
                    <option value="1">Swasta</option>
                    <option value="2">Pemerintahan</option>
                </select>    
            </div>
            <div id="nama-instansi" class="hidden">
                <input type="text" id="nama-instansi-field" name="namaInstansi" class="bg-gray-50 border-2 border-primary text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent invalid:text-pink-600 invalid:border-pink-500 " placeholder="nama instansi" >
            </div>
            <div>
                <label for="keperluan_event" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keperluan</label>
                <select type="text" name="opsiKeperluan" id="keperluan_event" class="bg-gray-50 border-2 border-primary text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border invalid:text-pink-600 invalid:border-pink-500 -accent" placeholder="John" required>
                    <option value="1">Membuat event</option>
                    <option value="2">Kebutuhan event</option>
                    <option value="0">Lainnya</option>
                </select>    
            </div>
    
            <div id="keperluan-edit" class="hidden">
                <input type="text" name="keperluan" id="keperluan-edit-field" class="bg-gray-50 border-2 border-primary text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent invalid:text-pink-600 invalid:border-pink-500 " placeholder="Keperluan anda" >
            </div>
            
            <div>
                <label for="addtional_information" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">informasi tambahan</label>
                <textarea name="addtional_information" id="" cols="18" rows="6" class="bg-gray-50 border-2 border-primary text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent" placeholder="saya ingin membuat acara sekolah"></textarea>
            </div>
    
            <button style="padding:4px 8px" type="submit" class=" w-max flex flex-row items-center gap-2 text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <svg class="w-4 h-fit" xmlns="http://www.w3.org/2000/svg" id="whatsapp" x="0" y="0" version="1.1" viewBox="0 0 100 100" xml:space="preserve"><g id="Graphics-_x2F_-App-Icons-_x2F_-WhatsApp"><g id="Icon_6_"><linearGradient id="Background_13_" x1="50.723" x2="50.723" y1="627.233" y2="625.746" gradientTransform="matrix(60 0 0 -60 -2993 37639)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#62FA7F"></stop><stop offset=".686" stop-color="#22CC40"></stop><stop offset="1" stop-color="#05B723"></stop></linearGradient><path id="Background_7_" fill="url(#Background_13_)" d="M28.4 5H26c-2 .1-4.6.2-5.7.5-1.8.4-3.5.9-4.9 1.6-1.6.8-3.1 1.9-4.4 3.2-1.3 1.3-2.3 2.7-3.2 4.4-.7 1.4-1.3 3.1-1.6 4.8-.2 1.2-.4 3.8-.5 5.8V74c.1 2 .2 4.6.5 5.7.4 1.8.9 3.5 1.6 4.9.8 1.6 1.9 3.1 3.2 4.4 1.3 1.3 2.7 2.3 4.4 3.2 1.4.7 3.1 1.3 4.8 1.6 1.2.2 3.8.4 5.8.5h48.7c2-.1 4.6-.2 5.7-.5 1.8-.4 3.5-.9 4.9-1.6 1.6-.8 3.1-1.9 4.4-3.2 1.3-1.3 2.3-2.7 3.2-4.4.7-1.4 1.3-3.1 1.6-4.8.2-1.2.4-3.8.5-5.8V25.3c-.1-2-.2-4.6-.5-5.7-.4-1.8-.9-3.5-1.6-4.9-.8-1.6-1.9-3.1-3.2-4.4C88.4 9 87 8 85.3 7.1c-1.4-.7-3.1-1.3-4.8-1.6-1.2-.2-3.8-.4-5.8-.5H28.4z"></path><path id="WhatsApp-Icon" fill="#fff" d="M66.6 54.4c-.8-.4-4.8-2.3-5.5-2.6-.7-.3-1.3-.4-1.8.4s-2.1 2.6-2.5 3.1c-.5.5-.9.6-1.7.2-.8-.4-3.4-1.2-6.5-3.9-2.4-2.1-4-4.7-4.5-5.5-.5-.8 0-1.2.4-1.6.4-.4.8-.9 1.2-1.4.4-.5.5-.8.8-1.3.3-.5.1-1-.1-1.4-.2-.4-1.8-4.3-2.5-5.9-.7-1.5-1.3-1.3-1.8-1.4h-1.5c-.5 0-1.4.2-2.1 1-.7.8-2.8 2.7-2.8 6.6 0 3.9 2.9 7.6 3.3 8.2.4.5 5.7 8.5 13.7 11.9 1.9.8 3.4 1.3 4.6 1.7 1.9.6 3.7.5 5.1.3 1.5-.2 4.8-1.9 5.4-3.7.7-1.8.7-3.4.5-3.7-.4-.4-.9-.6-1.7-1M51.3 75c-4.8 0-9.4-1.3-13.5-3.7l-1-.6-10 2.6 2.7-9.7-.6-1c-2.6-4.2-4-9-4-14 0-14.5 11.9-26.3 26.5-26.3C58.3 22.3 65 25 70 30c5 5 7.7 11.6 7.7 18.6C77.7 63.1 65.8 75 51.3 75m22.5-48.8c-6-6-14-9.3-22.5-9.3-17.5 0-31.8 14.2-31.8 31.7 0 5.6 1.5 11 4.2 15.8l-4.5 16.4L36 76.4c4.6 2.5 9.9 3.9 15.2 3.9C68.7 80.3 83 66.1 83 48.6c.1-8.4-3.2-16.4-9.2-22.4"></path></g></g>
                </svg> Lets talk</button>
            </form>
        {{-- </div> --}}
    

</x-contact-modal >
</div>


<script>
    $(document).ready(function () {

        if ($('#keperluan_event').val() == "0") {
            $('#keperluan-edit').show();
        }

        if ($('#instansi').val() != "0") {
            $('#nama-instansi').show();
        }

        $('#instansi').change(function (e) { 
            e.preventDefault();
            var instansiValue = $('#instansi').val();
            if (instansiValue != '0') {
                $('#nama-instansi').show();
                $('#nama-instansi-field').prop("required", true);;
            }else if ($('#nama-instansi').is(':visible')) {
                $('#nama-instansi-field').prop("required", false);;
                $('#nama-instansi').hide();
            }
        });

        $('#keperluan_event').change(function (e) { 
            e.preventDefault();
            var keperluanValue = $('#keperluan_event').val();
            if (keperluanValue == "0") {
                $('#keperluan-edit-field').prop("required", true);;
                $('#keperluan-edit').show();
            }else if( $('#keperluan-edit').is(':visible')){
                $('#keperluan-edit-field').prop("required", false);;
                $('#keperluan-edit').hide();
            }
        });
    });
</script>
</div>