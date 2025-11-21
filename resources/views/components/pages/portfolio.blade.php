<x-app-layout gap="20px" title="{{ $portfolio->title }}">
    <x-slot:navbar>
        <x-navbar />
    </x-slot>

    @php
      // Hilangkan duplikat berdasarkan URL gambar
      $images = $portfolio->portfolioImage->unique('image_url')->values();
      $first = $images->first();
      // fallback local file (path yang kamu upload)
      $fallback = '/mnt/data/bbc1bee8-f71a-4850-8fd7-4aa46b1d3a99.png';
    @endphp

    <div class="mt-6 w-full h-fit flex flex-col justify-center items-center gap-3">
        {{-- Main display: pakai background tetapi set property dengan benar --}}
        <div id="imageDisplay"
             class="aspect-[3/2] w-full max-h-[300px] md:max-h-[578px] lg:w-fit lg:h-[638px] rounded-lg bg-center bg-no-repeat"
             style="background-color: rgb(255, 255, 255);
                    background-image: url('{{ $first->image_url ?? $fallback }}');
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: contain;">
        </div>

        {{-- Thumbnails (sudah tanpa duplikat) --}}
        <div class="flex flex-row h-max overflow-x-auto gap-2 mt-3">
            @foreach ($images as $image)
                <img
                  id="img-{{ $image->id }}"
                  data-src="{{ $image->image_url }}"
                  class="imagesItem aspect-[3/2] max-w-[62px] md:max-w-[72px] hover:border-4 hover:border-accent hover:rounded-md cursor-pointer object-cover"
                  src="{{ $image->image_url }}"
                  alt="thumbnail {{ $loop->index + 1 }}">
            @endforeach
        </div>
    </div>

    <div class="flex flex-col h-full gap-1 items-center">
        <h1 class="font-serif font-bold text-h1-sm md:text-h1-lg">{{ $portfolio->title }}</h1>
        <h3 class="text-h3-sm md:text-h3-lg">{{ $portfolio->date }}</h3>
    </div>

    <div class="max-w-full h-max flex flex-col justify-start items-center gap-20">
        <div class="w-fit max-h-[200px] lg:max-w-[750px] grid grid-rows-2 md:grid-cols-2 gap-16 md:gap-6 place-content-center">
            <div class="flex flex-col gap-3 w-full h-full md:border-r-2 md:border-black pr-[16px]">
                <h3 class="text-h3-sm md:text-h3-lg w-full text-start">Kategori event</h3>
                <div class="w-fit flex flex-row flex-wrap gap-2">
                    @foreach ($portfolio->categories as $category)
                        <x-category name="{{ $category->name }}" />
                    @endforeach
                </div>
            </div>

            <div class="flex w-fit flex-col gap-3 lg:max-w-[250px]">
                <h3 class="text-h3-sm md:text-h3-lg">Penyelenggara</h3>
                <ul class="pl-[15px] list-disc list-outside">
                    @foreach ($portfolio->portfolioPromoter as $promoter)
                        <li class="text-medium-sm md:text-medium-lg">{{ $promoter->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="w-full flex flex-col gap-1 items-start">
            <h2 class="font-serif text-h2-lg">Deskripsi</h2>
            <p class="text-medium-sm md:text-h3-lg">{{ $portfolio->content }}</p>
        </div>
    </div>

    {{-- Script: gunakan jQuery seperti sebelumnya tapi set semua properti background --}}
    <script>
        $(document).ready(function () {
            var onDisplayId = "";

            // klik thumbnail -> ganti background main dengan benar
            $('img.imagesItem').on('click', function (e) {
                e.preventDefault();
                var id = $(this).attr('id');

                // hapus kelas aktif pada thumbnail sebelumnya
                if (onDisplayId) {
                    $('#' + onDisplayId).removeClass('border-4 border-primary rounded-md drop-shadow-xl');
                }

                // ambil src yang ter-simpan di data-src (lebih aman) atau fallback ke attr src
                var imageUrl = $(this).data('src') || $(this).attr('src');
                if (!imageUrl) return;

                // set css background secara eksplisit (jangan pake shorthand 'background')
                $('#imageDisplay').css({
                    'background-image': "url('" + imageUrl + "')",
                    'background-repeat': 'no-repeat',
                    'background-size': 'contain',    // ganti 'cover' jika mau full crop
                    'background-position': 'center'
                });

                // tambahkan kelas aktif pada thumbnail yang dipilih
                $(this).addClass('border-4 border-primary rounded-md drop-shadow-xl');
                onDisplayId = id;
            });
        });
    </script>
</x-app-layout>
