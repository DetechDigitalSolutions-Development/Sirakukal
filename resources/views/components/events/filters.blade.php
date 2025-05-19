<div class="bg-white p-3 sm:p-4 md:p-6 rounded-lg shadow-md mb-4 sm:mb-6 md:mb-8">
    <div class="mb-3 sm:mb-4">
        <h4 class="text-base sm:text-lg font-bold mb-2 sm:mb-4">Filter Events</h4>
    </div>

    <form wire:submit.prevent="applyFilters" class="space-y-4 sm:space-y-6">
        {{-- Search --}}
        <div>
            <label for="search" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Keywords</label>
            <div class="relative rounded-md shadow-sm">
                <input type="text" wire:model.defer="filters.search" id="search" 
                    class="block w-full px-3 sm:px-4 py-1.5 sm:py-2 text-xs sm:text-sm border border-gray-300 rounded-md focus:ring-primary focus:border-primary" 
                    placeholder="Search events...">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 sm:h-5 sm:w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>

        {{-- Categories --}}
        <div>
            <label for="category" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Category</label>
            <select wire:model.defer="filters.category" id="category" 
                class="block w-full px-3 py-1.5 sm:py-2 text-xs sm:text-sm border border-gray-300 rounded-md focus:ring-primary focus:border-primary">
                <option value="">All Categories</option>
                @foreach($categories ?? ['Community Service', 'Education', 'Environment', 'Health', 'Youth'] as $category)
                    <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>

        {{-- Status --}}
        <div>
            <label class="block text-xs sm:text-sm font-medium text-gray-700 mb-2">Status</label>
            <div class="flex flex-wrap gap-3 sm:gap-4">
                <label class="inline-flex items-center">
                    <input type="radio" wire:model.defer="filters.status" value="all" class="form-radio h-3 w-3 sm:h-4 sm:w-4 text-primary focus:ring-primary">
                    <span class="ml-1.5 sm:ml-2 text-xs sm:text-sm text-gray-700">All</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" wire:model.defer="filters.status" value="upcoming" class="form-radio h-3 w-3 sm:h-4 sm:w-4 text-primary focus:ring-primary">
                    <span class="ml-1.5 sm:ml-2 text-xs sm:text-sm text-gray-700">Upcoming</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" wire:model.defer="filters.status" value="completed" class="form-radio h-3 w-3 sm:h-4 sm:w-4 text-primary focus:ring-primary">
                    <span class="ml-1.5 sm:ml-2 text-xs sm:text-sm text-gray-700">Completed</span>
                </label>
            </div>
        </div>

        {{-- Date Range --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
            <div>
                <label for="date_from" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">From Date</label>
                <input type="date" wire:model.defer="filters.date_from" id="date_from" 
                    class="block w-full px-3 py-1.5 sm:py-2 text-xs sm:text-sm border border-gray-300 rounded-md focus:ring-primary focus:border-primary">
            </div>
            <div>
                <label for="date_to" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">To Date</label>
                <input type="date" wire:model.defer="filters.date_to" id="date_to" 
                    class="block w-full px-3 py-1.5 sm:py-2 text-xs sm:text-sm border border-gray-300 rounded-md focus:ring-primary focus:border-primary">
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-wrap gap-3 sm:gap-4">
            <button type="submit" class="inline-flex items-center px-3 sm:px-4 py-1.5 sm:py-2 border border-transparent text-xs sm:text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                Apply Filters
            </button>
            <button type="button" wire:click="resetFilters" class="inline-flex items-center px-3 sm:px-4 py-1.5 sm:py-2 border border-gray-300 text-xs sm:text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                Reset
            </button>
        </div>
    </form>
</div>