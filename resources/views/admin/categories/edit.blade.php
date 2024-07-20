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
        <form action="{{route('category.update', $category)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mt-2 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}" >
            </div>
            <div class="mt-3">
                <label for="parent_id" class="form-label">Category</label>
                <select type="text" class="form-select" name="parent_id" id="parent_id">
                    <option value=""  selected>Trống</option>

                    @foreach($parentCategory as $parent)

                        @php($each = "")

                        @include('admin.categories.nested-category', ['category' => $parent])

                    @endforeach
                </select>
            </div>
            <div class="mt-2 mb-3">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{route('category.index')}}" class="btn btn-black">Trở về</a>
            </div>
        </form>
    </div>
</body>
</html>