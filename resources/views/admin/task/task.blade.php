@extends('admin.layout.app')
@section('title','Tasks')
@section('content')
    <div class="">
        @component('component.heading' , [
       'page_title' => 'Tasks List',
       'action' => route('tasks.create') ,
       'text' => 'Add Task',
       'permission' => $adminHasPermition->can(['task_add'])
        ])
        @endcomponent
        <div class="clearfix"></div>
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <table id="clientDataTable" class="table" data-url="{{ route('task.list') }}">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Task Name</th>
                                <th>Related To</th>
                                <th>Start Date</th>
                                <th>Deadline</th>
                                <th>Members</th>
                                <th>Status</th>
                                <th>Priority</th>
                                <th data-orderable="false" class="text-center"></th>
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
    <script src="{{asset('assets/js/task/task-datatable.js')}}"></script>
@endpush
