@php
    $totalPresidentVotes = $presidents->sum('votes');
    $totalVicepresVotes = $vicepres->sum('votes');
    $totalSenatorVotes = $senators->sum('votes');
@endphp

<div class="grid grid-cols-1 md:grid-cols-1 gap-6">
    <!-- Statistical View: Votes per Candidate -->
    <div class="bg-white rounded-xl shadow-lg p-6 mt-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-6">Votes per Candidate (Statistical View)</h2>

        <!-- PRESIDENTS -->
        <h3 class="text-md font-bold text-blue-600 mb-2">Presidents</h3>
        <ul class="mb-6 space-y-2">
            @foreach ($presidents as $president)
                @php
                    $percent = $totalPresidentVotes ? round(($president->votes / $totalPresidentVotes) * 100, 1) : 0;
                @endphp
                <li>
                    <div class="flex justify-between mb-1 text-sm">
                        <span>{{ $president->name }}</span>
                        <span>{{ $president->votes }} votes ({{ $percent }}%)</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-blue-500 h-3 rounded-full" style="width: {{ $percent }}%"></div>
                    </div>
                </li>
            @endforeach
        </ul>

        <!-- VICE PRESIDENTS -->
        <h3 class="text-md font-bold text-purple-600 mb-2">Vice Presidents</h3>
        <ul class="mb-6 space-y-2">
            @foreach ($vicepres as $vp)
                @php
                    $percent = $totalVicepresVotes ? round(($vp->votes / $totalVicepresVotes) * 100, 1) : 0;
                @endphp
                <li>
                    <div class="flex justify-between mb-1 text-sm">
                        <span>{{ $vp->name }}</span>
                        <span>{{ $vp->votes }} votes ({{ $percent }}%)</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-purple-500 h-3 rounded-full" style="width: {{ $percent }}%"></div>
                    </div>
                </li>
            @endforeach
        </ul>

        <!-- SENATORS -->
        <h3 class="text-md font-bold text-green-600 mb-2">Senators</h3>
        <ul class="space-y-2">
            @foreach ($senators as $senator)

                @php
                    $percent = $totalSenatorVotes ? round(($senator->votes / $totalSenatorVotes) * 100, 1) : 0;
                @endphp
                <li>
                    <div class="flex justify-between mb-1 text-sm">
                        <span>{{ $senator->name }}</span>

                        <span>{{ $senator->votes }} votes ({{ $percent }}%)</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-green-500 h-3 rounded-full" style="width: {{ $percent }}%"></div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
