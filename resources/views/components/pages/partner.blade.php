<x-app-layout 
    gap="39px" title="Partnersip">

    <h1 class="text-h1-lg font-serif">Be Our Partner</h1>

    <div class="flex flex-col lg:flex-row gap-[23px]">
        <div class="flex-1 flex justify-start lg:justify-end">
            <img class="object-cover h-full" src="https://via.placeholder.com/553x371" alt="">
        </div>
        <div class="flex-1 flex flex-col gap-6 ">
            <p class=" text-medium-sm md:text-medium-lg lg:w-[80%]">In quaerat maxime sapiente ex repellat sit ipsam. Rem quos repudiandae id repellat rerum 
                voluptatibus et. Similique quidem nobis et id. Numquam deleniti est ipsam quisquam accusamus 
                et omnis. Quo adipisci id aliquam autem quas illum dolores. Officiis eaque itaque et 
                possimus ut ut. Sit suscipit nobis eaque facilis aliquid velit vero. Velit omnis libero 
                soluta consectetur ut sunt voluptatibus. Optio suscipit id eos ut ipsa autem. Facilis quas 
                illo vel iure. Iusto nostrum consequuntur at nisi consequatur. Non id eum eveniet enim quis 
                ipsa placeat officia. Velit dignissimos voluptate iste laborum aut suscipit. Qui tenetur 
                repellat adipisci eligendi. Dolores dolor est doloribus iure ipsum dolore totam. Numquam 
                occaecati quia qui. Neque cum eum earum incidunt a provident rerum. Assumenda nobis beatae 
            </p>

            <button data-modal-target="partner-modal" data-modal-toggle="partner-modal" class=" order-first md:order-last px-[20px] py-[10px] w-[181px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button">
                Take a step
              </button>
            
              <!-- Main modal -->
              <div id="partner-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <x-contact-modal >
                <form class="w-full h-max flex flex-col gap-4 px-[20px] py-[35px]" action="/whatsapp-redirect/partner" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" id="name" name="nama" class="bg-gray-50 border-2 border-primary text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent invalid:text-pink-600 invalid:border-pink-500"  placeholder="John"  required>
                    </div>
                    <div>
                        <label for="nama-perusahaan-institusi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama perusahaan/institusi</label>
                        <input type="text" id="nama-perusahaan-institusi" name="namaPerusahaanInstitusi" class="bg-gray-50 border-2 border-primary text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent invalid:text-pink-600 invalid:border-pink-500"  placeholder="Nama usaha"  required>
                    </div>
                    <div>
                        <label for="jenisPenawaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">jenis penawaran</label>
                        <select name="opsiPenawaran" type="text" id="jenisPenawaran" class="bg-gray-50 border-2 border-primary text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent invalid:text-pink-600 invalid:border-pink-500" placeholder="instansi" required>
                            <option value="1">Barang</option>
                            <option value="2">Jasa</option>
                            <option value="0">Lainnya</option>
                        </select>    
                    </div>

                    <div id="jenisPenawaranEdit" class="hidden">
                        <input type="text" name="penawaran" id="jenisPenawaranInput" class="bg-gray-50 border-2 border-primary text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent invalid:text-pink-600 invalid:border-pink-500 " placeholder="Keperluan anda" >
                    </div>

                    <div>
                        <label for="informasiPenawaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">informasi penawaran</label>
                        <textarea name="informasiPenawaran" id="" cols="18" rows="6" class="bg-gray-50 border-2 border-primary text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent" placeholder="saya ingin menawarakan ..."></textarea>
                    </div>
                     
                <button style="padding:4px 8px" type="submit" class=" w-max flex flex-row items-center gap-2 text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm  mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <svg class="w-4 h-fit" xmlns="http://www.w3.org/2000/svg" id="whatsapp" x="0" y="0" version="1.1" viewBox="0 0 100 100" xml:space="preserve"><g id="Graphics-_x2F_-App-Icons-_x2F_-WhatsApp"><g id="Icon_6_"><linearGradient id="Background_13_" x1="50.723" x2="50.723" y1="627.233" y2="625.746" gradientTransform="matrix(60 0 0 -60 -2993 37639)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#62FA7F"></stop><stop offset=".686" stop-color="#22CC40"></stop><stop offset="1" stop-color="#05B723"></stop></linearGradient><path id="Background_7_" fill="url(#Background_13_)" d="M28.4 5H26c-2 .1-4.6.2-5.7.5-1.8.4-3.5.9-4.9 1.6-1.6.8-3.1 1.9-4.4 3.2-1.3 1.3-2.3 2.7-3.2 4.4-.7 1.4-1.3 3.1-1.6 4.8-.2 1.2-.4 3.8-.5 5.8V74c.1 2 .2 4.6.5 5.7.4 1.8.9 3.5 1.6 4.9.8 1.6 1.9 3.1 3.2 4.4 1.3 1.3 2.7 2.3 4.4 3.2 1.4.7 3.1 1.3 4.8 1.6 1.2.2 3.8.4 5.8.5h48.7c2-.1 4.6-.2 5.7-.5 1.8-.4 3.5-.9 4.9-1.6 1.6-.8 3.1-1.9 4.4-3.2 1.3-1.3 2.3-2.7 3.2-4.4.7-1.4 1.3-3.1 1.6-4.8.2-1.2.4-3.8.5-5.8V25.3c-.1-2-.2-4.6-.5-5.7-.4-1.8-.9-3.5-1.6-4.9-.8-1.6-1.9-3.1-3.2-4.4C88.4 9 87 8 85.3 7.1c-1.4-.7-3.1-1.3-4.8-1.6-1.2-.2-3.8-.4-5.8-.5H28.4z"></path><path id="WhatsApp-Icon" fill="#fff" d="M66.6 54.4c-.8-.4-4.8-2.3-5.5-2.6-.7-.3-1.3-.4-1.8.4s-2.1 2.6-2.5 3.1c-.5.5-.9.6-1.7.2-.8-.4-3.4-1.2-6.5-3.9-2.4-2.1-4-4.7-4.5-5.5-.5-.8 0-1.2.4-1.6.4-.4.8-.9 1.2-1.4.4-.5.5-.8.8-1.3.3-.5.1-1-.1-1.4-.2-.4-1.8-4.3-2.5-5.9-.7-1.5-1.3-1.3-1.8-1.4h-1.5c-.5 0-1.4.2-2.1 1-.7.8-2.8 2.7-2.8 6.6 0 3.9 2.9 7.6 3.3 8.2.4.5 5.7 8.5 13.7 11.9 1.9.8 3.4 1.3 4.6 1.7 1.9.6 3.7.5 5.1.3 1.5-.2 4.8-1.9 5.4-3.7.7-1.8.7-3.4.5-3.7-.4-.4-.9-.6-1.7-1M51.3 75c-4.8 0-9.4-1.3-13.5-3.7l-1-.6-10 2.6 2.7-9.7-.6-1c-2.6-4.2-4-9-4-14 0-14.5 11.9-26.3 26.5-26.3C58.3 22.3 65 25 70 30c5 5 7.7 11.6 7.7 18.6C77.7 63.1 65.8 75 51.3 75m22.5-48.8c-6-6-14-9.3-22.5-9.3-17.5 0-31.8 14.2-31.8 31.7 0 5.6 1.5 11 4.2 15.8l-4.5 16.4L36 76.4c4.6 2.5 9.9 3.9 15.2 3.9C68.7 80.3 83 66.1 83 48.6c.1-8.4-3.2-16.4-9.2-22.4"></path></g></g>
                </svg>Lets talk</button>

                </form>
            </x-contact-modal >
        </div>
    </div>

    <script>
        $(document).ready(function () {
            if ($('#jenisPenawaran').val() == "0") {
                $('#jenisPenawaranEdit').show();
            }

            $('#jenisPenawaran').change(function (e) { 
                e.preventDefault();
                if ($('#jenisPenawaran').val() == "0") {
                    $('#jenisPenawaranEdit').show();
                    $('#jenisPenawaranInput').prop("required", true);;
                } else {
                    $('#jenisPenawaranInput').prop("required", false);;
                    $('#jenisPenawaranEdit').hide();
                }    
            });

        });
    </script>
</x-app-layout>
