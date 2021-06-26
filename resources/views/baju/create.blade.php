@extends('template')

@section('title', 'Create Baju')

@section('content')
    <h1>Tambah Baju</h1>

    <form class="mt-4" action="{{ route('baju.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Nama Produk Baju" value="{{ old('name') }}">
            @error('name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="number" name="price" class="form-control" placeholder="Harga Produk" value="{{ old('price') }}">
            @error('price')
            <span class="text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="form-group" >
            <label for="pict">Foto Produk</label>
            <input class="form-control-file" type="file" name="pict" id="pict">
        </div>

        <button type="submit" class="btn btn-primary">Tambahkan Produk</button>
    </form>
@endsection
