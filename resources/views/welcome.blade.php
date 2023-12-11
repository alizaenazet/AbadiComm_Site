<x-app-layout
  gap="0px" title="AbadiComm">
  <x-slot:navbar>
        <x-navbar />
  </x-slot>

  {{-- Welcome Section --}}
  <div  class=" w-full h-fit flex justify-center items-center flex-col gap-y-5 md:gap-y-10 mt-16">
    <h1 class="w-[85%] text-center text-black text-headline-sm md:text-headline-lg font-semibold font-serif">Kepuasan adalah kebanggaan bagi kami </h1>
    <h2 class="text-black text-h1-sm  md:text-h1-lg">Event organizer</h2>
<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-fit md:aspect-[3/2]">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/images/main_image1.svg" class="absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/images/main_image2.svg" class="absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/images/main_image3.svg" class="absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="/images/main_image4.svg" class="absolute block -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
</div>
{{-- Welcome Section --}}

{{-- About Us Section --}}
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
          <div class="image-container flex items-center">
          <div class="w-20 h-24 md:w-32 md:h-36 bg-cover rounded-sm" style="background-image: url(/images/logo_porpov.svg)"></div>
          </div>
          <div class="image-container flex items-center">
          <div class="w-16 h-16 md:w-24 md:h-24 bg-cover rounded-sm" style="background-image: url(/images/bkkbn_bali_logo.svg)"></div> 
          </div>
          <div class="image-container flex items-center">
          <div class="w-16 h-16 md:w-24 md:h-24 bg-cover rounded-sm" style="background-image: url(/images/logo_pemkot_surabaya.svg)"></div>
          </div>
          <div class="image-container flex items-center">
          <div class="w-16 h-16 md:w-24 md:h-24 bg-cover rounded-sm" style="background-image: url(/images/ancol_logo.svg)"></div> 
          </div>
          <div class="image-container flex items-center">
          <div class="w-16 h-16 md:w-24 md:h-24 bg-cover rounded-sm" style="background-image: url(/images/ibid_logo.svg)"></div> 
          </div>
          <div class="image-container flex items-center">
          <div class="w-16 h-16 md:w-24 md:h-24 bg-cover rounded-sm" style="background-image: url(/images/kemendag_logo.svg)"></div> 
          </div>
          <div class="image-container flex items-center">
          <div class="w-16 h-16 md:w-24 md:h-24 bg-cover rounded-sm" style="background-image: url(/images/phillips_logo.svg)"></div> 
          </div>
          
      </div>
  </div>
</div>


<div class="flex flex-col items-center justify-center gap-6">
  <h1 class="w-full text-h1-lg font-serif font-bold text-center">Our team</h1>
  <div class="flex  justify-center items-center flex-row flex-wrap gap-1 md:gap-2">
      @foreach ($teamMembers as $imageUrl)
          <img src={{$imageUrl}} alt=""
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
{{-- About Us Section --}}

{{-- Service Section --}}
<div class="w-full h-fit flex flex-wrap  gap-6 justify-center mt-28">
  <h1 class="w-full text-h1-lg font-serif font-bold text-center">Our Services</h1>
  <div class=" w-full flex flex-row flex-wrap justify-center gap-4 lg:gap-7">
      {{-- style="background: linear-gradient(148deg, #0081AF 41.98%, rgba(221, 28, 26, 0.00) 120.72%, rgba(221, 28, 26, 0.00) 120.72%); " --}}
      <div
          class=" flex-col max-w-[330px]  md:w-[22rem] flex justify-start items-center px-[13px] pt-[20px] pb-[58px]   p-6 bg-white  rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 bg-gradient-to-br from-primary from-45% to-secondary ">
              <svg class="justify-center items-center fill-accent w-14 md:w-20 lg:w-24 h-fit" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M160-400v-80h280v80H160Zm0-160v-80h440v80H160Zm0-160v-80h440v80H160Zm360 560v-123l221-220q9-9 20-13t22-4q12 0 23 4.5t20 13.5l37 37q8 9 12.5 20t4.5 22q0 11-4 22.5T863-380L643-160H520Zm300-263-37-37 37 37ZM580-220h38l121-122-18-19-19-18-122 121v38Zm141-141-19-18 37 37-18-19Z"/></svg>
          <h3 class="w-full text-h3-sm md:text-h3-lg mb-2 text-2xl font-bold font-serif tracking-tight dark:text-white text-white">
              Konsep & perencanaan</h3>
          <p class="font-sans text-normal-sm md:text-normal-lg text-white dark:text-gray-400">
              Layanan ini meliputi penyusunan konsep event, mulai dari tema, tujuan, target audience, hingga timeline pelaksanaan. Event organizer akan bekerja sama dengan klien untuk memahami kebutuhan dan keinginan klien, kemudian mengembangkan konsep event yang sesuai.
          </p>
      </div>
     
      <div
          class=" flex-col max-w-[330px]  md:w-[22rem] flex justify-start items-center px-[13px] pt-[20px] pb-[58px]   p-6 bg-white  rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 bg-gradient-to-br from-primary from-45% to-secondary ">
              <svg class="justify-center items-center fill-accent w-14 md:w-20 lg:w-24 h-fit" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M160-200h80v-320h480v320h80v-426L480-754 160-626v426Zm-80 80v-560l400-160 400 160v560H640v-320H320v320H80Zm280 0v-80h80v80h-80Zm80-120v-80h80v80h-80Zm80 120v-80h80v80h-80ZM240-520h480-480Z"/></svg>
          <h3 class="w-full text-h3-sm md:text-h3-lg mb-2 text-2xl font-bold font-serif tracking-tight dark:text-white text-white">
              Penyewaan & pengadaan</h3>
          <p class="font-sans text-normal-sm md:text-normal-lg text-white dark:text-gray-400">
              penyewaan dan pengadaan berbagai kebutuhan event, seperti venue, peralatan, dekorasi, dan lain-lain. Event organizer akan membantu klien untuk memilih vendor yang tepat dan mendapatkan harga yang terbaik
          </p>
      </div>
      <div
          class=" flex-col max-w-[330px]  md:w-[22rem] flex justify-start items-center px-[13px] pt-[20px] pb-[58px]   p-6 bg-white  rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 bg-gradient-to-br from-primary from-45% to-secondary ">
              <svg class="justify-center items-center fill-accent w-14 md:w-20 lg:w-24 h-fit" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z"/></svg>
          <h3 class="w-full text-h3-sm md:text-h3-lg mb-2 text-2xl font-bold font-serif tracking-tight dark:text-white text-white">
              Operasional & pelaksanaan</h3>
          <p class="font-sans text-normal-sm md:text-normal-lg text-white dark:text-gray-400">
              pelaksanaan event secara menyeluruh, mulai dari persiapan, pelaksanaan, hingga pasca-pelaksanaan. Event organizer akan bertanggung jawab untuk memastikan bahwa event berjalan sesuai dengan rencana dan berjalan dengan lancar.
          </p>
      </div>

  </div>

</div>
{{-- Service Section --}}

{{-- Welcome Gallery Section --}}
<div class="mt-28">
  <h1 class="w-full  text-h1-lg font-serif font-bold text-center">Activity Gallery</h1>
  <div class="py-[31px] w-full flex flex-center justify-center">
      <div class="w-[80%] max-h-[500px] md:max-h-[700px] overflow-y-auto flex flex-center justify-center flex-row flex-wrap gap-x-2 md:gap-x-4 lg:gap-x-8 gap-y-3 md:gap-y-3 lg:gap-y-3 ">
          @foreach ($galleries as $gallery)
          <img src={{$gallery->image_url}} alt="" class= "aspect-[1/1] w-16 md:w-32 h-16 md:h-32 rounded-md">
          @endforeach
          
      </div>
  </div>
  <div class="flex flex-warp justify-center items-center">
      <form action="">
          <a href="/gallery" style="padding: 2px 6px"
              class="border-2 flex flex-row items-center gap-1 w-fit  px-8 border-primary text-primary font-medium lg:text-h3-lg rounded-lg text-center ">
              Show More
          </a>
      </form>
  </div>
</div>
{{-- Welcome Gallery Section --}}

{{-- Welcome Portfolio Section --}}
<div class="w-full flex flex-col justify-center items-center gap-16 mt-28">
  <div class="w-full ">
      <h1 class="font-serif text-h1-lg  font-bold">Our works</h1>
      <a href="/list-portfolio" class="font-sans text-h3-lg border-b-2 border-accent text-accent">Semua event kami</a>
  </div>
  <div class="h-max w-full flex flex-row flex-wrap justify-center items-start gap-x-4 gap-y-10 lg:gap-10">
      @foreach ($portfolios as $portfolio)
      <div class="flex flex-wrap flex-col w-full md:w-[40%] lg:w-[30%] gap-y-3 justify-start items-start">

          <div class="flex w-full flex-col gap-1">
           <div class="w-full h-fit">
               <div class="w-full aspect-[3/2] rounded-lg bg-contain" style="background-image: url({{$portfolio->portfolioImage[0]->image_url}})"></div>
               <p class="text-black text-h3-lg font-bold font-serif">{{ $portfolio->title }}</p>
           </div>

           <div>
               <div class="w-full h-max flex flex-row flex-wrap gap-x-1 gap-y-2 " >
                   @foreach ($portfolio->categories as $category)
                       <x-category name='{{ $category->name }}' />
                   @endforeach
               </div>
               <p class="font-sans text-medium-lg w-full">
                   <b>{{ $portfolio->year() }}</b>
                   @foreach ($portfolio->portfolioPromoter as $promoter)
                   , {{ $promoter->name }}
                   @endforeach
               </p>
           </div>
          </div>

          <a href="/portfolio/{{$portfolio->id}}" style="padding: 2px 6px"
           class="border-2 w-fit  px-8 border-blue-500 font-medium rounded-lg text-center ">
           See Detail
       </a>

       </div>
      @endforeach
      </div>
  
      <a href="/list-portfolio"  style="padding: 2px 6px"
                  class=" border-2 flex flex-row items-center justify-center gap-1 w-[50%] md:w-fit lg:max-w-fit px-8 border-primary font-medium rounded-lg text-center text-primary font-sans text-h3-sm md:text-h3-lg hover:bg-accent">
                  Show More
      </a>
  </div>
{{-- Welcome Portfolio Section --}}

{{-- Welcome Contact Section --}}
<div class="flex flex-col md:flex-row items-center gap-[23px] mt-28">
  <div class=" md:flex-1 w-full h-[256px] md:h-[356px] bg-contain lg:h-[456px]" style="background-image: url(/images/contact_display.svg)"></div>
  <div class=" md:flex-1 flex flex-col gap-6">
      <h1 class="text-h1-lg font-serif">Let's see what we can create together.</h1>
      <p> Biar kami bantu Anda mewujudkan event yang luar biasa dan sesuai dengan ekspektasi Anda. Kami memiliki tim yang berpengalaman dan profesional yang siap membantu Anda dari awal hingga akhir. Kami akan mendengarkan kebutuhan Anda dan memberikan solusi yang sesuai dengan anggaran Anda. Hubungi kami sekarang juga untuk berdiskusi lebih lanjut.
      </p>
      <button data-modal-target="contact-modal" data-modal-toggle="contact-modal" class="px-[20px] py-[10px] w-[181px] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button">
          Contact us
        </button>
      
  </div>
</div>
{{-- Welcome Contact Section --}}
</x-app-layout>
