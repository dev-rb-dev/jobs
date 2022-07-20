<script id="jobApplicationActionTemplate" type="text/x-jsrender">
<div class="dropdown">
<a class="btn btn-primary btn-sm dropdown-toggle" id="actionDropDown" data-bs-toggle="dropdown" aria-expanded="false">
   Action
  </a>
  <ul class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 fw-bold fs-6 w-150px py-4 dropdown-menu" aria-labelledby="dropdownMenuButton1">
   <li>
    {{if !isCompleted}}
        {{if !isShortlisted}}
                <a href="javascript:void(0)" class="btn btn-sm dropdown-item short-list" data-id="{{:id}}"><?php echo __('messages.common.shortlist') ?></a>
            {{else}}
                {{if !isJobExpiry}}
                        <a href="javascript:void(0)" class="btn btn-sm dropdown-item change-job-stage" data-id="{{:id}}" data-stage-id="{{:jobStageId}}"><?php echo __('messages.job_stage.job_stage') ?></a>
                {{/if}}
        {{/if}}

        {{if !isApplied}}
             <a href="javascript:void(0)" class="btn btn-sm dropdown-item action-completed" data-id="{{:id}}"><?php echo __('messages.common.selected') ?></a>
        {{/if}}
             <a href="javascript:void(0)" class="btn btn-sm dropdown-item action-decline" data-id="{{:id}}"><?php echo __('messages.common.rejected') ?></a>
        {{if isJobStage && !isRejected && !isJobExpiry}}
            <a href="{{:viewSlotsScreen}}" class="btn btn-sm dropdown-item"><?php echo __('messages.job_stage.slots') ?></a>
        {{/if}}
    {{/if}}
     <a href="javascript:void(0)" class="btn btn-sm dropdown-item action-delete" data-id="{{:id}}"><?php echo __('messages.common.delete') ?></a>
    </li>
  </ul>
  </div>
</div>


<!-- <div class="dropdown d-inline mr-2">-->
<!--      <button class="btn btn-primary dropdown-toggle" type="button" id="actionDropDown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>-->
<!--      <div class="dropdown-menu job-front-action-dropdown">-->
<!--        {{if !isCompleted && !isRejected}}-->
<!--            {{if !isShortlisted}}-->
<!--                    <a class="dropdown-item short-list" href="javascript:void(0)" data-id="{{:id}}">--><?php //echo __('messages.common.shortlist') ?><!--</a>-->
<!--            {{else}}-->
<!--                    {{if !isJobExpiry}}-->
<!--                    <a class="dropdown-item change-job-stage" href="javascript:void(0)" data-id="{{:id}}" data-stage-id="{{:jobStageId}}">--><?php //echo __('messages.job_stage.job_stage') ?><!--</a>-->
<!--                    {{/if}}-->
<!--            {{/if}}-->
<!---->
<!--            {{if !isApplied}}-->
<!--                <a class="dropdown-item action-completed" href="javascript:void(0)" data-id="{{:id}}">--><?php //echo __('messages.common.selected') ?><!--</a>-->
<!--            {{/if}}-->
<!--                <a class="dropdown-item action-decline" href="javascript:void(0)" data-id="{{:id}}">--><?php //echo __('messages.common.rejected') ?><!--</a>-->
<!--            {{if isJobStage && !isRejected && !isJobExpiry}}-->
<!--                <a class="dropdown-item" href="{{:viewSlotsScreen}}">--><?php //echo __('messages.job_stage.slots') ?><!--</a>-->
<!--            {{/if}}-->
<!--        {{/if}}-->
<!--        <a class="dropdown-item action-delete" href="javascript:void(0)" data-id="{{:id}}">--><?php //echo __('messages.common.delete') ?><!--</a>-->
<!--    </div>-->
<!-- </div>-->



</script>

<script id="interviewSlotHtmlTemplate" type="text/x-jsrender">
    <div class="slot-box rounded shadow mb-5">
                        <div class="row p-5">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label name="date" class="form-label fs-6 fw-bolder text-gray-700 mb-3 required"><?php echo __('messages.job_stage.date') . ':' ?></label>
                                    <input type="text" class="form-control form-control-solid date" name="date[{{:uniqueId}}]" required id="date[{{:uniqueId}}]">
                                </div>
                                <div class="form-group mb-0 mt-3">
                                    <label name="time" class="form-label fs-6 fw-bolder text-gray-700 mb-3 required"><?php echo __('messages.job_stage.time') . ':' ?></label>
                                    <input type="text" class="form-control form-control-solid time" name="time[{{:uniqueId}}]" required id="time[{{:uniqueId}}]">
                                </div>
                            </div>
                            <div class="form-group col-sm-6 mb-0 mt-25">
                                <label name="notes" class="d-flex justify-content-between form-label fs-6 fw-bolder text-gray-700 mb-3"><?php echo __('messages.company.notes') . ':' ?>
                                    <a href="javascript:void(0)" aria-label="Close" class="close text-danger delete-schedule-slot desktop-close">
                                    <span class="svg-icon svg-icon-1">
						<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                             version="1.1">
							<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                               fill="#000000">
								<rect fill="#ff0000" x="0" y="7" width="16" height="2" rx="1"/>
								<rect fill="#ff0000" opacity="0.5"
                                      transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                      x="0" y="7" width="16" height="2" rx="1"/>
							</g>
						</svg>
					</span></a>
                                </label>
                                <textarea class="form-control textarea-sizing form-control-solid" name="notes[{{:uniqueId}}]" id="notes" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

</script>

<script id="slotHtmlTemplate" type="text/x-jsrender">
    <div class="slot-box mb-3 {{:status}}">
                        <div class="row p-3">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label name="date"><?php echo __('messages.job_stage.date').':' ?></label>
                                    <span class="text-danger">*</span>
                                    <input type="text" class="form-control" required id="date" value="{{:schedule_date}}" disabled>
                                </div>
                                <div class="form-group mb-0">
                                    <label name="time"><?php echo __('messages.job_stage.time').':' ?></label>
                                    <span class="text-danger">*</span>
                                    <input type="text" class="form-control" required id="time" value="{{:schedule_time}}" disabled>
                                </div>
                            </div>
                            <div class="form-group col-sm-6 mb-0">
                                <label name="notes" class="d-flex justify-content-between"><?php echo __('messages.company.notes').':' ?>

                                </label>
                                <textarea class="form-control textarea-sizing" id="notes" disabled>{{:notes}}</textarea>
                            </div>
                        </div>
                    </div>
</script>

<script id="interviewSlotHistoryHtmlTemplate" type="text/x-jsrender">
     <div class="d-flex justify-content-between">
          <span>{{:companyName}}</span>
          <span>{{:schedule_date}} - {{:schedule_time}}</span>
     </div>
     <span>{{:notes}}</span>
     <hr>
</script>
