{{--<table class="table table-responsive-sm table-striped table-bordered" id="industriesTbl">--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <th scope="col">{{ __('messages.industry.name') }}</th>--}}
{{--        <th scope="col">{{ __('messages.industry.description') }}</th>--}}
{{--        <th scope="col">{{ __('messages.common.action') }}</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--    </tbody>--}}
{{--</table>--}}


<table class="table table-row-dashed align-middle fs-6 gy-5 no-footer w-100 dataTable table-responsive-sm"
       id="companiesTbl">
    <thead>
    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
        <th scope="col">{{ __('messages.company.company_name') }}</th>
        <th>Created_at</th>
        <th scope="col">{{ __('messages.company.is_featured') }}</th>
        <th scope="col">{{ __('messages.company.email_verified') }}</th>
        <th scope="col">{{ __('messages.common.status') }}</th>
        <th scope="col">{{ __('messages.common.action') }}</th>
    </tr>
    </thead>
    <tbody class="text-gray-600 fw-bold">
    </tbody>
</table>

