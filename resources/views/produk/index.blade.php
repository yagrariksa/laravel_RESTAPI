@extends('template')

@section('title', 'List Produk')

@section('content')
    <h1>List Produk</h1>
    <a href="{{ route('produk.create') }}" class="btn btn-success">+ Tambah produk</a>
    <div class="row my-4">
        @foreach ($produks as $produk)
            <div class="card col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                <div style="background-image: url('{{ $produk->pict ? $produk->pict : url('assets/image/nothing.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat; min-height: 200px"
                    class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $produk->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $produk->price }}</h6>
                    <div class="row px-2">

                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('produk.delete', $produk->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="mx-2 btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
