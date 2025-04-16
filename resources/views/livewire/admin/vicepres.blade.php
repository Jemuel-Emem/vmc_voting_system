<div class="p-4">
    <div class="flex justify-end">
        <!-- Add Button -->
        <button wire:click="$set('showModal', true)"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 w-64">
        Add Vice President
    </button>
    </div>

  <!-- Table of Senators -->
  <div class="mt-6 bg-white shadow-md rounded-lg overflow-x-auto">
      <table class="min-w-full text-sm text-left text-gray-700">
          <thead class="bg-blue-100 text-xs uppercase font-bold">
              <tr>
                <th class="px-4 py-2">Image</th>
                  <th class="px-4 py-2">Name</th>
                  <th class="px-4 py-2">Year</th>
                  <th class="px-4 py-2">Section</th>
                  <th class="px-4 py-2 text-center">Actions</th>
              </tr>
          </thead>
          <tbody>
            @forelse($vicepresidents as $vp)
            <tr class="border-b hover:bg-gray-100">
                <td class="px-4 py-2">
                    @if($vp->image)
                        <img src="{{ asset('storage/' . $vp->image) }}" class="w-12 h-12 object-cover rounded-full">
                    @else
                        <span class="text-gray-400 italic">No image</span>
                    @endif
                </td>
                <td class="px-4 py-2">{{ $vp->name }}</td>
                <td class="px-4 py-2">{{ $vp->year }}</td>
                <td class="px-4 py-2">{{ $vp->section }}</td>
                <td class="px-4 py-2 text-center space-x-2">
                    <button wire:click="edit({{ $vp->id }})"
                        class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">Edit</button>
                    <button wire:click="delete({{ $vp->id }})"
                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Delete</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center py-4">No vice presidents found.</td>
            </tr>
        @endforelse

          </tbody>
      </table>
  </div>


      <!-- Modal -->
      @if ($showModal)
          <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
              <div class="bg-white p-6 rounded-xl w-full max-w-md shadow-lg">
                  <h2 class="text-xl font-semibold mb-4">Add Vice President</h2>

                  <form wire:submit.prevent="save" class="space-y-4">
                    <div>
                        <label class="block mb-1 text-gray-700">Image</label>
                        <input type="file" wire:model="image" class="w-full border p-2 rounded">
                        @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                      <div>
                          <label class="block mb-1 text-gray-700">Name</label>
                          <input type="text" wire:model="name" class="w-full border p-2 rounded">
                          @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                      </div>

                      <div>
                          <label class="block mb-1 text-gray-700">Year</label>
                          <input type="text" wire:model="year" class="w-full border p-2 rounded">
                          @error('year') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                      </div>

                      <div>
                          <label class="block mb-1 text-gray-700">Section</label>
                          <input type="text" wire:model="section" class="w-full border p-2 rounded">
                          @error('section') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
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
