{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'الرئيسية')

@section('content')
    <x-hero-section />
    <x-announcements-slider />
    <x-about-section />
    <x-universities-cards-section :universities="$universities ?? []" :showViewAllButton="true" />
    {{-- <x-team-section /> --}}
    <x-contact-us-section />
@endsection