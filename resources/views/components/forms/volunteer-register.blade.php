<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 md:p-8">
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('volunteers.store') }}" method="POST">
        @csrf
        
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Volunteer Registration Form</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Full Name -->
            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                @error('full_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            
            <!-- Name with Initials -->
            <div>
                <label for="initials_name" class="block text-sm font-medium text-gray-700 mb-1">Name with Initials *</label>
                <input type="text" id="initials_name" name="initials_name" value="{{ old('initials_name') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                @error('initials_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            
            <!-- District -->
            <div>
                <label for="district" class="block text-sm font-medium text-gray-700 mb-1">District *</label>
                <select id="district" name="district" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                    <option value="">Select District</option>
                    @foreach($districts as $district)
                        <option value="{{ $district }}" @selected(old('district') == $district)>{{ $district }}</option>
                    @endforeach
                </select>
                @error('district') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            
            <!-- NIC Number -->
            <div>
                <label for="nic_number" class="block text-sm font-medium text-gray-700 mb-1">NIC Number *</label>
                <input type="text" id="nic_number" name="nic_number" value="{{ old('nic_number') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md" placeholder="123456789V or 200012345678" required>
                @error('nic_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Date of Birth -->
            <div>
                <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-1">Date of Birth *</label>
                <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                @error('date_of_birth') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            
            <!-- Joined Date -->
            {{-- <div>
                <label for="joined_date" class="block text-sm font-medium text-gray-700 mb-1">Joined Date</label>
                <input type="date" id="joined_date" name="joined_date" value="{{ old('joined_date') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div> --}}
            
            <!-- Applicant Type -->
            <div>
                <label for="applicant_type" class="block text-sm font-medium text-gray-700 mb-1">Education Level *</label>
                <select id="applicant_type" name="applicant_type" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                    <option value="">Select Education Level</option>
                    @foreach($educationLevels as $level)
                        <option value="{{ $level }}" @selected(old('applicant_type') == $level)>{{ $level }}</option>
                    @endforeach
                </select>
                @error('applicant_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            
            <!-- Current Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Current Status *</label>
                <select id="status" name="status" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                    <option value="">Select Status</option>
                    @foreach($statuses as $status)
                        <option value="{{ $status }}" @selected(old('status') == $status)>{{ $status }}</option>
                    @endforeach
                </select>
                @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            
            <!-- Phone -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone *</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            
            <!-- WhatsApp -->
            <div>
                <label for="whatsapp" class="block text-sm font-medium text-gray-700 mb-1">WhatsApp No</label>
                <input type="tel" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-md">
            </div>
            
            <!-- How did you know about Sirakukal -->
            <div>
                <label for="referred_by" class="block text-sm font-medium text-gray-700 mb-1">How did you hear about us *</label>
                <select id="referred_by" name="referred_by" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                    <option value="">Select Source</option>
                    @foreach($heardSources as $source)
                        <option value="{{ $source }}" @selected(old('referred_by') == $source)>{{ $source }}</option>
                    @endforeach
                </select>
                @error('referred_by') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>
        
        <!-- Address -->
        <div class="mt-6">
            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Home Address *</label>
            <textarea id="address" name="address" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>{{ old('address') }}</textarea>
            @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        
        <!-- Institution -->
        <div class="mt-6">
            <label for="institution" class="block text-sm font-medium text-gray-700 mb-1">Institution/School/Workplace *</label>
            <input type="text" id="institution" name="institution" value="{{ old('institution') }}" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
            @error('institution') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        
        <!-- Why Join Sirakukal -->
        <div class="mt-6">
            <label for="reason_to_join" class="block text-sm font-medium text-gray-700 mb-1">Why do you want to join? *</label>
            <textarea id="reason_to_join" name="reason_to_join" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>{{ old('reason_to_join') }}</textarea>
            @error('reason_to_join') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        
        <div class="mt-8">
            <button type="submit" class="w-full px-6 py-3 bg-red-600 text-white rounded-md hover:bg-red-700">
                Submit Registration
            </button>
        </div>
    </form>
</div>