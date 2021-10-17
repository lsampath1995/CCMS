@extends('admin.layout.app')
@section('title','Court Type')
@section('content')
    <div class="">
        @component('component.modal_heading',
             [
             'page_title' => 'Court Type',
             'action'=>route("court-type.create"),
             'model_title'=>'Create Court Type',
             'modal_id'=>'#addtag',
              'permission' => $adminHasPermition->can(['court_type_add'])
             ] )
            Status
        @endcomponent
        <br><br><br>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <table id="tagDataTable" class="table" data-url="{{ route('court.type.list') }}">
                            <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Court Type</th>
                                <th width="10%" data-orderable="false">Enable | Disable</th>
                                <th width="2%" data-orderable="false" class="text-center"></th>
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
    <script src="{{asset('assets/js/settings/cort-type-datatable.js')}}"></script>
@endpush
