@extends('admin.master')
@section('title')
    Chi tiết
@endsection

@section('content')
    <form action="javascript:void(0);">
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="firstNameinput" class="form-label">ID</label>
                    <input type="text" class="form-control" value="{{ $post->id }}" id="firstNameinput">
                </div>
            </div><!--end col-->
            <div class="col-6">
                <div class="mb-3">
                    <label for="lastNameinput" class="form-label">Category</label>
                    <select name="category_id" class="form-select mb-3" disabled aria-label="Default select example">

                        @foreach ($categories as $id => $name)
                            <option @if ($post->category_id == $id) selected @endif value="{{ $id }}">
                                {{ $name }} </option>
                        @endforeach
                    </select>
                </div>
            </div><!--end col-->
            <div class="col-12">
                <div class="mb-3">
                    <label for="compnayNameinput" class="form-label">Img_thumb</label>
                    <img src="{{ \Storage::url($post->img_thumb) }}" alt="" width="70px">
                </div>
            </div><!--end col-->
            <div class="col-12">
                <div class="mb-3">
                    <label for="phonenumberInput" class="form-label">Title</label>
                    <input type="tel" class="form-control" value="{{ $post->title }}" id="phonenumberInput">
                </div>
            </div><!--end col-->
            <div class="col-12">
                <div class="mb-3">
                    <label for="emailidInput" class="form-label">Summary</label>
                    <textarea name="" id="" class="form-control" cols="20" rows="4">{{ $post->sumary }}</textarea>
                </div>
            </div><!--end col-->
            <div class="col-12">
                <div class="mb-3">
                    <label for="address1ControlTextarea" class="form-label">Content</label>
                    <textarea name="" id="" class="form-control" cols="20" rows="10">{{ $post->content }}</textarea>
                </div>
            </div><!--end col-->
            <div class="col-6">
                <div class="mb-3 d-flex">
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
            </div><!--end col-->
            
        </div><!--end row-->
    </form>

    <a href="{{ route('post.index') }}" class="btn btn-primary">Quay lại</a>
@endsection



@section('script-libs')
    <!-- apexcharts -->
    <script src="/theme/admins/velzon/assets/libs/prismjs/prism.js"></script>
@endsection
