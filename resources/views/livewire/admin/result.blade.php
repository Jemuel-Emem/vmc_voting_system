<div class="max-w-8xl mx-auto py-6 px-4">
    <h3 class="text-3xl font-semibold text-center mb-6 text-gray-800">Election Results</h3>

    <!-- PRESIDENTS -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h4 class="text-2xl font-bold text-blue-600 mb-4">Presidents</h4>
        <ul class="space-y-4">
            @foreach($presidents as $president)
                <li class="flex justify-between items-center border-b border-gray-200 pb-3">
                    <span class="text-lg text-gray-800">{{ $president->name }}</span>
                    <span class="text-sm text-gray-500">{{ $president->votes }} votes</span>

                </li>
            @endforeach
        </ul>
    </div>

    <!-- VICE PRESIDENTS -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
        <h4 class="text-2xl font-bold text-purple-600 mb-4">Vice Presidents</h4>
        <ul class="space-y-4">
            @foreach($vicepres as $vp)
                <li class="flex justify-between items-center border-b border-gray-200 pb-3">
                    <span class="text-lg text-gray-800">{{ $vp->name }}</span>
                    <span class="text-sm text-gray-500">{{ $vp->votes }} votes</span>

                </li>
            @endforeach
        </ul>
    </div>

    <!-- SENATORS -->
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h4 class="text-2xl font-bold text-green-600 mb-4">Senators</h4>
        <ul class="space-y-4">
            @foreach($senators as $senator)
                <li class="flex justify-between items-center border-b border-gray-200 pb-3">
                    <span class="text-lg text-gray-800">{{ $senator->name }}</span>
                    <span class="text-sm text-gray-500">{{ $senator->votes }} votes</span>

                </li>
            @endforeach
        </ul>
    </div>
</div>
