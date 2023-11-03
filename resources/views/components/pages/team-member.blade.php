<x-app-layout
    gap="30px" title="TeamMember">

    <h1 class="text-h1-lg font-serif">Be Our Partner</h1>
    <div class="flex flex-row w-full justify-center flex-wrap" style="gap: 20px">
        @foreach ($members as $member)
        <x-member-card 
           
            name='{{$member->name}}'
            divisionName='{{$member->division->name}}'
            imageUrl='{{$member->image_url}}'
            qualification='{{$member->qualification}}'/>
        @endforeach
    </div>

</x-app-layout>