{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'الرئيسية')

@section('content')
    <x-hero-section />
<<<<<<< HEAD
=======
    <x-announcements-slider />
>>>>>>> 802ca6c7c538885cf52bd2da882caf0c2e0fea4a
    <x-about-section />
    <x-universities-cards-section :universities="$universities ?? []" :showViewAllButton="true" />
    {{-- <x-team-section /> --}}
    <x-contact-us-section />
@endsection