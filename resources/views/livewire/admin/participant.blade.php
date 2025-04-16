<div class="p-4">
    <div class="flex justify-end">
        <button wire:click="$set('showModal', true)"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Add Participant(s)
        </button>
    </div>

    <div class="mt-6 bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-blue-100 text-xs uppercase font-bold">
                <tr>
                    <th class="px-4 py-2">Group Name</th>
                    <th class="px-4 py-2">Instructions</th>
                    <th class="px-4 py-2">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($participants as $participant)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $participant->group->group_name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $participant->instructions ?: '-' }}</td>
                        <td class="px-4 py-2">{{ $participant->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($showModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50">
            <div class="bg-white p-6 rounded-xl w-full max-w-lg shadow-lg overflow-y-auto max-h-[90vh]">
                <h2 class="text-lg font-semibold mb-4">Create Participant(s)</h2>

                <form wire:submit.prevent="save" class="space-y-4">
                    <div>
                        <label class="block font-medium mb-2">Select Group(s)</label>
                        <div class="space-y-2 max-h-60 overflow-y-auto p-2 border rounded">
                            @foreach ($groups as $group)
                                <label class="flex items-center space-x-2">
                                    <input
                                        type="checkbox"
                                        wire:model="selectedGroups"
                                        value="{{ $group->id }}"
                                        class="rounded text-blue-600"
                                    >
                                    <span>{{ $group->group_name }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('selectedGroups') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block font-medium mb-1">Instructions (Optional)</label>
                        <textarea
                            wire:model="instructions"
                            class="w-full border p-2 rounded"
                            rows="4"
                            placeholder="Enter instructions for all selected groups"
                        ></textarea>
                        @error('instructions') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
