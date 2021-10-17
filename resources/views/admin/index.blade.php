@extends('admin.layout.app')
@section('title','Dashboard')
@section('content')
    @if($adminHasPermition->can(['dashboard_list']))
        <br><br><br><br>
        <link href="{{ asset('assets/admin/vendors/fullcalendar/dist/fullcalendar.min.css') }} " rel="stylesheet">
        <form method="POST" action="{{url('admin/dashboard')}}" id="case_board_form">
        {{ csrf_field() }}
        <!-- top tiles -->
            <div class="row">
                <a href="{{ route('clients.index') }}">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-users"></i></div>
                            <div class="count">{{ $client ?? '' }}</div>
                            <h3>Clients</h3>
                            <p>Total clients.</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('case-running.index') }}">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-gavel"></i></div>
                            <div class="count">{{ $case_total ?? '' }}</div>
                            <h3>Cases</h3>
                            <p>Total cases.</p>
                        </div>
                    </div>
                </a>
                <a href="{{ url('admin/case-important') }}">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-star"></i></div>
                            <div class="count">{{ $important_case ?? '' }}</div>
                            <h3>Important Cases</h3>
                            <p>Total important cases.</p>
                        </div>
                    </div>
                </a>
                <a href="{{ url('admin/case-archived') }}">
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-file-archive-o"></i></div>
                            <div class="count">{{$archived_total}}</div>
                            <h3>Archived Cases</h3>
                            <p>Total completed cases.</p>
                        </div>
                    </div>
                </a>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-university"></i>&nbsp&nbspToday Case Board</h2>
                            <div class="col-md-3 col-sm-12 col-xs-12 pull-right">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="client_case" id="client_case"
                                           class="form-control datecase" readonly=""
                                           value="{{($date!='')?date($date_format_laravel,strtotime($date)):date($date_format_laravel)}}">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @if($totalCaseCount>0)
                                @if(count($case_dashbord)>0 && !empty($case_dashbord))
                                    @foreach($case_dashbord as $court)
                                        <h4 class="title text-primary">Case Hearing Judge
                                            : {!! $court['judge_name'] !!}</h4>
                                        <table id="case_list" class="table row-border" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="20%">Registration Number</th>
                                                <th width="35%">Petitioner & Respondent</th>
                                                <th width="15%">Case Hearing Date</th>
                                                <th width="10%">Case Status</th>
                                                <th width="17%" style="text-align: center;">Select Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(!empty($court['cases']) && count($court['cases'])>0)
                                                @foreach($court['cases'] as $key=>$value)
                                                    @php
                                                        $class = ( $value->priority=='High')?'fa fa-star':(( $value->priority=='Medium')?'fa fa-star-half-o':'fa fa-star-o');
                                                    @endphp
                                                    @if($value->client_position=='Petitioner')
                                                        @php
                                                            $first = $value->first_name.' '.$value->middle_name.' '.$value->last_name;
                                                            $second = $value->party_name;
                                                        @endphp
                                                    @else
                                                        @php
                                                            $first = $value->party_name;
                                                            $second = $value->first_name.' '.$value->middle_name.' '.$value->last_name;
                                                        @endphp
                                                    @endif
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td><span
                                                                class="text-primary">{{ $value->registration_number }}</span><br/><small>{{ ($value->caseSubType!='')?$value->caseSubType:$value->caseType }}</small>
                                                        </td>
                                                        <td>
                                                            Petitioner Name &nbsp;&nbsp;&nbsp;&nbsp;: {!! $first !!}
                                                            <br/><b></b><br/>Respondent Name : {!! $second !!}
                                                        </td>
                                                        <td>@if($value->hearing_date!='')
                                                                {{date($date_format_laravel,strtotime($value->hearing_date))}}
                                                            @else
                                                                <span
                                                                    class="blink_me text-danger">Date Not Updated</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $value->case_status_name }}</td>
                                                        <td>
                                                            <ul class="padding-bottom-custom" style="list-style: none;">
                                                                @if($adminHasPermition->can(['case_edit']) =="1")
                                                                    <li style="text-align:left"><a class=""
                                                                                                   href="javascript:void(0);"
                                                                                                   onclick="nextDateAdd('{{$value->case_id}}');"><i
                                                                                class="fa fa-calendar-plus-o"></i>&nbsp;&nbsp;Add
                                                                            Next Date</a></li><br>
                                                                    <li style="text-align:left"><a class=""
                                                                                                   href="javascript:void(0);"
                                                                                                   onClick="transfer_case('{{$value->case_id}}');"><i
                                                                                class="fa fa-gavel"></i> &nbsp;&nbsp;Transfer
                                                                            Case</a></li>
                                                                @endif
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    @endforeach
                                @endif
                            @elseif($case_total>0 && count($case_dashbord)==0)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="customers-space">
                                            <p class="text-center customers-tittle"><i
                                                    class="fa fa-info-circle fa-lg"></i>&nbsp;&nbsp;Today you don't have
                                                cases to handle.</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="customers-space">
                                                <h4 class="customers-heading">Manage your cases</h4>
                                                <p class="customers-tittle">Maintain complete case details like case
                                                    history, case transfer, next hearing date etc.</p><br>
                                                <div class="cst-btn">
                                                    <div class="top-btns" style="text-align: left;">
                                                        <a class="btn btn-info"
                                                           href="{{url('admin/case-running/create')}}"><i
                                                                class="fa fa-plus"></i>&nbsp&nbspAdd Case </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-calendar-plus-o"></i>&nbsp&nbspToday Appointments</h2>
                            <div class="col-md-3 col-sm-12 col-xs-12 pull-right">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="appoint_range" id="appoint_range" class="form-control"
                                           value="{{date($date_format_laravel)}}" readonly="">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @if(count($appoint_calander)>0)
                                <table id="appointment_list" class="table row-border" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Client Name</th>
                                        <th>Appointment Date</th>
                                        <th>Appointment Time</th>
                                    </tr>
                                    </thead>
                                </table>
                            @elseif($appointmentCount>0 && count($appoint_calander)==0)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="customers-space">
                                            <p class="text-center customers-tittle"><i
                                                    class="fa fa-info-circle fa-lg"></i>&nbsp;&nbsp;Today you don't have
                                                appointments.</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="customers-space">
                                                <h4 class="customers-heading">Manage your Appointments</h4>
                                                <p class="customers-tittle">Schedule your appointment with advocates
                                                    diary and we will remind and notify as and when your appointment is
                                                    due.</p><br>
                                                <div class="cst-btn">
                                                    <div class="top-btns" style="text-align: left;">
                                                        <a class="btn btn-info"
                                                           href="{{url('admin/appointment/create')}}"><i
                                                                class="fa fa-plus"></i>&nbsp&nbspAdd
                                                            Appointment </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-calendar"></i>&nbsp&nbspAdvocate Calendar</h2><br><br>
                            <div class="col-md-3 col-sm-12 col-xs-12 pull-right">
                                <div class="input-group"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div id="calendar_dashbors_case"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="load-modal"></div>
            <!-- /top tiles -->
        </form>
        <div class="modal fade" id="modal-case-priority" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="show_modal">
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-change-court" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="show_modal_transfer"></div>
            </div>
        </div>
        <div class="modal fade" id="modal-next-date" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="show_modal_next_date"></div>
            </div>
        </div>
        <input type="hidden" name="token-value"
               id="token-value"
               value="{{csrf_token()}}">
        <input type="hidden" name="case-running"
               id="case-running"
               value="{{url('admin/case-running')}}">
        <input type="hidden" name="appointment"
               id="appointment"
               value="{{url('admin/appointment')}}">
        <input type="hidden" name="ajaxCalander"
               id="ajaxCalander"
               value="{{ url('admin/ajaxCalander') }}">
        <input type="hidden" name="date_format_datepiker"
               id="date_format_datepiker"
               value="{{$date_format_datepiker}}">
        <input type="hidden" name="dashboard_appointment_list"
               id="dashboard_appointment_list"
               value="{{ url('admin/dashboard-appointment-list') }}">
        <input type="hidden" name="getNextDateModal"
               id="getNextDateModal"
               value="{{url('admin/getNextDateModal')}}">
        <input type="hidden" name="getChangeCourtModal"
               id="getChangeCourtModal"
               value="{{url('admin/getChangeCourtModal')}}">
        <input type="hidden" name="getCaseImportantModal"
               id="getCaseImportantModal"
               value="{{url('admin/getCaseImportantModal')}}">
        <input type="hidden" name="getCourt"
               id="getCourt"
               value="{{url('getCourt')}}">
        <input type="hidden" name="downloadCaseBoard"
               id="downloadCaseBoard"
               value="{{url('admin/downloadCaseBoard')}}">
        <input type="hidden" name="printCaseBoard"
               id="printCaseBoard"
               value="{{url('admin/printCaseBoard')}}">
    @endif
@endsection
@push('js')
    <script src='https://fullcalendar.io/js/fullcalendar-3.1.0/lib/moment.min.js'></script>
    <script src="{{ asset('assets/admin/vendors/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{asset('assets/js/dashbord/dashbord-datatable.js')}}"></script>
@endpush
