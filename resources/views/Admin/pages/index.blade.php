{{-- filepath: resources/views/admin/pages/index.blade.php --}}
@extends('layouts.app')
@section('content')
<h1>Daftar Page</h1>
<a href="{{ route('admin.pages.create') }}">Tambah Page</a>
@if(session('success')) <div>{{ session('success') }}</div> @endif
<table border="1">
    <tr>
        <th>Manhwa</th>
        <th>Chapter</th>
        <th>Nomor Page</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>
    @foreach($pages as $page)
    <tr>
        <td>{{ $page->chapter->manhwa->title }}</td>
        <td>{{ $page->chapter->title }}</td>
        <td>{{ $page->page_number }}</td>
        <td>
            <img src="{{ asset('storage/' . $page->image_path) }}" width="80">
        </td>
        <td>
            <a href="{{ route('admin.pages.edit', $page) }}">Edit</a>
            <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection