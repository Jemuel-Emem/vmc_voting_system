<div class="p-4 space-y-6">

    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold mb-2">President Votes</h2>
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="bg-blue-100">
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Year</th>
                    <th class="px-4 py-2">Section</th>
                    <th class="px-4 py-2">Votes</th>
                </tr>
            </thead>
            <tbody>
                @php

                    $highestPresidentVotes = $presidents->max('votes');
                @endphp

                @foreach ($presidents as $p)
                    <tr class="border-b {{ $p->votes == $highestPresidentVotes ? 'bg-green-100' : '' }}">
                        <td class="px-4 py-2">{{ $p->name }}</td>
                        <td class="px-4 py-2">{{ $p->year }}</td>
                        <td class="px-4 py-2">{{ $p->section }}</td>
                        <td class="px-4 py-2 font-bold">{{ $p->votes }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold mb-2">Vice President Votes</h2>
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="bg-blue-100">
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Year</th>
                    <th class="px-4 py-2">Section</th>
                    <th class="px-4 py-2">Votes</th>
                </tr>
            </thead>
            <tbody>
                @php

                    $highestVicePresidentVotes = $vicepres->max('votes');
                @endphp

                @foreach ($vicepres as $vp)
                    <tr class="border-b {{ $vp->votes == $highestVicePresidentVotes ? 'bg-green-100' : '' }}">
                        <td class="px-4 py-2">{{ $vp->name }}</td>
                        <td class="px-4 py-2">{{ $vp->year }}</td>
                        <td class="px-4 py-2">{{ $vp->section }}</td>
                        <td class="px-4 py-2 font-bold">{{ $vp->votes }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="bg-white p-4 rounded shadow">
        <h2 class="text-lg font-semibold mb-2">Senator Votes</h2>
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="bg-blue-100">
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Year</th>
                    <th class="px-4 py-2">Section</th>
                    <th class="px-4 py-2">Votes</th>
                </tr>
            </thead>
            <tbody>
                @php

                    $sortedSenators = $senatorVotes->sortByDesc('votes')->take(4);
                @endphp

                @foreach ($senatorVotes as $senator)
                    @php

                        $isTopFour = $sortedSenators->contains($senator);
                    @endphp

                    <tr class="border-b {{ $isTopFour ? 'bg-green-100' : '' }}">
                        <td class="px-4 py-2">{{ $senator->name }}</td>
                        <td class="px-4 py-2">{{ $senator->year }}</td>
                        <td class="px-4 py-2">{{ $senator->section }}</td>
                        <td class="px-4 py-2 font-bold">{{ $senator->votes }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
