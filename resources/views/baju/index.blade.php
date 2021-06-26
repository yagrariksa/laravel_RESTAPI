@extends('template')

@section('title', 'List Baju')

@section('content')
    <h1>List Baju</h1>
    <a href="{{ route('baju.create') }}" class="btn btn-success">+ Tambah baju</a>
    <div class="card-deck my-4">
        @foreach ($bajus as $baju)
            <div class="card col-sm-12 col-md-6 col-lg-4 col-xl-3 my-2">
                <div style="background-image: url('{{ $baju->pict ? $baju->pict : url('assets/image/nothing.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat; min-height: 200px"
                    class="card-img-top" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $baju->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $baju->price }}</h6>
                    <div class="row px-2">

                        <a href="{{ route('baju.edit', $baju->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('baju.delete', $baju->id) }}" method="POST">
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
