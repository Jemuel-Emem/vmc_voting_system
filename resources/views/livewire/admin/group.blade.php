<div class="p-4">
    <div class="flex justify-end">
        <button wire:click="$set('showModal', true)"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Add Participant
        </button>
    </div>

    <div class="mt-6 bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-blue-100 text-xs uppercase font-bold">
                <tr>
                    <th class="px-4 py-2">Group Name</th>
                    <th class="px-4 py-2">President</th>
                    <th class="px-4 py-2">Vice President</th>
                    <th class="px-4 py-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $group->group_name }}</td>
                        <td class="px-4 py-2">{{ $group->president->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $group->vicepres->name ?? '-' }}</td>
                        <td class="px-4 py-2 text-center">
                            <button wire:click="showSenators({{ $group->id }})"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">
                                Show Senators
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal to show Senators -->
    @if ($showSenatorModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50">
            <div class="bg-white p-6 rounded-xl w-full max-w-md shadow-lg">
                <h2 class="text-lg font-semibold mb-4">Senators for Group: {{ $activeGroupName }}</h2>

                <ul class="list-disc pl-5">
                    @foreach ($senatorList as $senator)
                        <li>{{ $senator->name }} ({{ $senator->year }} - {{ $senator->section }})</li>
                    @endforeach
                </ul>

                <div class="flex justify-end mt-4">
                    <button wire:click="$set('showSenatorModal', false)"
                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Close</button>
                </div>
            </div>
        </div>
    @endif

    @if ($showModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50">
            <div class="bg-white p-6 rounded-xl w-full max-w-lg shadow-lg overflow-y-auto max-h-[90vh]">
                <h2 class="text-lg font-semibold mb-4">Create Group</h2>

                <form wire:submit.prevent="save" class="space-y-4">
                    <div>
                        <label class="block font-medium mb-1">Group Name</label>
                        <input type="text" wire:model="group_name" class="w-full border p-2 rounded">
                        @error('group_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block font-medium mb-1">Select President</label>
                        @foreach ($presidents as $president)
                            <label class="block">
                                <input type="radio" wire:model="selectedPresident" value="{{ $president->id }}">
                                {{ $president->name }}
                            </label>
                        @endforeach
                        @error('selectedPresident') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block font-medium mb-1">Select Vice President</label>
                        @foreach ($vicepresidents as $vp)
                            <label class="block">
                                <input type="radio" wire:model="selectedVicepres" value="{{ $vp->id }}">
                                {{ $vp->name }}
                            </label>
                        @endforeach
                        @error('selectedVicepres') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block font-medium mb-1">Select 4 Senators</label>
                        @foreach ($senators as $senator)
                            <label class="block">
                                <input type="checkbox" wire:model="selectedSenators" value="{{ $senator->id }}">
                                {{ $senator->name }}
                            </label>
                        @endforeach
                        @error('selectedSenators') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        @if (count($selectedSenators) > 4)
                            <span class="text-red-500 text-sm">You can only select 4 senators.</span>
                        @endif
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="button" wire:click="$set('showModal', false)"
                            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
                        <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Save</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
