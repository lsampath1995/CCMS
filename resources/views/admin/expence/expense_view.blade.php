@extends('admin.layout.app')
@section('title','Expense View')
@push('stylesheets')
@endpush
@section('content')
    <!-- /page content start -->
    <br><br><br><br>
    <div class="x_panel">
        <div id="content">
            <form id="add_invoice" name="add_invoice" role="form" method="POST" action="{{url('admin/add_invoice')}}"
                  autocomplete="off">
                {{ csrf_field() }}
                <div class="col-md-12">
                    <div class="row">
                        <!-- section right part start -->
                        <!-- col-md-6 start -->
                        <div class="col-md-12">
                            <div class="right-part-bg-all">
                                <div class="ctzn-usrs">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="clearfix">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <h1 class="text-center"><b>{{ $invoice_no ?? ''}} - Expense</b></h1>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="invoice-title">
                                                <h5 class="pull-right"><strong>Bill No : </strong>{{ $invoice_no ?? ''}}
                                                </h5>
                                            </div>
                                            <br><br>
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <address>
                                                        <div class="margin-top-30">
                                                            <div class="discount_text">
                                                                @php
                                                                    if($advocate_client->company_name !=''){
                                                                        $name = $advocate_client->company_name;
                                                                    }elseif($advocate_client->first_name !=''){
                                                                        $name = $advocate_client->first_name.' '.$advocate_client->last_name;
                                                                    }else{
                                                                        $name = 'N/A';
                                                                    }
                                                                @endphp
                                                                <strong>Billed From : </strong>
                                                                {{ucfirst($name)}}
                                                                <br><br>
                                                                <strong>Address
                                                                    : </strong>{{ $advocate_client->address.' ,'.$city}}
                                                                <br><br>
                                                                <strong>Mobile : </strong> {{$advocate_client->mobile}}
                                                    </address>
                                                </div>
                                                <div class="col-xs-6 text-right">
                                                    <address>
                                                        <strong>Bill Date :</strong> {{ $inv_date ?? ''}}<br><br>
                                                        <strong>Bill Due Date :</strong> {{ $due_date ?? ''}}<br>
                                                    </address>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6">
                                                </div>
                                                <div class="col-xs-6 text-right">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="panel panel-default">

                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-condensed">
                                                            <thead>

                                                            <tr>
                                                                <td class="text-center"><strong>No</strong><br><br></td>
                                                                <td class="text-left"><strong>Expense Type</strong></td>
                                                                <td class="text-left"><strong>Description</strong></td>
                                                                <td class="text-center" width="10%">
                                                                    <strong>Quantity</strong></td>
                                                                <td class="text-center" width="10%">
                                                                    <strong>Charge</strong></td>
                                                                @if($tax_type!="")
                                                                    <td class="text-center" width="10%"><strong>Tax
                                                                            (%)</strong></td>
                                                                    <td class="text-center" width="10%"><strong>Tax
                                                                            (LKR)</strong></td>
                                                                @endif
                                                                <td class="text-center" width="10%">
                                                                    <strong>Amount</strong></td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php $i=1; @endphp
                                                            @if(!empty($iteam) && count($iteam)>0)
                                                                @foreach($iteam as $key=>$value)
                                                                    <tr>
                                                                        <td class="text-center">{{$i}}</td>
                                                                        <td class="text-left">{{ $value['category'] }}</td>
                                                                        <td class="text-left">{{ $value['custom_items_name'] }}</td>
                                                                        <td class="text-center">{{ $value['custom_items_qty'] }}</td>
                                                                        <td class="text-center">{{ $value['item_rate'] }}</td>
                                                                        @if($tax_type!="")
                                                                            <td class="text-center">{{ $value['tax_id_custom'].' %' }}</td>
                                                                            <td class="text-center">{{ $value['tax'] }}</td>
                                                                        @endif
                                                                        <td class="text-center">{{$value['custom_items_amount']}}</td>
                                                                    </tr>
                                                                    @php $i++; @endphp
                                                                @endforeach
                                                            @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @php if($invoice->remarks!=''){ @endphp
                                        <div class="col-sm-7 col-md-7">
                                            <div class="contct-info">
                                                <div class="form-group">
                                                    <label class="discount_text"> Expense Note :
                                                    </label>
                                                    <p>{{$invoice->remarks ?? ''}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @php }  @endphp
                                        <div class="pull-right col-md-5 margin-right-32">
                                            <table class="table row-border dataTable no-footer" id="tab_logic_total">
                                                <tr>
                                                    <td width="75%" align="right"><b
                                                            class="font-size-expense-17">SubTotal : </b></td>
                                                    <td width="25%" align="right"><b
                                                            class="font-size-expense-17">{{$subTotal}}</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="75%" align="right"><b
                                                            class="font-size-expense-17">Tax : </b>
                                                    </td>
                                                    <td width="25%" align="right"><b
                                                            class="font-size-expense-17">{{$tax_amount}}</b></td>
                                                </tr>

                                                <tr>
                                                    <td align="right"><b class="font-size-expense-17">Total : </b></td>
                                                    <td align="right"><b
                                                            class="font-size-expense-17">{{  $total_amount }}</b></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 invoice-header" align="center"><a href="{{ url('admin/expense') }}"
                                                                        class="btn btn-primary"><i
                            class="fa fa-backward"></i>
                        &nbsp;&nbsp;Back</a>
                </div>
            </form>
        </div>
    </div>
    <!-- /page content end  -->
@endsection
@push('js')
@endpush
