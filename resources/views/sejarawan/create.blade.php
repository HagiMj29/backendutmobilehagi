@extends('layouts.main')
@section('container')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Berita</h6>
        </div>
        <div class="card-body">
            <form action="{{route('sejarawan.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="name">Nama</label>
                    <input class="form-control" name="name" type="text" placeholder="Masukkan Nama">
                </div>
                <div class="mb-3">
                    <label for="birthdate">Tanggal Lahir</label>
                    <input class="form-control" name="birthdate" type="text" placeholder="Masukkan Tanggal Lahir">
                </div>
                <div class="mb-3">
                    <label for="origin">Asal</label>
                    <input class="form-control" name="origin" type="text" placeholder="Masukkan Asal">
                </div>
                <div class="mb-3">
                    <label for="sex">Jenis Kelamin</label>
                    <select class="form-select" name="sex" placeholder="Pilih Jenis Kelamin">
                        <option selected>Open this select menu</option>
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                      </select>
                </div>
                <div class="mb-3">
                    <label for="description" >Deskripsi</label>
                    <textarea class="form-control" rows="3" name="description"></textarea>
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

