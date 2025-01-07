@extends('backend.app')

@section('title', 'Blog Dashboard')

@section('content')
<!--begin::Toolbar-->


<div class="toolbar" id="kt_toolbar">
    <div class="container-fluid d-flex flex-stack flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
            <!--begin::Title-->
            <h1 class="text-dark fw-bold my-1 fs-2">
                Blog Dashboard <small class="text-muted fs-6 fw-normal ms-1"></small>
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb fw-semibold fs-base my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Home</a>
                </li>

                <li class="breadcrumb-item text-muted">Blogs</li>
            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Info-->
        <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
            <!--begin::Add Blog Button-->
            <h1 class="text-dark fw-bold my-1 fs-2">
                <a href="{{ route('blog.create') }}" class="btn btn-primary">
                    Add New Blog
                </a>
            </h1>
            <!--end::Add Blog Button-->
        </div>
    </div>
</div>
<!--end::Toolbar-->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card p-5">
                <div class="card-style mb-30">
                    <div class="table-wrapper table-responsive">
                        <table class="table data-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Dynamic Data --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('blog.index') }}",
                columns: [
                    { data: 'created_at', name: 'created_at' },
                    { data: 'title', name: 'title' },    
                    { data: 'content', name: 'content' },
                    { data: 'image', name: 'image' },    
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });

    </script>
@endpush
