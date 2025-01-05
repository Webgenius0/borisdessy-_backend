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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <select class="form-control" name="type" >
                            <option value="voucher">Voucher Card</option>
                            <option value="gift">Gift Card</option>
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="">Select Platform</label>
                        <select class="form-control" name="platform_id">
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
                        <select name="value[]" id="AvaiableAmount" class="AvaiableAmount form-control" multiple>
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
                    <input type="file" class="form-control dropify" id="image" aria-describedby="image" name="image" value="{{old('description')}}" >
                </div>
                  
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitCardForm">Add Card</button>
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
                                    <th>Seller Name</th>
                                    <th>Price</th>
                                    <th>image</th>
                                    <th>discount</th>
                                    
                                    <th>Actions</th>
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
            .create( document.querySelector( '#CardDescription' ), {
            } )
            .then( newEditor => {
                editor = newEditor;
            } )
            .catch( error => {
                console.error( error );
            } );
        
</script>
    <script>
   
   
        $('.AvaiableCountry').select2({
            placeholder : "Select countries"
        });
    
        $('.AvaiableAmount').select2({
            placeholder : "Avaiable Amount"
        });

        $('.SelectPlatform').select2();
    </script>

    <script>
        $(function(){
            $('#submitCardForm').on('click',function(event){
                event.preventDefault();
                
                let description = $('#CardDescription').val();
                console.log(description);

                console.log(editor.getData());
                


                let formData = new FormData($('#CardForm')[0]);
                formData.append('description', editor.getData());
                $.ajax({
                    url: "{{ route('card.store') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                       if(response.status){
                        toastr.success(response.message);
                        $('#exampleModal').modal('hide');
                       }else{
                        toastr.error(response.message);
                       }
                       
                    },
                    error: function(xhr, status, error) {
                        toastr.error('Something went wrong!');
                    }
                });
            })
        });
    </script>

    
@endpush

