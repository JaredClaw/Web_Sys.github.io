<x-app-layout>
<x-slot name="header">
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Feeder') }}
        </h2>
        <a href="{{ route('feeders.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow transition duration-150">
            + Add Feeder
        </a>
    </div>
</x-slot>

    <div class="py-8 px-4 max-w-6xl mx-auto">
        



        <!-- Feeder Table -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <h3 class="text-lg font-semibold text-white mb-4">Current Feeders</h3>
            <table class="min-w-full table-auto text-white text-left">
                <thead>
                    <tr class="bg-gray-700">
                        <th class="px-4 py-2">Pet Name</th>
                        <th class="px-4 py-2">Food Type</th>
                        <th class="px-4 py-2">Quantity (g)</th>
                        <th class="px-4 py-2">Scheduled Time</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($feeders as $feeder)
                        <tr class="border-t border-gray-600">
                            <td class="px-4 py-2">{{ $feeder->pet_name }}</td>
                            <td class="px-4 py-2">{{ $feeder->food_type }}</td>
                            <td class="px-4 py-2">{{ $feeder->quantity }}</td>
                            <td class="px-4 py-2">{{ $feeder->scheduled_time }}</td>
                            <td class="px-4 py-2">
                                <form method="POST" action="{{ route('feeders.destroy', $feeder) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 hover:text-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-400">No feeders added yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
