@extends('template')

@section('title', 'Create Baju')

@section('content')
    <h1>Update Baju</h1>

    <form class="mt-4" action="{{ route('baju.update', $baju->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input class="form-control" type="text" name="name" placeholder="Nama Produk Baju"
                value="{{ old('name') ? old('name') : $baju->name }}">
            @error('name')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control" type="number" name="price" placeholder="Harga Produk"
                value="{{ old('price') ? old('price') : $baju->price }}">
            @error('price')
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label for="pict">Foto Produk</label>
                    <input class="form-control-file" type="file" name="pict" id="pict">
                </div>
                <div class="col">
                    <span>foto lama : </span>
                    @if ($baju->pict)
                        <img src="{{ $baju->pict }}" alt="" style="width: 200px">
                    @else
                        <span class="error">Tidak Ada Foto Lama</span>
                    @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">UPDATE Produk</button>
    </form>
@endsection
