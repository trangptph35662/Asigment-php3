@extends('admin.master')
@section('title')
    Cập nhập
@endsection

@section('content')
    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="nameInput" class="form-label">Category</label>
            </div>
            <div class="col-lg-9">
                <select name="category_id" class="form-select mb-3" aria-label="Default select example">

                    @foreach ($categories as $id => $name)
                        <option @if ($post->category_id == $id) selected @endif value="{{ $id }}">
                            {{ $name }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="nameInput" class="form-label">Tags</label>
            </div>
            <div class="col-lg-9">
                <select name="tags[]" class="form-select mb-3" multiple aria-label="Default select example">

                    @php $productTags = $post->tags->pluck('id')->all() @endphp
                    @foreach ($tags as $id => $name)
                        <option @selected(in_array($id, $productTags)) value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="nameInput" class="form-label">Title</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="nameInput" name="title" value="{{ $post->title }}"
                    placeholder="Enter your title">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="websiteUrl" class="form-label">Content</label>
            </div>
            <div class="col-lg-9">
                <textarea class="form-control" id="content" name="content" rows="3">
                 {{ $post->content }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="dateInput" class="form-label">Sumary</label>
            </div>
            <div class="col-lg-9">
                <textarea class="form-control" id="sumary" name="sumary" rows="2">
                {{ $post->sumary }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="timeInput" class="form-label">Img_thumb</label>
            </div>
            <div class="col-lg-9">
                <input type="file" class="form-control" id="img_thumb" name="img_thumb">
                <img src="{{ \Storage::url($post->img_thumb) }}" alt="" width="70px">
            </div>
        </div>
        <div class="row mb-3">
            @php
                $is = [
                    'is_new' => 'primary',
                    'is_trending' => 'danger',
                    'is_popular' => 'success',
                ];
            @endphp

            @foreach ($is as $key => $color)
                <div class="col-lg-9 form-switch-{{ $color }}">
                    <input type="checkbox" class="form-check-input" @checked($post->$key) id=""
                        value="1" name="{{ $key }}">
                    <label for="timeInput" class="form-label"> {{ \Str::convertCase($key, MB_CASE_TITLE) }} </label>
                </div>
            @endforeach


        </div>
        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="leaveemails" class="form-label">Author</label>
            </div>
            <div class="col-lg-9">
                @auth

                    <select name="user_id" id="" disabled="disabled" class="form-select">
                        @foreach ($user as $id => $name)
                            <option @if (Auth::user()->id == $id) selected @endif value="{{ $id }}">
                                {{ $name }} </option>
                        @endforeach

                    </select>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                @endauth
            </div>
        </div>


        <div class="text-end">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('post.index') }}" class="btn">Back</a>
        </div>
    </form>
@endsection

@section('script-libs')
    <!-- apexcharts -->
    <script src="/theme/admins/velzon/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="/theme/admins/velzon/assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="/theme/admins/velzon/assets/libs/jsvectormap/maps/world-merc.js"></script>

    <!--Swiper slider js-->
    <script src="/theme/admins/velzon/assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Dashboard init -->
    <script src="/theme/admins/velzon/assets/js/pages/dashboard-ecommerce.init.js"></script>
@endsection
