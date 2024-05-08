@extends('layouts.main')
@section('container')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Berita</h6>
        </div>
        <div class="card-body">
            <form action="{{route('budaya.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="name">Title</label>
                    <input class="form-control" name="title" type="text" placeholder="Masukkan Judul">
                </div>
                <div class="mb-3">
                    <label for="content" >Kontent</label>
                    <textarea class="form-control" rows="3" name="content"></textarea>
                  </div>
                <div class="mb-3">
                    <label for="image">Image</label>
                    <input class="form-control" type="file" name="image" placeholder="Masukkan Gambar">
                  </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit Data</button>
                </div>
            </form>

        </div>

    </div>

</div>
    
@endsection

