@extends('admin.master')
@section('title')
    Thêm mới
@endsection
@section('content')
    <form action="{{ route('tags.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-lg-3">
                <label for="nameInput" class="form-label">Name</label>
            </div>
            <div class="col-lg-9">
                <input type="text" class="form-control" id="nameInput" name="name" placeholder="Enter your name">
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Add New</button>
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
