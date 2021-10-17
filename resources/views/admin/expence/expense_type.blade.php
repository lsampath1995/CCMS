@extends('admin.layout.app')
@section('title','Expense Type')
@section('content')
    <div class="">
        @component('component.modal_heading',
             [
             'page_title' => 'Expense Type',
             'action'=>route("expense-type.create"),
             'model_title'=>'Create Expense Type',
             'modal_id'=>'#addtag',
             'permission' => $adminHasPermition->can(['expense_type_add'])
             ] )
            Status
        @endcomponent
        <br><br><br>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <table id="tagDataTable" class="table" data-url="{{ route('expense.type.list') }}">
                            <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Expense Type</th>
                                <th width="10%" data-orderable="false">Disable | Enable</th>
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
    <script src="{{asset('assets/js/expense/expense-type-datatable.js')}}"></script>
@endpush
