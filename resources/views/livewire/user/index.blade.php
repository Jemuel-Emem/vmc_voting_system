<div class="max-w-5xl mx-auto px-6 py-10 bg-white shadow-2xl rounded-3xl space-y-12">

   @if(session('message'))
   <div class="text-center p-4 bg-green-100 border border-green-300 text-green-800 rounded-xl shadow-sm">
       ✅ {{ session('message') }}
   </div>
@endif
    <form wire:submit.prevent="submitVote" class="space-y-12">


        <section>
            <h2 class="text-2xl font-bold text-blue-700 mb-6 border-b pb-2">President</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($presidents as $president)
                <label class="block p-5 border rounded-xl shadow-sm hover:shadow-md cursor-pointer transition-all bg-gray-50">
                    <div class="flex items-start space-x-4">
                        <input type="radio" wire:model="selectedPresident" value="{{ $president->id }}"
                               class="mt-1 h-5 w-5 text-blue-600 focus:ring-blue-500">
                        <div>
                            <div class="text-lg font-semibold text-gray-800">{{ $president->name }}</div>
                            <div class="text-sm text-gray-500">{{ $president->year }} {{ $president->section ? '• ' . $president->section : '' }}</div>
                        </div>

                        <div class="flex-shrink-0">
                            <img src="{{ asset('storage/' . $president->image) }}" alt="President Image" class="w-20 h-20 object-cover rounded-full">
                        </div>
                    </div>
                </label>

                @endforeach
            </div>
            @error('selectedPresident')
                <p class="text-red-600 text-sm mt-2">⚠ {{ $message }}</p>
            @enderror
        </section>

        {{-- VICE PRESIDENT --}}
        <section>
            <h2 class="text-2xl font-bold text-blue-700 mb-6 border-b pb-2">Vice President</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($vicepresidents as $vicepres)
                <label class="block p-5 border rounded-xl shadow-sm hover:shadow-md cursor-pointer transition-all bg-gray-50">
                    <div class="flex items-start space-x-4">
                        <input type="radio" wire:model="selectedVicepres" value="{{ $vicepres->id }}"
                               class="mt-1 h-5 w-5 text-blue-600 focus:ring-blue-500">
                        <div>
                            <div class="text-lg font-semibold text-gray-800">{{ $vicepres->name }}</div>
                            <div class="text-sm text-gray-500">{{ $vicepres->year }} {{ $vicepres->section ? '• ' . $vicepres->section : '' }}</div>
                        </div>

                        <!-- Displaying the image -->
                        <div class="flex-shrink-0">
                            <img src="{{ asset('storage/' . $vicepres->image) }}" alt="Vice President Image" class="w-20 h-20 object-cover rounded-full">
                        </div>
                    </div>
                </label>
            @endforeach

            </div>
            @error('selectedVicepres')
                <p class="text-red-600 text-sm mt-2">⚠ {{ $message }}</p>
            @enderror
        </section>


        <section>
            <h2 class="text-2xl font-bold text-blue-700 mb-6 border-b pb-2">Senators (Choose 4)</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($senators as $senator)
                <label class="block p-5 border rounded-xl shadow-sm hover:shadow-md cursor-pointer transition-all bg-gray-50">
                    <div class="flex items-start space-x-4">
                        <input type="checkbox" wire:model="selectedSenators" value="{{ $senator->id }}"
                               class="mt-1 h-5 w-5 text-blue-600 focus:ring-blue-500">
                        <div>
                            <div class="text-lg font-semibold text-gray-800">{{ $senator->name }}</div>
                            <div class="text-sm text-gray-500">{{ $senator->year }} {{ $senator->section ? '• ' . $senator->section : '' }}</div>
                        </div>

                        <!-- Displaying the image -->
                        <div class="flex-shrink-0">
                            <img src="{{ asset('storage/' . $senator->image) }}" alt="Senator Image" class="w-20 h-20 object-cover rounded-full">
                        </div>
                    </div>
                </label>
            @endforeach

            </div>
            @error('selectedSenators')
                <p class="text-red-600 text-sm mt-2">⚠ {{ $message }}</p>
            @enderror
            @if(count($selectedSenators) > 4)
                <p class="text-red-600 text-sm mt-2 font-medium">⚠ You selected {{ count($selectedSenators) }} senators. Please select exactly 4.</p>
            @endif
        </section>

        {{-- SUBMIT --}}
        <div class="flex justify-center pt-4">
            <button type="submit"
                    class="px-10 py-3 text-white bg-blue-600 hover:bg-blue-700 font-semibold rounded-full shadow-md transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                📨 Submit Vote
            </button>
        </div>
    </form>


</div>
