@extends('main')

@section('content')
    <div class="row">
        <h1 class="text-center mb-4">Data Tugas</h1>
        <div class="col-md-8 offset-md-2">
            <a href="/todo/create" class="btn btn-primary">Tambah Data</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tugas</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $task->todo }}</td>
                            <td>{{ $task->tanggal }}</td>
                            <td>{{ $task->jam }}</td>
                            <td>
                                @if ($task->status == 'belum')
                                    <span class="badge rounded-pill text-bg-danger">{{ $task->status }}</span>
                                @elseif ($task->status == 'sedang')
                                    <span class="badge rounded-pill text-bg-warning">{{ $task->status }}</span>
                                @elseif ($task->status == 'sudah')
                                    <span class="badge rounded-pill text-bg-success">{{ $task->status }}</span>
                                @endif
                            </td>
                            <td class="d-flex gap-2">
                                <a href="/todo/{{ $task->id }}" class="btn btn-primary">Detail</a>
                                <a href="/todo/{{ $task->id }}/edit" class="btn btn-warning">Update</a>
                                <form action="/todo/{{ $task->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
