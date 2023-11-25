<div class="w-full flex flex-col justify-center items-center gap-16 mt-28">
    <div class="w-full ">
        <h1 class="font-serif text-h1-lg  font-bold">Our works</h1>
        <a href="/list-portfolio" class="font-sans text-h3-lg border-b-2 border-accent text-accent">Semua event kami</a>
    </div>
    <div class="h-max w-full flex flex-row flex-wrap justify-center items-start gap-x-4 gap-y-10 lg:gap-10">
        @foreach ($globalPortfolios as $portfolio)
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
                    class=" border-2 flex flex-row items-center justify-center gap-1 w-[50%] md:w-[30%] lg:w-[15%]  px-8 border-primary font-medium rounded-lg text-center text-primary font-sans text-h3-sm md:text-h3-lg hover:bg-accent">
                    Show More
        </a>
    </div>
    