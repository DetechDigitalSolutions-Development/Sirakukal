@if (isset($imageUrl))
    <div class="mt-2">
        <label class="block text-sm font-medium text-gray-700 mb-1">Preview</label>
        <img src="{{ $imageUrl }}" alt="Preview" class="rounded-md border shadow w-60 h-auto" />
    </div>
@endif
