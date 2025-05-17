@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="bg-gray-50 py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl font-bold mb-4">About Sirakukal</h1>
                <p class="text-xl text-gray-600">Learn more about our organization, mission and impact</p>
            </div>
        </div>
    </section>

    {{-- Main About Section --}}
    <section class="py-16 bg-white">
        @include('components.cms.about', [
            'subtitle' => 'Our Story',
            'title' => 'Who We Are',
            'button_text' => 'Contact Us',
            'button_link' => route('contact'),
            'content' => '<p class="mb-4">Sirakukal is a volunteer-driven organization dedicated to creating positive change in communities through organized initiatives, education, and sustainable development projects.</p>
            <p class="mb-4">Founded with the belief that collective action can transform communities, we mobilize resources and volunteers to address pressing social challenges and create lasting impact.</p>
            <p>Our approach combines grassroots engagement with strategic planning to ensure that our initiatives are both effective and sustainable.</p>'
        ])
    </section>

    {{-- Our Values Section --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-sm font-bold text-primary uppercase tracking-wider mb-2">Core Principles</h2>
                <h3 class="text-3xl font-bold">Our Values</h3>
                <div class="h-1 w-20 bg-primary rounded mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="bg-primary/10 p-4 rounded-full inline-flex mb-4">
                        <svg class="w-8 h-8 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Community First</h4>
                    <p class="text-gray-600">We prioritize the needs and voices of the communities we serve, ensuring our work is relevant and impactful.</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="bg-primary/10 p-4 rounded-full inline-flex mb-4">
                        <svg class="w-8 h-8 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Integrity</h4>
                    <p class="text-gray-600">We operate with honesty and transparency, building trust through ethical practices and accountability.</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="bg-primary/10 p-4 rounded-full inline-flex mb-4">
                        <svg class="w-8 h-8 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Innovation</h4>
                    <p class="text-gray-600">We embrace creativity and fresh perspectives to develop new solutions for complex challenges.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-sm font-bold text-primary uppercase tracking-wider mb-2">The People Behind Our Work</h2>
                <h3 class="text-3xl font-bold">Our Team</h3>
                <div class="h-1 w-20 bg-primary rounded mx-auto mt-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="bg-gray-50 rounded-lg overflow-hidden">
                    <img src="{{ asset('images/team-1.jpg') }}" alt="Team Member" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h4 class="font-bold text-lg">Jane Doe</h4>
                        <p class="text-primary">Executive Director</p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg overflow-hidden">
                    <img src="{{ asset('images/team-2.jpg') }}" alt="Team Member" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h4 class="font-bold text-lg">John Smith</h4>
                        <p class="text-primary">Programs Manager</p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg overflow-hidden">
                    <img src="{{ asset('images/team-3.jpg') }}" alt="Team Member" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h4 class="font-bold text-lg">Emily Johnson</h4>
                        <p class="text-primary">Volunteer Coordinator</p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg overflow-hidden">
                    <img src="{{ asset('images/team-4.jpg') }}" alt="Team Member" class="w-full h-64 object-cover">
                    <div class="p-4">
                        <h4 class="font-bold text-lg">Michael Brown</h4>
                        <p class="text-primary">Community Liaison</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{-- Volunteer CTA Section --}}
    <section class="py-16 bg-primary text-white text-center">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4">Join Our Community</h2>
            <p class="text-xl max-w-2xl mx-auto mb-8">Become a volunteer today and be part of our mission to create positive change.</p>
            <a href="{{ route('volunteers.volunteer') }}" class="inline-flex items-center px-6 py-3 bg-white text-primary hover:bg-gray-100 font-medium rounded-lg transition duration-300">
                Become a Volunteer
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </section>
@endsection
