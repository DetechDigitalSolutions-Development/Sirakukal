<div x-data="{
    formData: {
        full_name: '',
        initials_name: '',
        district: '',
        address: '',
        nic_number: '',
        date_of_birth: '',
        joined_date: '',
        status: 'pending',
        institution: '',
        email: '',
        phone: '',
        whatsapp: '',
        referred_by: '',
        reason_to_join: '',
        joined: 'no'
    },
    
    districts: [
        'Thirukonamalai',
        'Mattakalappu',
        'Amparai',
        'Nuwara Eliya',
        'Mullaitivu',
        'Vavuniya',
        'Kilinochchi',
        'Yarlpannam',
        'Mannar',
        'Kandy',
        'Matale',
        'Puttalam',
        'Badulla',
        'Kegalle',
        'Colombo',
        'Gampaha',
        'Kalutara',
        'Kurunegala',
        'Ratnapura',
        'Polonnaruwa',
        'Anuradhapura',
        'Monaragala',
        'Hambantota',
        'Matara',
        'Galle'
    ],
    
    districtSearch: '',
    showDropdown: false,
    
    filteredDistricts() {
        if (!this.districtSearch) return this.districts;
        return this.districts.filter(district => 
            district.toLowerCase().includes(this.districtSearch.toLowerCase())
        );
    },
    
    selectDistrict(district) {
        this.formData.district = district;
        this.districtSearch = district;
        this.showDropdown = false;
    },
    
    submit() {
        // Submit the form
        document.getElementById('volunteer-form').submit();
    }
}" class="max-w-4xl mx-auto">
    <form id="volunteer-form" action="{{ route('volunteers.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6 md:p-8">
        @csrf
        
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Volunteer Registration Form</h2>
        
        <div class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Full Name -->
                <div>
                    <label for="full_name" class="block text-sm font-medium text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                    <input 
                        type="text" 
                        id="full_name" 
                        name="full_name" 
                        x-model="formData.full_name" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary" 
                        required
                    >
                    @include('components.forms.validation.input-error', ['field' => 'full_name'])
                </div>
                
                <!-- Name with Initials -->
                <div>
                    <label for="initials_name" class="block text-sm font-medium text-gray-700 mb-1">Name with Initials <span class="text-red-500">*</span></label>
                    <input 
                        type="text" 
                        id="initials_name" 
                        name="initials_name" 
                        x-model="formData.initials_name" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary" 
                        required
                    >
                    @include('components.forms.validation.input-error', ['field' => 'initials_name'])
                </div>
                
                <!-- District -->
                <div>
                    <label for="district" class="block text-sm font-medium text-gray-700 mb-1">District <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input 
                            type="text" 
                            id="district" 
                            name="district" 
                            x-model="formData.district" 
                            x-model:display="districtSearch"
                            @focus="showDropdown = true" 
                            @click.outside="showDropdown = false"
                            @input="showDropdown = true"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary" 
                            placeholder="Type to search districts"
                            autocomplete="off"
                            required
                        >
                        <div 
                            x-show="showDropdown" 
                            x-transition 
                            class="absolute z-10 w-full mt-1 bg-white shadow-lg rounded-md border border-gray-300 max-h-60 overflow-y-auto"
                        >
                            <template x-for="district in filteredDistricts()" :key="district">
                                <div 
                                    @click="selectDistrict(district)" 
                                    class="px-4 py-2 hover:bg-gray-100 cursor-pointer" 
                                    :class="{'bg-gray-100': formData.district === district}"
                                    x-text="district"
                                ></div>
                            </template>
                            <div 
                                x-show="filteredDistricts().length === 0" 
                                class="px-4 py-2 text-gray-500 italic"
                            >
                                No matching districts
                            </div>
                        </div>
                    </div>
                    @include('components.forms.validation.input-error', ['field' => 'district'])
                </div>
                
                <!-- NIC Number -->
                <div>
                    <label for="nic_number" class="block text-sm font-medium text-gray-700 mb-1">NIC Number <span class="text-red-500">*</span></label>
                    <input 
                        type="text" 
                        id="nic_number" 
                        name="nic_number" 
                        x-model="formData.nic_number" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary" 
                        placeholder="123456789V or 200012345678" 
                        required
                    >
                    @include('components.forms.validation.input-error', ['field' => 'nic_number'])
                </div>

                <!-- Date of Birth -->
                <div>
                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700 mb-1">Date of Birth <span class="text-red-500">*</span></label>
                    <input 
                        type="date" 
                        id="date_of_birth" 
                        name="date_of_birth" 
                        x-model="formData.date_of_birth" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary" 
                        required
                    >
                    @include('components.forms.validation.input-error', ['field' => 'date_of_birth'])
                </div>
                
                <!-- Joined Date -->
                <div>
                    <label for="joined_date" class="block text-sm font-medium text-gray-700 mb-1">Joined Date</label>
                    <input 
                        type="date" 
                        id="joined_date" 
                        name="joined_date" 
                        x-model="formData.joined_date" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary"
                    >
                    @include('components.forms.validation.input-error', ['field' => 'joined_date'])
                </div>
                
                <!-- Applicant Type -->
                <div>
                    <label for="applicant_type" class="block text-sm font-medium text-gray-700 mb-1">Are you? <span class="text-red-500">*</span></label>
                    <select 
                        id="applicant_type" 
                        name="applicant_type" 
                        x-model="formData.applicant_type" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary"
                        required
                    >
                        <option value="">Select an option</option>
                        <option value="school_leaver">School Leaver</option>
                        <option value="undergraduate">Undergraduate</option>
                        <option value="graduate">Graduate</option>
                        <option value="professional">Professional</option>
                        <option value="entrepreneur">Entrepreneur</option>
                    </select>
                    @include('components.forms.validation.input-error', ['field' => 'applicant_type'])
                </div>
                
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-Mail <span class="text-red-500">*</span></label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        x-model="formData.email" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary" 
                        required
                    >
                    @include('components.forms.validation.input-error', ['field' => 'email'])
                </div>
                
                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone <span class="text-red-500">*</span></label>
                    <input 
                        type="tel" 
                        id="phone" 
                        name="phone" 
                        x-model="formData.phone" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary" 
                        required
                    >
                    @include('components.forms.validation.input-error', ['field' => 'phone'])
                </div>
                
                <!-- WhatsApp -->
                <div>
                    <label for="whatsapp" class="block text-sm font-medium text-gray-700 mb-1">WhatsApp No</label>
                    <input 
                        type="tel" 
                        id="whatsapp" 
                        name="whatsapp" 
                        x-model="formData.whatsapp" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary"
                    >
                    @include('components.forms.validation.input-error', ['field' => 'whatsapp'])
                </div>
                
                <!-- How did you know about Sirakukal -->
                <div>
                    <label for="referred_by" class="block text-sm font-medium text-gray-700 mb-1">How did you hear about Sirakukal <span class="text-red-500">*</span></label>
                    <select 
                        id="referred_by" 
                        name="referred_by" 
                        x-model="formData.referred_by" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary"
                        required
                    >
                        <option value="">Select an option</option>
                        <option value="social_media">Social Media</option>
                        <option value="friends">Friends</option>
                        <option value="newspaper">Newspaper</option>
                        <option value="university">University</option>
                        <option value="other">Other</option>
                    </select>
                    @include('components.forms.validation.input-error', ['field' => 'referred_by'])
                </div>
            </div>
            
            <!-- Address -->
            <div class="col-span-full">
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Home Address <span class="text-red-500">*</span></label>
                <textarea 
                    id="address" 
                    name="address" 
                    x-model="formData.address" 
                    rows="3" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary" 
                    required
                ></textarea>
                @include('components.forms.validation.input-error', ['field' => 'address'])
            </div>
            
            <!-- Institution -->
            <div class="col-span-full">
                <label for="institution" class="block text-sm font-medium text-gray-700 mb-1">Your Working / Studying, Place/ Institution/ Leaving School <span class="text-red-500">*</span></label>
                <input 
                    type="text" 
                    id="institution" 
                    name="institution" 
                    x-model="formData.institution" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary" 
                    required
                >
                @include('components.forms.validation.input-error', ['field' => 'institution'])
            </div>
            
            <!-- Why Join Sirakukal textarea -->
            <div class="col-span-full">
                <label for="reason_to_join" class="block text-sm font-medium text-gray-700 mb-1">Why do you want to join Sirakukal? <span class="text-red-500">*</span></label>
                <textarea 
                    id="reason_to_join" 
                    name="reason_to_join" 
                    x-model="formData.reason_to_join" 
                    rows="4" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary" 
                    required
                ></textarea>
                @include('components.forms.validation.input-error', ['field' => 'reason_to_join'])
            </div>
            
            <div class="mt-8">
                <button 
                    type="submit" 
                    @click="submit()" 
                    class="w-full px-6 py-3 bg-primary text-white rounded-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition duration-300"
                >
                    <svg class="inline mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    Submit Registration
                </button>
            </div>
        </div>
    </form>
</div>