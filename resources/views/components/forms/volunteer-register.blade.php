<div x-data="{
    formData: {
        full_name: '',
        name_with_initials: '',
        district: '',
        home_address: '',
        dob: '',
        date: '',
        applicant_type: '',
        institution: '',
        email: '',
        telephone: '',
        whatsapp: '',
        how_know: '',
        why_join: ''
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
                    <label for="name_with_initials" class="block text-sm font-medium text-gray-700 mb-1">Name with Initials <span class="text-red-500">*</span></label>
                    <input 
                        type="text" 
                        id="name_with_initials" 
                        name="name_with_initials" 
                        x-model="formData.name_with_initials" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary" 
                        required
                    >
                    @include('components.forms.validation.input-error', ['field' => 'name_with_initials'])
                </div>
                
                <!-- District -->
                <div>
                    <label for="district" class="block text-sm font-medium text-gray-700 mb-1">District <span class="text-red-500">*</span></label>
                    <input 
                        type="text" 
                        id="district" 
                        name="district" 
                        x-model="formData.district" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary" 
                        required
                    >
                    @include('components.forms.validation.input-error', ['field' => 'district'])
                </div>
                
                <!-- Date of Birth -->
                <div>
                    <label for="dob" class="block text-sm font-medium text-gray-700 mb-1">Date of Birth <span class="text-red-500">*</span></label>
                    <input 
                        type="date" 
                        id="dob" 
                        name="dob" 
                        x-model="formData.dob" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary" 
                        required
                    >
                    @include('components.forms.validation.input-error', ['field' => 'dob'])
                </div>
                
                <!-- Date -->
                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                    <input 
                        type="date" 
                        id="date" 
                        name="date" 
                        x-model="formData.date" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary"
                    >
                    @include('components.forms.validation.input-error', ['field' => 'date'])
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
                
                <!-- Telephone -->
                <div>
                    <label for="telephone" class="block text-sm font-medium text-gray-700 mb-1">Telephone <span class="text-red-500">*</span></label>
                    <input 
                        type="tel" 
                        id="telephone" 
                        name="telephone" 
                        x-model="formData.telephone" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary" 
                        required
                    >
                    @include('components.forms.validation.input-error', ['field' => 'telephone'])
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
                    <label for="how_know" class="block text-sm font-medium text-gray-700 mb-1">How to know about Sirakukal <span class="text-red-500">*</span></label>
                    <select 
                        id="how_know" 
                        name="how_know" 
                        x-model="formData.how_know" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary"
                        required
                    >
                        <option value="">Select an option</option>
                        <option value="friends">Friends</option>
                        <option value="social_media">Social Media</option>
                        <option value="newspapers">Newspapers</option>
                        <option value="others">Others</option>
                    </select>
                    @include('components.forms.validation.input-error', ['field' => 'how_know'])
                </div>
            </div>
            
            <!-- Home Address -->
            <div class="col-span-full">
                <label for="home_address" class="block text-sm font-medium text-gray-700 mb-1">Home Address <span class="text-red-500">*</span></label>
                <textarea 
                    id="home_address" 
                    name="home_address" 
                    x-model="formData.home_address" 
                    rows="3" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary" 
                    required
                ></textarea>
                @include('components.forms.validation.input-error', ['field' => 'home_address'])
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
            
            <!-- Why Join -->
            <div class="col-span-full">
                <label for="why_join" class="block text-sm font-medium text-gray-700 mb-1">Why you like to Join Sirakukal <span class="text-red-500">*</span></label>
                <textarea 
                    id="why_join" 
                    name="why_join" 
                    x-model="formData.why_join" 
                    rows="4" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary" 
                    required
                ></textarea>
                @include('components.forms.validation.input-error', ['field' => 'why_join'])
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