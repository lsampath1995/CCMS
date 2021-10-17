@extends('admin.layout.app')
@section('title','Vendor')
@section('content')
    <div class="">
        @component('component.heading' , [
  'page_title' => 'Vendors List',
  'action' => route('vendor.create') ,
  'text' => 'Add Vendor',
   'permission' => $adminHasPermition->can(['vendor_add'])
   ])
        @endcomponent
        <br><br><br>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <table id="Vendordatatable" class="table"
                               data-url="{{ route('vendor.list') }}">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th width="40%">Vendor Company Name</th>
                                <th width="40%">Mobile Number | Landline Number</th>
                                <th width="20%">Disable | Enable</th>
                                <th data-orderable="false"></th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('assets/js/vendor/vendor-datatable.js')}}"></script>
@endpush
