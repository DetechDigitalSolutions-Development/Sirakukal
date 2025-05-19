@props(['announcement'])

<div class="bg-white rounded-lg shadow-md overflow-hidden w-4/5 mx-auto">
    @if($announcement->image_url)
        <div class="h-64 w-full overflow-hidden">
            <img src="{{ $announcement->image_url }}" alt="Announcement" class="w-full h-full object-cover">
        </div>
    @endif
    <div class="p-6">
        <div class="flex items-center mb-3">
            <div class="text-sm text-gray-500">
                <p class="font-bold text-gray-800">{{ $announcement->author }}</p>
            </div>
        </div>
        <div class="mt-2">
            <p class="text-gray-800">{{ $announcement->description }}</p>
        </div>
    </div>
</div>
