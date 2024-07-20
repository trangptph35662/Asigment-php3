@extends('admin.master')
@section('title')
    Danh sách post
@endsection

@section('content')
    <!-- Striped Rows -->
    <a href="{{ route('post.create') }}" class="btn">add</a>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh sách Sản phẩm</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Danh sách Sản phẩm</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Basic Datatables</h5>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th data-ordering="false">ID</th>
                                <th data-ordering="false"> User</th>
                                <th data-ordering="false">Category</th>
                                <th data-ordering="false">Img_thumb</th>
                                <th>Title </th>
                                <th>Sumary </th>
                                <th>Author </th>
                                <th>Is_new</th>
                                <th>is_trending</th>
                                <th>is_popular</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>

                                    <td>{{ $item->id }}</td>

                                    <td> {{ $item->user->name ?? 'No' }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td> <img src="{{ \Storage::url($item->img_thumb) }}" alt="" width="70px">
                                    </td>
                                    <td>{{ $item->title }}</td>
                                    <td> {{ $item->sumary }}</td>
                                    <td> {{ $item->author }}</td>
                                    <td>{!! $item->is_new ? '<span class="badge bg-primary">YES</span>' : '<span class="badge bg-danger">NO</span>' !!}</td>
                                    <td>{!! $item->is_trending ? '<span class="badge bg-primary">YES</span>' : '<span class="badge bg-danger">NO</span>' !!}</td>
                                    <td>{!! $item->is_popular ? '<span class="badge bg-primary">YES</span>' : '<span class="badge bg-danger">NO</span>' !!}</td>

                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="{{ route('post.show', $item->id) }}" class="dropdown-item"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                                </li>
                                                <li><a href="{{ route('post.edit', $item->id) }}"
                                                        class="dropdown-item edit-item-btn"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Edit</a></li>
                                                <li>
                                                    <a class="dropdown-item remove-item-btn">
                                                        <form action="{{ route('post.destroy', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('Bạn chắc chắn xoá?')"
                                                                type="submit" class="btn"> <i
                                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                Delete</button>
                                                        </form>

                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--end col-->
    </div>
@endsection

@section('style-libs')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"/>

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection

@section('script-libs')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script>
        new DataTable("#example", {
            order: [
                [0, 'desc']
            ]
        });
    </script>
@endsection
