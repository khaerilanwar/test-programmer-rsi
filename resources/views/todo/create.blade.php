@extends('main')

@dump($errors->all())

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-4 my-5">
            <h1 class="text-center mb-4">Tambah Data Tugas</h1>
            <form action="/todo" method="post">
                @csrf
                <div class="mb-3">
                    <label for="todo" class="form-label">Nama</label>
                    <input type="text" name="todo"
                        class="form-control
                        @error('todo')
                        'border-danger'
                    @enderror"
                        id="todo" placeholder="todo" value="{{ old('todo') }}">

                    @error('todo')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal"
                        class="form-control @error('tanggal')
                        'border-danger'
                    @enderror"
                        id="tanggal" placeholder="tanggal" value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jam" class="form-label">Jam</label>
                    <input type="time" name="jam"
                        class="form-control @error('jam')
                        'border-danger'
                    @enderror"
                        id="jam" placeholder="jam" value="{{ old('jam') }}">
                    @error('tanggal')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
            <a href="/todo">Kembali ke daftar tugas</a>
        </div>
    </div>
@endsection
