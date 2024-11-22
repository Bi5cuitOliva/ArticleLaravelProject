@extends('layouts.front')

@section('meta')
<meta name="title" content="Contact Us">
<meta name="description" content="Get in touch with us through our contact page.">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:site_name" content="StokeleyInc">
<meta property="og:image" content="{{ asset('images/logo.png') }}">
@endsection

@section('title')
<title>Contact Us</title>
@endsection

@section('style')
<style>
    .contact-header {
        background-image: url('{{ asset('images/technology-shopping-people-concept-modern-cute-hipster-redhead-girl-wearing-white-headphones-hol.jpg') }}');
        background-size: cover;
        background-position: center;
        position: relative;
    }
</style>
@endsection

@section('content')
<div class="contact-header h-60 flex items-center justify-center text-white text-center">
    <h1 class="text-4xl font-bold">Contact Us</h1>
</div>

<div class="container mx-auto px-6 py-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <!-- Contact Form -->
        <div class="bg-white p-6 shadow-md rounded-lg">
            <h2 class="text-2xl font-semibold mb-4">Send Us a Message</h2>
            <!-- Form to submit contact details -->
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf

                <!-- Display Success/Failure Message -->
                @if(session('success'))
                    <div class="text-green-600 mb-4">{{ session('success') }}</div>
                @elseif(session('error'))
                    <div class="text-red-600 mb-4">{{ session('error') }}</div>
                @elseif($errors->any())
                    <div class="text-red-600 mb-4">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium">Your Name</label>
                    <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200" placeholder="Enter your name" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium">Your Email</label>
                    <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200" placeholder="Enter your email" required>
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-gray-700 font-medium">Your Message</label>
                    <textarea id="message" name="message" rows="5" class="w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200" placeholder="Write your message here" required></textarea>
                </div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-md hover:bg-indigo-500 transition">
                    Send Message
                </button>
            </form>
        </div>

        <!-- Contact Information -->
        <div class="bg-gray-50 p-6 shadow-md rounded-lg">
            <h2 class="text-2xl font-semibold mb-4">Contact Information</h2>
            <p class="mb-4 text-gray-700">Feel free to reach out to us using the details below:</p>
            <div class="mb-4">
                <h3 class="text-lg font-medium text-gray-800">Address</h3>
                <p class="text-gray-600">WestPark,Nairobi,Kenya</p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-medium text-gray-800">Phone</h3>
                <p class="text-gray-600">+254 978 20 28</p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-medium text-gray-800">Email</h3>
                <p class="text-gray-600">contact@marlonjojo83@gmail.com</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // Optional JavaScript for further customizations
</script>
@endsection
