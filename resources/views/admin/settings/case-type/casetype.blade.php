@extends('admin.layout.app')
@section('title','Case Type')
@section('content')
    <div class="">
        @component('component.modal_heading',
             [
             'page_title' => 'Case Type',
             'action'=>route("case-type.create"),
             'model_title'=>'Create Case Type',
             'modal_id'=>'#addtag',
             'permission' => $adminHasPermition->can(['case_type_add'])
             ] )
            Status
        @endcomponent
        <br><br><br>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <table id="tagDataTable" class="table" data-url="{{ route('cash.type.list') }}">
                            <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Case Type</th>
                                <th>Case Subtype</th>
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
    <script src="{{asset('assets/js/settings/case-type-datatable.js')}}"></script>
@endpush
