<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
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
                <td> {{$item->id}} </td>
                <td> {{$item->name}} </td>
                <td>{{ $item->parent?->name }}</td>
                <td>
                    <a href="{{route('category.edit', $item->id)}}" class="btn btn-primary"> Sửa </a>
                    <a href="{{route('category.create')}}" class="btn btn-primary"> Thêm </a>
                    <a> 
                        <form action="{{route('category.destroy', $item->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Chắc chắn xoá')" type="submit" class="btn btn-danger"> Xóa </button>
                        </form>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
       </table>
    </div>
</body>
</html>