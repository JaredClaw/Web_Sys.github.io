<!-- resources/views/feeders/edit.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Feeder</h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('feeders.update', $feeder->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <input type="text" name="pet_name" value="{{ $feeder->pet_name }}" class="w-full p-2 border rounded" required>

            <input type="text" name="food_type" value="{{ $feeder->food_type }}" class="w-full p-2 border rounded" required>

            <input type="number" name="quantity" value="{{ $feeder->quantity }}" class="w-full p-2 border rounded" required>

            <input type="datetime-local" name="scheduled_time" value="{{ date('Y-m-d\TH:i', strtotime($feeder->scheduled_time)) }}" class="w-full p-2 border rounded" required>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
