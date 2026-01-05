<x-layout title="Plants">

    <h1 class="text-3xl text-[#295334] font-bold mb-6 text-center mt-8">
        Plants in my Garden
    </h1>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="container mx-auto px-4 py-2 bg-green-100 text-green-700 rounded mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    @if(isset($searchQuery))
    <div class="text-center mt-4 text-[#16312B]">
        @if($resultsCount > 0)
            <p class="font-semibold">
                {{ $resultsCount }} result{{ $resultsCount > 1 ? 's' : '' }}
                found for <span class="italic">"{{ $searchQuery }}"</span>
            </p>
        @else
            <p class="font-semibold text-red-600">
                No results found for <span class="italic">"{{ $searchQuery }}"</span>
            </p>
        @endif
    </div>
    @endif


    @auth
        @if($plants->count() > 0)
            <!-- Plant cards grid -->
            <div class="grid gap-25 pt-10 justify-center"
                style="grid-template-columns: repeat(auto-fit, minmax(10rem, max-content));">
                @foreach ($plants as $plant)
                    <div class="bg-[#C2DEC1] rounded-lg shadow hover:shadow-lg transition w-60 h-50 p-2 flex flex-col p-4 justify-center items-center text-center">
                        <h2 class=" text-2xl font-bold leading-tight">
                            <a href="/plants/{{ $plant->id }}" class="text-green-700 ">
                                {{ $plant->name }}
                            </a>
                        </h2>
                        <p class="text-gray-700 leading-snug text-sm mt-1">
                            @if($plant->category)
                                {{ $plant->category->name }}
                            @else
                                No category
                            @endif
                        </p>
                    </div>
                @endforeach
            </div>
            
        <!-- Pagination links -->
        <div class="mt-6 flex justify-center">
            {{ $plants->links('pagination::tailwind') }}
        </div>
        @else
            <p class="text-center text-gray-700">No plants found.</p>
        @endif
    @endauth

    @guest
        <p class="text-center text-gray-700 mt-6">
            You need to be logged in to view the content of this website.
        </p>
    @endguest

</x-layout>
