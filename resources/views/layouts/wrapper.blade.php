<?php
@extends('layouts.app')
@section('wrapper')
    @include('layouts.header')
    <main>
        {{ $slot }}
    </main>
    @include('layouts.footer')
@endsection
