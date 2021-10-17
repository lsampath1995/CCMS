<div class="modal fade" id="addtag" role="dialog" aria-labelledby="addcategory" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{route('case-status.update',$CaseStatus->id)}}" method="POST" id="tagForm" name="tagForm">
            <input type="hidden" id="id" name="id" value="{{$CaseStatus->id ?? ''}}">
            @csrf()
            @method('patch')
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-gavel"></i>&nbsp;&nbsp;Edit Case Status
                    </h4>
                </div>
                <div class="modal-body">
                    <div id="form-errors"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label for="case_subtype">Case Status <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $CaseStatus->case_status_name ?? '' }}"
                                   placeholder="enter case status"
                                   class="form-control" id="case_status" name="case_status">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                            class="ik ik-x"></i><i class="fa fa-times"></i>&nbsp;&nbsp;Close
                    </button>
                    <button type="submit" class="btn btn-success shadow"><i class="fa fa-save   ik ik-check-circle"
                                                                            id="cl">
                        </i>&nbsp;&nbsp;Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<input type="hidden" name="token-value"
       id="token-value"
       value="{{csrf_token()}}">
<input type="hidden" name="common_check_exist"
       id="common_check_exist"
       value="{{ url('common_check_exist') }}">
<script src="{{asset('assets/js/settings/cast-type-validation.js')}}"></script>
