<div class="p-6 space-y-10">

    <h2 class="text-2xl font-bold text-gray-800 text-center">Candidate Lineup</h2>

    <!-- PRESIDENTS -->
    <div>
        <h3 class="text-xl font-semibold text-blue-600 mb-4">Presidents</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($presidents as $president)
                <div class="bg-white rounded-lg shadow-md p-4 text-center">
                    <img src="{{ asset('storage/' . $president->image) }}" alt="{{ $president->name }}"
                         class="w-24 h-24 mx-auto rounded-full object-cover mb-3">
                    <h4 class="text-lg font-bold text-gray-800">{{ $president->name }}</h4>
                    <p class="text-sm text-gray-600">President Candidate</p>
                </div>
            @empty
                <p class="text-gray-500">No president candidates available.</p>
            @endforelse
        </div>
    </div>

    <!-- VICE PRESIDENTS -->
    <div>
        <h3 class="text-xl font-semibold text-purple-600 mb-4">Vice Presidents</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($vicepres as $vp)
                <div class="bg-white rounded-lg shadow-md p-4 text-center">
                    <img src="{{ asset('storage/' . $vp->image) }}" alt="{{ $vp->name }}"
                         class="w-24 h-24 mx-auto rounded-full object-cover mb-3">
                    <h4 class="text-lg font-bold text-gray-800">{{ $vp->name }}</h4>
                    <p class="text-sm text-gray-600">Vice President Candidate</p>
                </div>
            @empty
                <p class="text-gray-500">No vice president candidates available.</p>
            @endforelse
        </div>
    </div>

    <!-- SENATORS -->
    <div>
        <h3 class="text-xl font-semibold text-green-600 mb-4">Senators</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @forelse ($senators as $senator)
                <div class="bg-white rounded-lg shadow-md p-4 text-center">
                    <img src="{{ asset('storage/' . $senator->image) }}" alt="{{ $senator->name }}"
                         class="w-20 h-20 mx-auto rounded-full object-cover mb-3">
                    <h4 class="text-md font-bold text-gray-800">{{ $senator->name }}</h4>
                    <p class="text-sm text-gray-600">Senator Candidate</p>
                </div>
            @empty
                <p class="text-gray-500">No senator candidates available.</p>
            @endforelse
        </div>
    </div>

</div>
