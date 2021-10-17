@extends('admin.layout.app')
@section('title','Service')
@section('content')
    <div class="">
        @component('component.modal_heading',
             [
             'page_title' => 'Services',
             'action'=>route("service.create"),
             'model_title'=>'Create Service',
             'modal_id'=>'#addtag',
             'permission' => $adminHasPermition->can(['service_add'])
             ] )
            Service
        @endcomponent
        <br><br><br>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <table id="serviceDataTable" class="table" data-url="{{ route('service.list') }}">
                            <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Service Name</th>
                                <th>Service Charge (LKR)</th>
                                <th width="5%" data-orderable="false">Status</th>
                                <th width="2%" data-orderable="false">Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="load-modal"></div>
@endsection
@push('js')
    <script src="{{asset('assets/js/service/service-datatable.js')}}"></script>
@endpush
