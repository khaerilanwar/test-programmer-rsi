@extends('main')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center mb-4">Detail Tugas</h1>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->todo }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Tanggal : {{ $task->tanggal }}</li>
                    <li class="list-group-item">Jam : {{ Carbon::parse($task->jam)->format('H:i') }}</li>
                    <li class="list-group-item">Status : {{ $task->status }}</li>
                </ul>
                <div class="card-body">
                    <a href="/todo" class="card-link">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
