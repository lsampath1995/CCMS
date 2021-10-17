@extends('admin.layout.app')
@section('title','Invoice Setting')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Invoice Settings</h3>
        </div>
        <div class="title_right">
            <div class="form-group pull-right top_search">
            </div>
        </div>
    </div>
    <form id="invoice_setting" name="invoice_setting" role="form" method="POST"
          action="{{route('invoice-setting.store')}}" enctype="multipart/form-data" autocomplete="off">
        @csrf()
        <div class="title_right">
            <div class="form-group pull-right top_search">
                <a href="{{url('admin/dashboard')}}" class="btn btn-primary"><i class="fa fa-backward"></i>
                    &nbsp;&nbsp;Back</a>
            </div>
        </div>
        <br><br><br>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        @include('admin.settings.setting-header')
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group"><br>
                                <label for="invoice_prefex">Invoice Prefix </label>
                                <input type="text" placeholder="enter prefix for invoice number" class="form-control"
                                       id="invoice_prefex"
                                       name="invoice_prefex" value="{{!empty($setting->prefix)?$setting->prefix:''}}">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group"><br>
                                <label for="invoice_number">Next Invoice Number (Auto Generated)</label>
                                <input type="text" placeholder="" class="form-control" id="last_number" readonly=""
                                       name="last_number" value="{{ ($setting->invoice_no + 1 )}}">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group"><br>
                                <label for="fullname">Invoice Number Format</label><br>
                                <input type="radio" id="test3" name="forment"
                                       value="1" {{(!empty($setting) && $setting->invoice_formet=='1')?'checked':''}} {{empty($setting)?'checked':''}}>
                                &nbsp;&nbsp;Number Based (00001)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="test4" name="forment"
                                       value="2" {{(!empty($setting) && $setting->invoice_formet=='2')?'checked':''}}>&nbsp;&nbsp;Year
                                Based (YYYY/00001)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="test5" name="forment"
                                       value="3" {{(!empty($setting) && $setting->invoice_formet=='3')?'checked':''}}>&nbsp;&nbsp;00001-YY&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" id="test6" name="forment"
                                       value="4" {{(!empty($setting) && $setting->invoice_formet=='4')?'checked':''}}>&nbsp;&nbsp;00001/MM/YY
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group"><br>
                                <label for="predefine_clientnote">Predefine Client Note</label>
                                <textarea rows="7" placeholder="add predefine client note for invoice"
                                          class="form-control" name="predefine_client"
                                          id="predefine_client">{{$setting->client_note ?? ""}}</textarea>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group"><br>
                                <label for="term_condition">Predefine Terms & Condition</label>
                                <textarea rows="7" placeholder="add predefine terms and conditions for invoice"
                                          class="form-control" id="predefine_term_note"
                                          name="predefine_term_note">{{$setting->term_condition ?? ""}}</textarea><br>
                                <p class="text-danger">* Use double hash (##) sign to separate terms or conditions.
                                    (ex : ##term01##term02##condition01##condition02)</p>
                            </div>
                            <div class="form-group pull-right">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <a href="{{ route('dashboard.index') }}" class="btn btn-danger"><i
                                            class="fa fa-times"></i>&nbsp;&nbsp;Cancel</a>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"
                                                                                     id="show_loader"></i>&nbsp;&nbsp;Save
                                    </button>
                                </div>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
