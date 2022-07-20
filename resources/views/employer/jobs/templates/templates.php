<script id="jobActionTemplate" type="text/x-jsrender">
   {{if !isJobClosed}}
     {{if !isJobPause && !isJobDraft}}
<!--   <a title="--><?php //echo __('messages.job_applications') ?>
<!--  " class="btn btn-dark action-btn mb-1 mt-1" href="{{:jobApplicationUrl}}" data-bs-toggle="tooltip" data-placement="bottom">-->
<!--            <i class="fa fa-users"></i>-->
<!--   </a>-->

       <a href="{{:jobApplicationUrl}}" title="<?php echo __('messages.job_applications') ?>" class="btn btn-icon btn-bg-light btn-active-color-info btn-sm me-1 edit-btn" data-bs-toggle="tooltip" data-placement="bottom">
        <span class="svg-icon svg-icon-3">
            <i class="fa fa-users"></i>
        </span>
</a>
    {{/if}}
<!--   <a title="--><?php //echo __('messages.common.edit') ?>
<!--  " class="btn mt-1 mb-1 btn-warning action-btn edit-btn" href="{{:url}}" data-bs-toggle="tooltip" data-placement="bottom">-->
<!--            <i class="fa fa-edit"></i>-->
<!--   </a>-->
    <a href="{{:url}}" title="<?php echo __('messages.common.edit') ?>" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 edit-btn" data-bs-toggle="tooltip" data-placement="bottom">
        <span class="svg-icon svg-icon-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
            <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
            </svg>
        </span>
</a>
   {{/if}}
<!--   <a title="Copy Preview Link" class="btn mt-1 mb-1 btn-success action-btn copy-btn" data-job-id="{{:jobId}}" href="#" data-bs-toggle="tooltip" data-placement="bottom">-->
<!--            <i class="fa fa-copy"></i>-->
<!--   </a>-->
   <a title="Copy Preview Link" class="btn btn-icon btn-bg-light btn-active-color-success btn-sm me-1 action-btn copy-btn" data-job-id="{{:jobId}}" data-bs-toggle="tooltip" data-placement="bottom">
        <span class="svg-icon svg-icon-3">
          <i class="fa fa-copy"></i
        </span>
</a>

<!--   <a title="--><?php //echo __('messages.common.delete') ?>
<!--    " class="btn mt-1 mb-1 btn-danger action-btn delete-btn" data-id="{{:id}}" href="#" data-bs-toggle="tooltip" data-placement="bottom">-->
<!--            <i class="fa fa-trash"></i>-->
<!--   </a>-->

   <a title="<?php echo __('messages.common.delete') ?>" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1 action-btn delete-btn" data-job-id="{{:id}}" data-bs-toggle="tooltip" data-placement="bottom">
        <span class="svg-icon svg-icon-3">
          <i class="fa fa-trash"></i
        </span>
</a>

</script>

<script id="jobStatusActionTemplate" type="text/x-jsrender">
{{if !isJobClosed}}
 {{if status == 'Drafted'}}
    <button class="btn btn-light-warning mr-1 badge job-application-status" style="cursor:context-menu"><?php echo __('messages.common.drafted') ?></button>
    {{else}}
          <div class="dropdown dropup">
<a class="btn btn-light btn-active-light-primary btn-sm dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false">
   {{:status}}
  </a>
  <ul class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 fw-bold fs-6 w-150px py-4 dropdown-menu" aria-labelledby="dropdownMenuButton1">
   {{if status == 'Live'}}
   <li>
    <a class="btn btn-sm action-pause change-status" data-id="{{:id}}" data-option="Paused"><?php echo __('messages.common.paused') ?></a>
    </li>
    <li>
    <a class="btn btn-sm action-close change-status" data-id="{{:id}}" data-option="Closed"><?php echo __('messages.common.closed') ?></a>
    </li>
     {{else status == 'Paused'}}
     <li>
       <a class="btn btn-sm action-open change-status" data-id="{{:id}}" data-option="Live"><?php echo __('messages.common.live') ?></a>
       </li>
       <li>
    <a class="btn btn-sm action-close change-status" data-id="{{:id}}" data-option="Closed"><?php echo __('messages.common.closed') ?></a>
 </li>
     {{/if}}
  </ul>
  </div>

<!--    <div class="dropdown d-inline mr-2">-->
<!--        <button class="btn btn-{{:statusColor}} dropdown-toggle badge job-application-status" type="button" id="actionDropDown"-->
<!--                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{:status}}</button>-->
<!--        <div class="dropdown-menu">-->
<!--            {{if status == 'Live'}}-->
<!--            <a class="dropdown-item action-pause change-status" href="#" data-id="{{:id}}"-->
<!--               data-option="Paused">--><?php //echo __('messages.common.paused') ?><!--</a>-->
<!--            <a class="dropdown-item action-close change-status" href="#" data-id="{{:id}}"-->
<!--               data-option="Closed">--><?php //echo __('messages.common.closed') ?><!--</a>-->
<!--            {{else status == 'Paused'}}-->
<!--            <a class="dropdown-item action-open change-status" href="#" data-id="{{:id}}"-->
<!--               data-option="Live">--><?php //echo __('messages.common.live') ?><!--</a>-->
<!--            <a class="dropdown-item action-close change-status" href="#" data-id="{{:id}}"-->
<!--               data-option="Closed">--><?php //echo __('messages.common.closed') ?><!--</a>-->
<!--            {{/if}}-->
<!--        </div>-->
<!--    </div>-->
    {{/if}}
{{else}}
    <button class="btn btn-danger mr-1 badge job-application-status" style="cursor:context-menu"><?php echo __('messages.common.closed') ?></button>
{{/if}}

</script>

<script id="feauredJobTemplate" type="text/x-jsrender">
{{if isFeaturedEnable}}
  {{if !featured}}
     {{if isFeaturedAvilabal && isJobLive}}
        <a title="Pay to get <?php echo __('messages.front_settings.make_featured') ?>"
         data-bs-toggle="tooltip" data-bs-placement="bottom" class="btn btn-info btn-sm action-btn w-100 featured-job feature-btn" data-id="{{:id}}">
                <?php echo __('messages.front_settings.make_featured') ?>
       </a>
     {{/if}}
   {{else}}
    <a title="Expries On {{:expiryDate}}
      " data-bs-toggle="tooltip" class="btn btn-success btn-sm action-btn w-100" data-id="{{:id}}">
            <?php echo __('messages.front_settings.featured') ?><i class="far fa-check-circle pl-1 pt-1"></i>
   </a>
  {{/if}}
{{else}}
  <a class="btn btn-icon btn-danger action-btn"><i class="fas fa-times"></i></a>
{{/if}}





</script>
