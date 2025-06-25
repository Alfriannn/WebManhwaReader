{{-- filepath: resources/views/genre/show.blade.php --}}
@extends('layouts.app')

@section('content')
<h1>Genre: {{ $genre->name }}</h1>
@foreach($genre->manhwas as $manhwa)
    <div>
        <a href="{{ route('manhwa.show', $manhwa->id) }}">{{ $manhwa->title }}</a>
    </div>
@endforeach
@endsection