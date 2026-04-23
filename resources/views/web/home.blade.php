@extends('web.layouts.app')

@section('content')
    @include('web.home.sections.services-bento')
    @include('web.home.sections.stats')
    @include('web.home.sections.services')
    @include('web.home.sections.projects')
    @include('web.home.sections.contact-cta')
@endsection
