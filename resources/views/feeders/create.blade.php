<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Add New Feeder') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="list-disc list-inside text-red-500">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('feeders.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="pet_name">Pet Name</label>
        <input type="text" name="pet_name" id="pet_name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="food_type">Food Type</label>
        <input type="text" name="food_type" id="food_type" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="scheduled_time">Scheduled Time</label>
        <input type="datetime-local" name="scheduled_time" id="scheduled_time" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>
            </div>
        </div>
    </div>
</x-app-layout>
