<div class="bg-white rounded-lg shadow-md p-6 border border-gray-100 hover:shadow-lg transition-shadow duration-300">
    <div class="flex items-center mb-4">
        <div class="rounded-full bg-primary bg-opacity-10 p-3 mr-4">
            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
            </svg>
        </div>
        <div>
            <h3 class="text-2xl font-bold text-gray-800">Volunteer Verification</h3>
            <p class="text-gray-600">Verify volunteer records with NIC number</p>
        </div>
    </div>
    
    <form action="{{ route('volunteer.search') }}" method="GET" class="mb-8">
        <input type="hidden" name="tab" value="verify">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input 
                type="text" 
                id="nic" 
                name="nic" 
                class="w-full pl-10 pr-20 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200"
                placeholder="Enter NIC number (e.g., 123456789V)"
                value="{{ request('nic') }}"
            >
            <button 
                type="submit" 
                class="absolute right-0 top-0 bottom-0 px-6 bg-primary hover:bg-primary-dark text-white font-medium rounded-r-lg transition duration-300 flex items-center justify-center"
            >
                Verify
            </button>
        </div>
    </form>

    <div class="border-t border-gray-100 pt-6">
        <div class="flex items-center mb-4">
            <svg class="w-5 h-5 text-primary mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
            </svg>
            <h4 class="text-lg font-semibold text-gray-800">Verification Results</h4>
        </div>
        
        @if(request()->has('nic') && request('nic') != '')
            @if(isset($volunteer) && $volunteer)
                <div class="bg-green-50 p-5 rounded-lg border-l-4 border-green-500 animate-fadeIn">
                    <div class="flex items-center mb-4">
                        <div class="rounded-full bg-green-100 p-2 mr-3">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h5 class="font-semibold text-green-800">Volunteer Found</h5>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-gray-700">
                        <p><span class="font-medium text-gray-600">Name:</span> {{ $volunteer->name }}</p>
                        <p><span class="font-medium text-gray-600">NIC:</span> {{ $volunteer->nic }}</p>
                        <p><span class="font-medium text-gray-600">Contact:</span> {{ $volunteer->phone }}</p>
                        <p><span class="font-medium text-gray-600">Email:</span> {{ $volunteer->email }}</p>
                        <p><span class="font-medium text-gray-600">Registered:</span> {{ $volunteer->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            @else
                <div class="bg-red-50 p-5 rounded-lg border-l-4 border-red-500 animate-fadeIn">
                    <div class="flex items-center">
                        <div class="rounded-full bg-red-100 p-2 mr-3">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <div>
                            <h5 class="font-semibold text-red-800">No Record Found</h5>
                            <p class="text-red-700 text-sm">No volunteer found with the provided NIC number.</p>
                        </div>
                    </div>
                </div>
            @endif
        @else
            <div class="bg-gray-50 p-5 rounded-lg border-l-4 border-gray-300">
                <div class="flex items-center">
                    <div class="rounded-full bg-gray-200 p-2 mr-3">
                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h5 class="font-semibold text-gray-700">Ready to Verify</h5>
                        <p class="text-gray-600 text-sm">Enter an NIC number above to verify volunteer status</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
