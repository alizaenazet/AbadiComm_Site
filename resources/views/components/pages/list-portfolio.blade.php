<x-app-layout gap="45px" title="ListPortfolio">
    <div class="w-full h-full px-7 py-[18px] px-[20px] bg-white rounded-lg shadow flex-col justify-start items-start gap-2.5 inline-flex">
        <div class="h-8 justify-start items-start gap-3.5 inline-flex">
           
                <select id="categoriesYear">
                    @foreach ($years as $year)
                    <option  value={{$year}}>{{$year}}</option>
                    @endforeach
                </select>
                <select id="categoriesSelect">
                    @foreach ($categories as $category)
                    <option id={{$category->id}} value={{$category->id}}>{{$category->name}}</option>
                    @endforeach
                </select>
                
            {{-- CheckBox --}}
        </div>
        <div  id="list-category" class="w-full h-[90px] p-2.5 rounded-md justify-start items-start gap-2.5 inline-flex">
            @forelse ($categoriesFilterNameList as $filterCagetory)
            <div class="px-[22px] py-[3px] rounded-[30px] border-2 border-amber-300 justify-center items-center gap-2.5 flex">
                <div class="text-black text-base font-normal font-sans">{{$filterCagetory}}</div>
            </div>
            @empty
                {{-- Do noting --}}
            @endforelse
        </div>
        <form action="/list-portfolio/filter" method="POST" class="w-full h-full">
            @csrf
            @method("PUT")
            <input type="hidden" id="categoriesFilter"  name="categoriesFilter" value={{$categoriesFilterList}}/>
            <input type="hidden" id="yearsFilter"  name="yearsFilter" value={{$yearFilterList}} />
            <button id="set-filter"  type="submit" style="padding: 2px 6px" class="border-2 flex flex-row items-center gap-1 w-fit  px-8 border-blue-500 font-medium rounded-lg text-center ">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z" class="fill-black"/></svg>    
                Search
            </button>
        </form>
        </div>
    </form>

    <div class="w-full flex justify-around flex-row flex-wrap gap-6">
        @foreach ($portfolios as $portfolio)
            <div class="flex flex-wrap flex-col w-[40%] gap-y-3 justify-between">

               <div class="flex flex-col gap-1">
                <div class="w-full h-fit">
                    <img class="object-cover rounded-lg flex-col"
                        src={{ $portfolio->portfolioImage[0]->image_url }} alt="" />
                    <p class="text-black text-h3-lg font-bold font-serif">{{ $portfolio->title }}</p>
                </div>

                <div>
                    <div class="w-full h-auto flex flex-row flex-wrap gap-x-1 gap-y-2 " >
                        @foreach ($portfolio->categories as $category)
                            <x-category name='{{ $category->name }}' />
                        @endforeach
                    </div>
                    <p class="font-sans text-normal-lg w-full">
                        {{ $portfolio->year() }}, {{ $portfolio->promoter }}
                    </p>
                </div>
               </div>

                <button type="button" style="padding: 2px 6px"
                    class="border-2 w-fit  px-8 border-blue-500 font-medium rounded-lg text-center ">
                    See Detail
                </button>

            </div>
        @endforeach
    </div>

    <script>
        var categories = [];
        var years = []
        $(document).ready(function () {
            var isFirstRender = false

            if (!isFirstRender) {
                isFirstRender = true
                
                if (($("#categoriesFilter").val()).length > 1) {
                    var categoriesFilterArr =  $('#categoriesFilter').val();   
                    categories = categoriesFilterArr.split(',')
                }
                
                if (($("#yearsFilter").val()).length > 1) {
                    var yearsFilterArr =  $('#yearsFilter').val();   
                    years = yearsFilterArr.split(',')
                }
            }


            $('#categoriesSelect').change(function (e) { 
                var categoryName = $('#categoriesSelect').find(":selected").text();
                var categoryId = $('#categoriesSelect').find(":selected").val();
                if (!categories.includes(categoryId)) {
                    categories[categories.length] = categoryId 
                    $('#list-category').append(' <div class="px-[22px] py-[3px] rounded-[30px] border-2 border-amber-300 justify-center items-center gap-2.5 flex"><div class="text-black text-base font-normal font-sans">'+ categoryName +'</div></div>');
                    $("#categoriesFilter").val(categories.toString());
                }
            });    

          

            $('#categoriesYear').change(function (e) { 
                e.preventDefault();
                var yearValue = $('#categoriesYear').find(":selected").val();
                if (!years.includes(yearValue)) {
                    years[years.length] = yearValue 
                    $('#list-category').append(' <div class="px-[22px] py-[3px] rounded-[30px] border-2 border-amber-300 justify-center items-center gap-2.5 flex"><div class="text-black text-base font-normal font-sans">'+ yearValue +'</div></div>');
                    $("#yearsFilter").val(years.toString());
                }
            });
        });
    </script>

</x-app-layout>