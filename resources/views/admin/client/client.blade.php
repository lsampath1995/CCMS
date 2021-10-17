@extends('admin.layout.app')
@section('title','Client')
@section('content')
    <div class="">
        @component('component.heading' , [
       'page_title' => 'Clients List',
       'action' => route('clients.create') ,
       'text' => 'Add Client',
       'permission' => $adminHasPermition->can(['client_add'])
        ])
        @endcomponent
        <br><br><br>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <table id="clientDataTable" class="table" data-url="{{ route('clients.list') }}">
                            <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">Client Name</th>
                                <th width="5%">Mobile Number</th>
                                <th width="5%" data-orderable="false">Number of Cases</th>
                                <th width="5%" data-orderable="false">Enable | Disable</th>
                                <th width="5%" data-orderable="false" class="text-center"></th>
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
    <script src="{{asset('assets/js/client/client-datatable.js')}}"></script>
@endpush
