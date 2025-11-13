<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', session('locale',config('app.locale'))) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="" />
    <link rel="icon" href="{{asset('assets/images/favicon.webp')}}">
    <title>{{ $seo_title }}</title>
    <meta name="description" content="{{ $seo_description }}">
    <meta name="robots" content="index,follow">
    <meta name="owner" content="More Academy" />
    <meta name="author" content="More Academy" />
    <meta property="og:title" content="{{ $seo_title }}" />
    <meta property="og:description" content="{{ $seo_description }}" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="{{url("/") }}" />
    <meta property="og:type" content="website" />

    <!-- Google Fonts performans optimizasyonu -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />


    <link rel="preload" href="{{asset('assets_web_new/css/fontawesome.min.css')}}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="{{ asset('assets_web_new/css/fontawesome.min.css') }}"></noscript>


    <script>
        let baseURL = '{{ url("/") }}/';
        let settings = {!! $settings !!};
        let seoDetail = {
            title: '{{ $seo_title }}',
            description: '{{ $seo_description }}',
        }
    </script>
</head>
<body class="font-inter scrollbar hyphens-auto" >

<div id="app">
    <app-component></app-component>
</div>

@vite('resources/js/app.js')

</body>
</html>
