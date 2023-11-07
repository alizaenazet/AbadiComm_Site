<div class="w-max flex flex-col justify-center items-center gap-16 ">
    <div class="w-full ">
        <h1 class="font-serif text-h1-lg  font-bold">Our works</h1>
        <a href="/list-portfolio" class="font-sans text-h3-lg border-b-2 border-accent text-accent">see all alredy event finished</a>
    </div>
    <div class="h-max w-full flex flex-row flex-wrap justify-center items-center gap-10">
        @foreach ($globalPortfolios as $globalPortfolio)
        <div class="flex flex-wrap flex-col w-[40%] gap-y-3 justify-between ">
    
            <div class="flex flex-col gap-1">
             <div class="w-full h-fit">
                <div class="w-full h-[273px] rounded-lg bg-contain" style="background-image: url({{$globalPortfolio->portfolioImage[0]->image_url}})"></div>
                 <p class="text-black text-h3-lg font-bold font-serif">{{ $globalPortfolio->title }}</p>
             </div>
    
             <div>
                 <div class="w-full h-auto flex flex-row flex-wrap gap-x-1 gap-y-2 " >
                     @foreach ($globalPortfolio->categories as $category)
                         <x-category name='{{ $category->name }}' />
                     @endforeach
                 </div>
                 <p class="font-sans text-normal-lg w-full">
                     {{ $globalPortfolio->year() }}, {{ $globalPortfolio->promoter }}
                 </p>
             </div>
            </div>
    
             <a href="/portfolio/{{$globalPortfolio->id}}" style="padding: 2px 6px"
                 class="border-2 w-fit  px-8 border-blue-500 font-medium rounded-lg text-center ">
                 See Detail
             </a>
    
         </div>
        @endforeach
        </div>
    
        <a href="/list-portfolio"  style="padding: 2px 6px"
                    class=" border-2 flex flex-row items-center justify-center gap-1 w-[20%]  px-8 border-primary font-medium rounded-lg text-center text-primary font-sans text-h3-lg hover:bg-accent">
                    Show More
        </a>
    </div>
    