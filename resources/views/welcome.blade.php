<x-app-layout
  gap="60px" title="Navigation bar">

  <x-welcome />

  <x-pages.about-us/>
  
  {{-- @foreach ($members as $member)
  <x-pages.about-us imageUrl="{{$member->image_url}}" />
  @endif --}}
  
</x-app-layout>
