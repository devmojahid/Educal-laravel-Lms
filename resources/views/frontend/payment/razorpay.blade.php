@extends('frontend.layouts.master')
@section('title', 'About Page')
@section('content')
    @include('frontend.layouts.breadcrumb', ['title' => 'About'])
    {{-- About  --}}
    @include('frontend.template-parts.about')
    @include('frontend.layouts.message')


    <h1>
        hello
    </h1>

@endsection
