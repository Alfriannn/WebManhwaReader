{{-- filepath: resources/views/admin/pages/create.blade.php --}}
@extends('layouts.app')
@section('content')
<h1>Tambah Page</h1>
<form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Chapter:
        <select name="chapter_id" required>
            <option value="">--Pilih Chapter--</option>
            @foreach($chapters as $chapter)
                <option value="{{ $chapter->id }}">
                    {{ $chapter->manhwa->title }} - {{ $chapter->title }}
                </option>
            @endforeach
        </select>
    </label><br>
    <label>Nomor Page: <input type="number" name="page_number" required></label><br>
    <label>Gambar: <input type="file" name="image_path" required></label><br>
    <button type="submit">Simpan</button>
</form>
@endsection