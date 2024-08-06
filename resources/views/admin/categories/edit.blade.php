@extends('admin.master')
@section('title')
    Cập nhập cate
@endsection
<div class="container">
    <form action="{{ route('category.update', $category) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mt-2 mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
        </div>
        <div class="mt-3">
            <label for="parent_id" class="form-label">Category</label>
            <select type="text" class="form-select" name="parent_id" id="parent_id">
                <option value="" selected>Trống</option>

                @foreach ($parentCategory as $parent)
                    @php($each = '')

                    @include('admin.categories.nested-category', ['category' => $parent])
                @endforeach
            </select>
        </div>
        <div class="mt-2 mb-3">
            <button type="submit" class="btn btn-info">Submit</button>
            <a href="{{ route('category.index') }}" class="btn btn-black">Trở về</a>
        </div>
    </form>
</div>
