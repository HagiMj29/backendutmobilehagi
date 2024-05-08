@extends('layouts.main')
@section('container')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Form</h6>
        </div>
        <div class="card-body">
            <form action="{{route('user.store')}}" method="POST">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input class="form-control"  name="name" type="text" placeholder="Masukkan Nama">
                </div>
                <div class="mb-3">
                    <label for="email">Email address</label>
                    <input class="form-control"  name="email" type="email" placeholder="Masukkan Email">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input class="form-control" name="password" type="text" placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit Data</button>
                </div>
            </form>

        </div>

    </div>

</div>
    
@endsection

