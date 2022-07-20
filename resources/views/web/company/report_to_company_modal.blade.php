<div class="modal" id="reportToCompanyModal">
    <div id="login-modal">
        <div class="login-form default-form">
            <div class="form-inner">
                <h3>{{ __('messages.job.add_note') }}</h3>
                <form name="frm" id="reportToCompany">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="userId" value="{{ (getLoggedInUserId() !== null) ? getLoggedInUserId() : null }}">
                        <input type="hidden" name="companyId" value="{{ $companyDetail->id }}">
                        <textarea rows="5" id="noteForReportToCompany" name="note" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <button class="theme-btn btn-style-one" type="submit" name="log-in" id="btnSave">{{ __('messages.common.report') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
