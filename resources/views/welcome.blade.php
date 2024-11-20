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
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .hero-image {
            height: 300px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/solo-leveling-5120x2880-19518.png') }}');
        }
        .hero-text {
            color: #0f0f0f;
            text-align: center;
            padding-top: 100px;
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
        <button>Start Exploring</button>
    </div>
</div>


@endsection


@section('script')
<script>
    //script
</script>
@endsection

