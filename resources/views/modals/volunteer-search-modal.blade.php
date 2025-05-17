<!-- Volunteer Search Modal -->
<div 
    x-data="volunteerSearchModal"
    x-show="open"
    @keydown.escape.window="open = false"
    @open-volunteer-search-modal.window="open = true"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    class="fixed inset-0 z-50 overflow-y-auto" 
    style="display: none;"
>
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="open = false">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Modal panel -->
        <div 
            @click.away="open = false"
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
        >
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-primary bg-opacity-10 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Find Volunteer ID
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500 mb-4">
                                Search for volunteer information by name or NIC number.
                            </p>
                            
                            <form @submit.prevent="searchVolunteer()" class="space-y-4">
                                <!-- Search by Name -->
                                <div>
                                    <label for="modal-search-name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input 
                                        type="text" 
                                        id="modal-search-name" 
                                        x-model="name"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                                        placeholder="Enter volunteer name"
                                    >
                                </div>
                                
                                <div class="text-center my-2">
                                    <span class="text-sm text-gray-500">OR</span>
                                </div>
                                
                                <!-- Search by NIC -->
                                <div>
                                    <label for="modal-search-nic" class="block text-sm font-medium text-gray-700">NIC Number</label>
                                    <input 
                                        type="text" 
                                        id="modal-search-nic" 
                                        x-model="nic"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                                        placeholder="Enter NIC number (e.g. 123456789V)"
                                    >
                                </div>
                                
                                <div>
                                    <button
                                        type="submit"
                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:text-sm"
                                        :disabled="searching"
                                    >
                                        <span x-show="!searching">Search</span>
                                        <span x-show="searching" class="inline-flex items-center">
                                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                            Searching...
                                        </span>
                                    </button>
                                </div>
                            </form>

                            <!-- Search Results Section -->
                            <template x-if="searchComplete">
                                <div class="mt-6">
                                    <template x-if="volunteer">
                                        <div class="bg-green-50 p-4 rounded-md border border-green-200 animate-fadeIn">
                                            <div class="flex items-center mb-3">
                                                <div class="rounded-full bg-green-100 p-1 mr-2">
                                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                </div>
                                                <h4 class="text-base font-semibold text-gray-800">Volunteer Found</h4>
                                            </div>
                                            
                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm mb-3">
                                                <div>
                                                    <p class="text-xs text-gray-600">Volunteer ID</p>
                                                    <p class="font-medium" x-text="volunteer.id"></p>
                                                </div>
                                                <div>
                                                    <p class="text-xs text-gray-600">Name</p>
                                                    <p class="font-medium" x-text="volunteer.name"></p>
                                                </div>
                                                <div>
                                                    <p class="text-xs text-gray-600">NIC Number</p>
                                                    <p class="font-medium" x-text="volunteer.nic"></p>
                                                </div>
                                                <div>
                                                    <p class="text-xs text-gray-600">Status</p>
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800" x-text="volunteer.status"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                    <template x-if="!volunteer">
                                        <div class="bg-yellow-50 p-4 rounded-md border border-yellow-200 animate-fadeIn">
                                            <div class="flex items-center">
                                                <div class="rounded-full bg-yellow-100 p-1 mr-2">
                                                    <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h4 class="text-base font-semibold text-gray-800">No Results Found</h4>
                                                    <p class="text-xs text-gray-600 mt-1">No volunteer records match your search criteria.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button 
                    type="button" 
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                    @click="open = false"
                >
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('volunteerSearchModal', () => ({
            open: false,
            volunteer: null,
            name: '',
            nic: '',
            searching: false,
            searchComplete: false,
            
            searchVolunteer() {
                if (!this.name && !this.nic) {
                    alert('Please enter a name or NIC number');
                    return;
                }
                
                this.searching = true;
                this.searchComplete = false;
                
                // Simulate API request with timeout
                setTimeout(() => {
                    // Mock volunteer data
                    if (this.name || this.nic) {
                        this.volunteer = {
                            id: 'VOL-123456',
                            name: this.name || 'John Doe',
                            nic: this.nic || '123456789V',
                            phone: '+94 77 1234567',
                            email: 'john.doe@example.com',
                            registration_date: '2025-03-17',
                            status: 'Active'
                        };
                    } else {
                        this.volunteer = null;
                    }
                    
                    this.searching = false;
                    this.searchComplete = true;
                }, 1000);
            }
        }));
    });
</script>