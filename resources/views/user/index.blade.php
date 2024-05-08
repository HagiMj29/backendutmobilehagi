@extends('layouts.main')
@section('container')

<div class="container-fluid">
    
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="panel-body">
            <a href="{{route('user.create')}}" class="btn btn-md btn-success mb-3">TAMBAH DATA</a>
        </div>
        <div class="table-responsive w-100">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Aksi</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($users as $data)
                        <tr>
                            <td class="text-center">{{ $no++}}</td>
                            <td class="text-center">{{ $data->name}}</td>
                            <td class="text-center">{{ $data->email}}</td>
                            <td class="text-center">
                                <a href="{{route('user.edit',['user'=>$data->id])}}" class="btn btn-warning btn-circle">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('user.destroy', ['user'=>$data->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-circle">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                
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