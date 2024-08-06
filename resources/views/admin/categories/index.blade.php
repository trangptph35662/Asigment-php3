@extends('admin.master')

@section('title')
    Danh sách category
@endsection
@section('content')
    <a href="{{ route('category.create') }}" class="btn btn-primary"> Thêm </a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th>Parent</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td> {{ $item->id }} </td>
                    <td> {{ $item->name }} </td>
                    <td>{{ $item->parent?->name }}</td>
                    <td>
                        <div class="d-flex ">
                            <a href="{{ route('category.edit', $item->id) }}" class="btn btn-primary me-1"> Sửa </a>

                            <a>
                                <form action="{{ route('category.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Chắc chắn xoá')" type="submit" class="btn btn-danger">
                                        Xóa </button>
                                </form>
                            </a>
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
