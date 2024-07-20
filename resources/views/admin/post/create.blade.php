@extends('admin.master')
@section('title')
    Thêm mới
@endsection
@section('content')
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="nameInput" class="form-label">Category</label>
            </div>
            <div class="col-lg-9">
                <select name="category_id" class="form-select mb-3" aria-label="Default select example">

                    @foreach ($categories as $id => $name)
                        <option value="{{ $id }}"> {{ $name }} </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="nameInput" class="form-label">Title</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="nameInput" name="title" placeholder="Enter your title">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="websiteUrl" class="form-label">Content</label>
            </div>
            <div class="col-lg-9">
                <textarea class="form-control" id="content" name="content" rows="3"> </textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="dateInput" class="form-label">Sumary</label>
            </div>
            <div class="col-lg-9">
                <textarea class="form-control" id="sumary" name="sumary" rows="2"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="timeInput" class="form-label">Img_thumb</label>
            </div>
            <div class="col-lg-9">
                <input type="file" class="form-control" id="img_thumb" name="img_thumb">
            </div>
        </div>
        <div class="row mb-3">
            @php
                $is = [
                    'is_new' => 'primary',
                    'is_trending' => 'danger',
                    'is_popular' => 'success',
                ]
            @endphp

            @foreach ($is as $key=>$color)
            {{-- <div class="col-lg-3">
                <label for="timeInput" class="form-label"> {{$key}} </label>
            </div> --}}
           
            <div class="col-lg-9 form-switch-{{ $color }}">
                <input type="checkbox" class="form-check-input" @if ($key == 'is_new')
                    checked
                @endif id="" value="1" name="{{$key}}" >
                <label for="timeInput" class="form-label"> {{ \Str::convertCase($key, MB_CASE_TITLE) }} </label>
            </div>
           
            @endforeach
           
            
        </div>
        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="leaveemails" class="form-label">Author</label>
            </div>
            <div class="col-lg-9">
                <input type="text" name="author" id="" class="form-control">
            </div>
        </div>


        <div class="text-end">
            <button type="submit" class="btn btn-primary">Add Leave</button>
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