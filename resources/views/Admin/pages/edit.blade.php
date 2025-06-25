{{-- filepath: resources/views/admin/pages/edit.blade.php --}}
@extends('layouts.app')
@section('content')
<h1>Edit Page</h1>
<form action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <label>Chapter:
        <select name="chapter_id" required>
            @foreach($chapters as $chapter)
                <option value="{{ $chapter->id }}" {{ $page->chapter_id == $chapter->id ? 'selected' : '' }}>
                    {{ $chapter->manhwa->title }} - {{ $chapter->title }}
                </option>
            @endforeach
        </select>
    </label><br>
    <label>Nomor Page: <input type="number" name="page_number" value="{{ $page->page_number }}" required></label><br>
    <label>Gambar: <input type="file" name="image_path"></label>
    @if($page->image_path)
        <br><img src="{{ asset('storage/' . $page->image_path) }}" width="80">
    @endif
    <br>
    <button type="submit">Update</button>
</form>
@endsection