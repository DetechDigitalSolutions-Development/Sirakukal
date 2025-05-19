@props(['announcement'])

<div class="bg-white rounded-lg shadow-md overflow-hidden w-full sm:w-4/5 mx-auto">
    @if($announcement->image_url)
        <div class="h-40 sm:h-48 md:h-64 w-full overflow-hidden">
            <img src="{{ $announcement->image_url }}" alt="Announcement" class="w-full h-full object-cover">
        </div>
    @endif
    <div class="p-3 sm:p-4 md:p-6">
        <div class="flex items-center mb-2 sm:mb-3">
            <div class="text-xs sm:text-sm text-gray-500">
                <p class="font-bold text-gray-800">{{ $announcement->author }}</p>
            </div>
        </div>
        <div class="mt-2">
            <p class="text-sm sm:text-base text-gray-800">{{ $announcement->description }}</p>
        </div>
    </div>
</div>
