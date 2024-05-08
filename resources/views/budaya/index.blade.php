@extends('layouts.main')
@section('container')

<div class="container-fluid">
    
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="panel-body">
            <a href="{{route('budaya.create')}}" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
        </div>
        <div class="table-responsive w-100">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th class="text-center">No</th>
                    <th class="text-center">Judul</th>
                    <th class="text-center">Konten</th>
                    <th class="text-center">Gambar</th>
                    <th class="text-center">Aksi</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($listbudaya as $data)
                        <tr>
                            <td class="text-center">{{ $no++}}</td>
                            <td class="text-center">{{ $data->title}}</td>
                            <td class="text-center">{{ $data->content}}</td>
                            <td class="text-center">
                                <img src="{{ asset('storage/' . $data->image) }}" alt="Gambar Berita" width="100">
                            </td>
                            <td class="text-center">
                                <a href="#" class="btn btn-warning btn-circle">
                                    <i class="fas fa-pencil-alt"></i></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection