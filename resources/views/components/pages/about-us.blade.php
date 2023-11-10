<div class="flex flex-col justify-center items-center gap-12 mt-10 md:mt-16">
    <div style="padding-left:inherit; padding-right:inherit" class="flex justify-center">
        <p class="text-h3-sm md:text-h3-lg font-sans max-w-[80%]">
            Suksesnya suatu event berdampak banyak hal terhadap kemajuan  perusahaan seperti mendapat prospek, meningkatkan penjualan dan  sebagainya. 
            Untuk itu ABADI COMMUNICATIONS, hadir menawarkan jasa penanganan event perusahaan sampai kepada hal detailnya. Tim kami akan merinci setiap kebutuhan event perusahaan Anda agar sesuai dengan karakter yang perusahaan Anda miliki.
            Saat Anda mempercayakan event tersebut kepada kami, Anda bisa fokus pada bisnis perusahaan harian. Kami akan membantu Anda menyusun, merancang, mempersiapkan serta melaksanakan event  perusahaan Anda. 
        </p>
    </div>
    

    <div class=" w-full flex flex-row flex-wrap justify-center gap-4">
        {{-- style="background: linear-gradient(148deg, #0081AF 41.98%, rgba(221, 28, 26, 0.00) 120.72%, rgba(221, 28, 26, 0.00) 120.72%); " --}}
        <div
            class=" px-[13px] pt-[20px] pb-[58px]  max-w-[22rem] p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 bg-gradient-to-br from-primary from-45% to-secondary flex-2">
            <h3 class="w-full text-h3-lg mb-2 text-2xl font-bold font-serif tracking-tight dark:text-white text-white">
                Visi</h3>
            <p class="font-sans text-normal-lg text-white dark:text-gray-400">
                Menampilkan dan mewujudkan setiap moment sebagai arena tumbuhnya sebuah perusahaan, terciptanya image positif di masyarakat dan tercapainya value yang telah ditargetkan.
            </p>
        </div>
        <div
            class=" px-[13px] pt-[20px] pb-[58px]  max-w-[22rem] p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 bg-gradient-to-br from-primary from-45% to-secondary flex-2">
            <h3 class="w-full text-h3-lg mb-2 text-2xl font-bold font-serif tracking-tight dark:text-white text-white">
                Misi</h3>
            <p class="font-sans text-normal-lg text-white dark:text-gray-400">
                Bersama Abadicomm, kami siap memberikan pelayanan spesial bagi setiap klien, dengan pendekatan human yang saling menguntungkan.
        </div>
        <div
            class="flex flex-col justify-center items-center flex-wrap  px-[43px] pt-[20px] pb-[58px]  max-w-[22rem] p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 bg-gradient-to-br from-primary from-45% to-secondary flex-">
            <svg class="fill-secondary w-2/5 h-fit" xmlns="http://www.w3.org/2000/svg" height="24"
                viewBox="0 -960 960 960" width="24">
                <path
                    d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z" />
            </svg>
            <h2 class="text-h2-lg font-bold font-sans text-white">East java,<br />Surabaya</h2>
        </div>

    </div>

<div class="flex flex-col gap-6">
    <h1 class="w-full text-h1-lg font-serif font-bold text-center">Our clients</h1>
    <div class="py-[25px] w-screen bg-primary flex flex-center justify-center">
        <div class="w-[80%] flex flex-center justify-center flex-row flex-wrap gap-x-8 gap-y-3 ">
            <div class="w-16 h-16 md:w-32 md:h-32 bg-cover rounded-sm" style="background-image: url(/images/logo_pemkot_surabaya.svg)"></div>
            <div class="w-16 h-16 md:w-32 md:h-32 bg-cover rounded-sm" style="background-image: url(/images/bkkbn_bali_logo.svg)"></div> 
            <div class="w-16 h-16 md:w-32 md:h-32 bg-cover rounded-sm" style="background-image: url(/images/ace_logo.svg)"></div> 
            <div class="w-16 h-16 md:w-32 md:h-32 bg-cover rounded-sm" style="background-image: url(/images/ancol_logo.svg)"></div> 
            <div class="w-16 h-16 md:w-32 md:h-32 bg-cover rounded-sm" style="background-image: url(/images/ibid_logo.svg)"></div> 
            <div class="w-16 h-16 md:w-32 md:h-32 bg-cover rounded-sm" style="background-image: url(/images/kemendag_logo.svg)"></div> 
            <div class="w-16 h-16 md:w-32 md:h-32 bg-cover rounded-sm" style="background-image: url(/images/phillips_logo.svg)"></div> 
        </div>
    </div>
</div>


<div class="flex flex-col items-center justify-center gap-6">
    <h1 class="w-full text-h1-lg font-serif font-bold text-center">Our team</h1>
    <div class="flex  justify-center items-center flex-row flex-wrap gap-1 md:gap-2">
        @foreach ($globalTeamMembers as $teamMember)
            <img src={{$teamMember->image_url}} alt=""
                class="w-20 h-20 md:w-32  md:h-32 rounded-md hover:-translate-y-1 hover:scale-400">
        @endforeach
    </div>

    <a href="/team-member" class=" px-1   ">
        <h3 style="padding-left: 1rem; padding-right: 1rem;"
            class="border-b-4 text-accent border-accent hover:border-accent font-sans text-h3-sm md:text-h3-lg hover:text-primary font-bold  hover:-translate-y-1 hover:scale-110 ">
            See details</h3>
    </a>
</div>
</div>
