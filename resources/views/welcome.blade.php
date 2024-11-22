@extends('layouts.front')

@section('meta')
<meta name="description" content="about your website">
{{-- ... --}}
@endsection

@section('title')
     <title>Home Page</title>
@endsection


@section('style')
     <style>
         .hero-content {
    max-width: 100%;
    margin: 0 auto;
    padding: 0 20px;
    position: relative; /* Make sure the text can be positioned relative to the container */
    height: 100vh; /* Full viewport height */
}

.hero-image {
    height: 100%; /* Make the background image fill the entire hero container */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/world-book-day-celebration.jpg') }}');
    position: absolute; /* Position it absolutely within the hero-content */
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}

.hero-text {
    color: #ffffff; /* White text for contrast against dark background */
    text-align: center;
    position: absolute; /* Position the text inside the hero-image */
    top: 50%; /* Position the text vertically centered */
    left: 50%;
    transform: translate(-50%, -50%); /* Center text perfectly */
    width: 100%; /* Ensure the text container spans full width */
    padding: 20px;
    box-sizing: border-box; /* Ensures padding is inside the width */
}

h1 {
    font-size: 3rem;
    margin-bottom: 20px;
}

p {
    font-size: 1.2rem;
    margin-bottom: 30px;
}

button {
    background-color: #3490dc;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #2c3e50;
}

     </style>
@endsection

@section('content')
<div class="hero-content">
    <div class="hero-image"></div>
    <div class="hero-text">
        <h1>Welcome to Our Article Website</h1>
        <p>Discover a wide range of articles on various topics. From technology to lifestyle, we've got it all covered.</p>
        <p>Explore our curated content, learn something new, and engage with our community. Your journey to knowledge starts here!</p>
        <a href="{{ route('articles') }}">
            <button>Start Exploring</button>
        </a>

    </div>
</div>


@endsection


@section('script')
<script>
    //script
</script>
@endsection

