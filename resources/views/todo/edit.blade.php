@extends('main')

@dump($errors->all())

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-4 my-5">
            <h1 class="text-center mb-4">Update Data Tugas</h1>
            <form action="/todo/{{ $task->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="todo" class="form-label">Nama</label>
                    <input type="text" name="todo"
                        class="form-control @error('todo')
                        'is-invalid'
                    @enderror"
                        id="todo" placeholder="todo" value="{{ old('todo', $task->todo) }}">
                    @error('todo')
                        <div class="text-error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal"
                        class="form-control @error('tanggal')
                        'is-invalid'
                    @enderror"
                        id="tanggal" placeholder="tanggal" value="{{ old('tanggal', $task->tanggal) }}">
                    @error('tanggal')
                        <div class="text-error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jam" class="form-label">Jam</label>
                    <input type="time" name="jam"
                        class="form-control @error('jam')
                        'is-invalid'
                    @enderror"
                        id="jam" placeholder="jam" value="{{ Carbon::parse(old('jam', $task->jam))->format('H:i') }}">
                    @error('tanggal')
                        <div class="text-error">
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
