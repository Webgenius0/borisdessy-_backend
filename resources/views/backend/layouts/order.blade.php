@extends('backend.app')

@section('title', 'Dashboard')
@push('style')
    <!-- select 2 start -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- select 2 end 
  -->
@endpush
@section('content')

<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <div class=" container-fluid  d-flex flex-stack flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
            <!--begin::Title-->
            <h1 class="text-dark fw-bold my-1 fs-2">
                Dashboard <small class="text-muted fs-6 fw-normal ms-1"></small>
            </h1>
            <!--end::Title-->

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb fw-semibold fs-base my-1">
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">
                        Home </a>
                </li>

                <li class="breadcrumb-item text-muted"> Order </li>

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Info-->
  
        <!--end::Info-->
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
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                
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


    $(function () {
        $('#submitCardForm').text('Add Card');
        let table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('card.orders') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'user.name', name: 'user.name' },
                { data: 'total_price', name: 'total_price' },
                { data: 'status', name: 'status' },
                
            ]
        });


        $(document).on('change', '.change-status', function () {
            let orderId = $(this).data('id');
            let newStatus = $(this).val();

            $.ajax({
                url: "{{ route('card.order.status.update') }}",
                method: 'POST',
                data: {
                    id: orderId,
                    status: newStatus,
                },
                success: function (response) {
                    if (response.status) {
                        toastr.success(response.message);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function () {
                    alert('An error occurred. Please try again!');
                },
            });
    });


    });
</script>
@endpush


