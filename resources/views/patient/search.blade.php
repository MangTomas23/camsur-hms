@extends('layouts.app')

@section('title', 'Search Results')

@section('content')

<h1 class="title is-1">Search results for "{{ $query }}"</h1>
<a href="#" class="button is-link">Back</a>
@endsection
