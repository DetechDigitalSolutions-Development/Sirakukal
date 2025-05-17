@extends('layouts.app')

@section('title', 'Volunteer Portal - Sirakukal')


@section('content')
@include('components.cms.volunteer')
    <!-- Page Header -->
    <!-- <div class="bg-gray-100 py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800">Volunteer Portal</h1>
            <div class="flex items-center text-sm text-gray-500 mt-2">
                <a href="/" class="hover:text-blue-600">Home</a>
                <span class="mx-2">/</span>
                <span>Volunteer Portal</span>
            </div>
        </div>
    </div> -->
    
    <!-- Main Section -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <!-- Success Message -->
            @include('components.forms.validation.success-message')
            
            <!-- Introduction -->
            <div class="max-w-4xl mx-auto mb-8 text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Welcome to the Volunteer Portal</h2>
                <p class="text-gray-600">Register as a new volunteer or verify your existing volunteer status with your NIC number.</p>
            </div>
            
            <!-- Tabs -->
            <div class="max-w-5xl mx-auto">
                <div x-data="{ activeTab: '{{ $activeTab ?? 'register' }}' }" class="mb-12">
                    <!-- Tab Navigation -->
                    <div class="flex border-b border-gray-200 mb-8">
                        <button 
                            @click="activeTab = 'register'" 
                            :class="{ 'border-b-2 border-primary text-primary': activeTab === 'register', 'text-gray-500 hover:text-gray-700': activeTab !== 'register' }"
                            class="py-4 px-6 font-medium focus:outline-none transition-colors duration-200"
                        >
                            Register as Volunteer
                        </button>
                        <button 
                            @click="activeTab = 'verify'" 
                            :class="{ 'border-b-2 border-primary text-primary': activeTab === 'verify', 'text-gray-500 hover:text-gray-700': activeTab !== 'verify' }"
                            class="py-4 px-6 font-medium focus:outline-none transition-colors duration-200"
                        >
                            Verify Volunteer Status
                        </button>
                    </div>
                    
                    <!-- Tab Content -->
                    <div x-show="activeTab === 'register'" class="animate-fadeIn">
                        <div class="max-w-4xl mx-auto">
                            <div class="text-center mb-8">
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Join Our Volunteer Team</h3>
                                <p class="text-gray-600">Complete the registration form below to start your journey with Sirakukal.</p>
                            </div>
                            @include('components.forms.volunteer-register')
                        </div>
                    </div>
                    
                    <div x-show="activeTab === 'verify'" class="animate-fadeIn" style="display: none;">
                        <div class="max-w-3xl mx-auto">
                            <div class="text-center mb-8">
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Verify Your Volunteer Status</h3>
                                <p class="text-gray-600">Enter your NIC number to verify your volunteer status and view your details.</p>
                            </div>
                            @include('components.forms.volunteer-search')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    // Add fadeIn animation class if not already defined
    if (!document.querySelector('style#alpine-animations')) {
        const style = document.createElement('style');
        style.id = 'alpine-animations';
        style.textContent = `
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fadeIn {
                animation: fadeIn 0.3s ease-out forwards;
            }
        `;
        document.head.appendChild(style);
    }
    </script>
@endsection
