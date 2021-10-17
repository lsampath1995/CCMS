<div class="modal fade" id="addtag" role="dialog" aria-labelledby="addcategory" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('case-type.store') }}" method="POST" id="tagForm" name="tagForm">
            @csrf()
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel2"><i class="fa fa-gavel"></i>&nbsp;&nbsp;Add Case Type</h4>
                </div>
                <div class="modal-body">
                    <div id="form-errors"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <label for="case_type">Case Type </label>
                            <select class="form-control case_type" id="case_type" name="case_type">
                                <option value="">select case type</option>
                                @foreach($caseTypes as $type)
                                    <option value="{{$type->id}}"
                                        {{(isset($caseType) && $caseType->parent_id==$type->id)?'selected=""':''}}>
                                        {{$type->case_type_name ?? ''}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group"><br>
                            <label for="case_subtype">Case Subtype <span class="text-danger">*</span></label>
                            <input type="text" placeholder="enter case subtype" class="form-control" id="case_type_name"
                                   name="case_type_name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                            class="ik ik-x"></i><i class="fa fa-times"></i>&nbsp;&nbsp;Close
                    </button>
                    <button type="submit" class="btn btn-success shadow"><i class=" fa fa-save ik ik-check-circle"
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
