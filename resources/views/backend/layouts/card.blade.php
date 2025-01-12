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

                <li class="breadcrumb-item text-muted"> Card </li>

            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--begin::Info-->
        <div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-2">
            <!--begin::Title-->
            <h1 class="text-dark fw-bold my-1 fs-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add New Card
                </button>
            </h1>

        </div>
        <!--end::Info-->
    </div>
</div>
<!--end::Toolbar-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adding Card</h5>
                <button type="button" class="btn-close CloseModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="CardForm">
                    @csrf
                    <input type="hidden" id="hiddenInput" name="id">
                    <div class="mb-3">
                        <label for="card_name" class="form-label">Card Name</label>
                        <input type="text" class="form-control" id="card_name" aria-describedby="nameHelp" name="card_name" value="{{old('card_name')}}">

                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Card Type</label>
                        <select class="form-control CardType" name="type" >
                            <option value="">Select Card Type</option>
                            <option value="voucher">Voucher Card</option>
                            <option value="gift">Gift Card</option>
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="">Select Platform</label>
                        <select class="form-control PlatformName" name="platform_name">
                            <option value="">Select Platform</option>
                            @foreach ($platforms as $platform)
                                <option value="{{ $platform }}">{{ $platform }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Avaiable Country</label>
                
                        <select class="AvaiableCountry form-control" name="country_name[]" multiple="multiple">
                                @foreach ($countries as $countrie)
                                     <option value="{{ $countrie }}">{{ $countrie }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="AvaiableAmount">Avaiable Amount</label>
                        <select name="avaiable_amounts[]" id="AvaiableAmount" class="AvaiableAmount form-control" multiple>
                                @foreach ($all_price_values as $all_price_value)
                                     <option value="{{ $all_price_value }}">{{ $all_price_value }}</option>
                                @endforeach
                               
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" aria-describedby="price" name="price" value="{{old('price')}}" >
                    </div>

                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount</label>
                        <input type="text" class="form-control" id="discount" aria-describedby="discount" name="discount" value="{{old('discount')}}" >
                    </div>

                    <div class="mb-3">
                        <label for="seller_name" class="form-label">Seller_name</label>
                        <input type="text" class="form-control" id="seller_name" aria-describedby="seller_name" name="seller_name" value="{{old('seller_name')}}" >
                    </div>

                    <div class="mb-3">
                        <label for="usage" class="form-label">usage</label>
                        <input type="text" class="form-control" id="usage" aria-describedby="nameHelp" name="usage" value="{{old('usage')}}" >
                    </div>

                   <div class="mb-3">
                        <label for="description" class="form-label">Description</label>

                        <input name="description" id="CardDescription" class="form-control">
                   </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" class="dropify" name="image" data-default-file="" />
                    <img src="" id="imagePreview" style="display: none;" alt="Image Preview" class="img-fluid mt-2">
                </div>
                  
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary CloseModal" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitCardForm"></button>
            </div>

          
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card p-5">
                <div class="card-style mb-30">
                    <div class="table-wrapper table-responsive">
                        <table class="table data-table">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Card Name</th>
                                    <th>Platform Name</th>
                                    <th>Seller Name</th>
                                    <th>Price</th>
                                    <th>discount</th>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    let editor;

    ClassicEditor
        .create(document.querySelector('#CardDescription'), {})
        .then(newEditor => {
            editor = newEditor;
        })
        .catch(error => {
            console.error(error);
        });

    $('.AvaiableCountry').select2({
        placeholder: "Select countries"
    });

    $('.AvaiableAmount').select2({
        placeholder: "Available Amount"
    });

    $(function () {
        $('#submitCardForm').text('Add Card');
        let table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('card.index') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'card_name', name: 'card_name' },
                { data: 'platform_name', name: 'platform_name' },
                { data: 'seller_name', name: 'seller_name' },
                { data: 'price', name: 'price' },
                { data: 'discount', name: 'discount' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $(document).on('click','#submitCardForm', function (event) {
            event.preventDefault();

            let id = $('#hiddenInput').val();
            let url = '';

            if (id) {
                url = "{{ route('card.update', ':id') }}".replace(':id', id);
            } else {
                url = "{{ route('card.store') }}";
                
                $('#imagePreview').hide();
            }

            let formData = new FormData($('#CardForm')[0]);
            formData.append('description', editor.getData()); 

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status) {
                        table.draw();
                        toastr.success(response.message);
                        $('#exampleModal').modal('hide');
                        $('#CardForm').trigger('reset')
                        $('.dropify').dropify().clearElement();
                        $('#submitCardForm').text('Add Card');
                        $('.AvaiableCountry').val(null).trigger('change');
                        $('.AvaiableAmount').val(null).trigger('change');
                        $('#hiddenInput').val('');
                        editor.setData('');
                    } else {
                        toastr.error(response.message);
                        console.log(response);
                    }
                },
                error: function (xhr, status, error) {
                    toastr.error('Something went wrong!');
                }
            });
        });

        $(document).on('click', '#EditCard', function () {
            let id = $(this).data('id');
            let card_name = $(this).data('card_name');
            let type = $(this).data('type');
            let platform_name = $(this).data('platform_name');
            let cardCountries = $(this).data('acc'); // Available countries for the card
            let avaiableAamounts = $(this).data('apv'); // Available price values
            avaiableAamounts = avaiableAamounts.split(',').map(item => item.replace('[', '').replace(']', '').trim());
            let price = $(this).data('price');
            let discount = $(this).data('discount');
            let seller_name = $(this).data('seller_name');
            let usage = $(this).data('usage');
            let description = $(this).data('description');
            let image = $(this).data('image');
            let cardType = $(this).data('type');
            $('#submitCardForm').text('Update Card');

            $('#hiddenInput').val(id);
            $('#card_name').val(card_name);
            $('#platform_name').val(platform_name);
            $('#price').val(price);
            $('#discount').val(discount);
            $('#seller_name').val(seller_name);
            $('#usage').val(usage);
            editor.setData(description);

            if (image) {
                let imageUrl = `{{ asset('${image}') }}`;
                $('#image').attr('data-default-file', imageUrl);
                $('.dropify').dropify('destroy').dropify();
                $('#imagePreview').attr('src', imageUrl).show();

            }

            $('.AvaiableCountry').val(cardCountries).trigger('change');
            $('.AvaiableAmount').val(avaiableAamounts).trigger('change');
            $('.PlatformName').val(platform_name).trigger('change');
            $('.CardType').val(cardType).trigger('change');
        });

        $(document).on('click','.CloseModal', function () {
            $('#submitCardForm').text('Add Card');
            $('#CardForm').trigger('reset');
            $('#hiddenInput').val('');
            editor.setData('');
            $('#imagePreview').hide();
            $('.AvaiableCountry').val('').trigger('change');
            $('.AvaiableAmount').val('').trigger('change');
            $('.CardType').val('').trigger('change');
            
        });

        $(document).on('click', '.DeleteCard', function () {
            let id = $(this).data('id');
           

            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this card!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('card.destroy') }}",
                        type: "POST",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (response) {
                            if (response.status) {
                                toastr.success(response.message);
                                table.draw();
                            } else {
                                toastr.error(response.message);
                            }
                        },
                        error: function (xhr, status, error) {
                            toastr.error('Something went wrong!');
                        }
                    });
                }
            });
        });
    });
</script>
@endpush


