{{--<table class="table table-responsive-sm table-striped table-bordered" id="transactionsTable">--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <th>{{ __('messages.transaction.type') }}</th>--}}
{{--        <th>{{ __('messages.transaction.user_name') }}</th>--}}
{{--        <th>{{ __('messages.transaction.transaction_date') }}</th>--}}
{{--        <th>{{ __('messages.plan.amount') }}</th>--}}
{{--        <th>{{ __('messages.transaction.invoice') }}</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}
{{--    </tbody>--}}
{{--    <tfoot>--}}
{{--    </tfoot>--}}
{{--</table>--}}

<table
        class="table table-row-dashed align-middle fs-6 gy-5 no-footer w-100 dataTable table-responsive-sm"
        id="transactionsTable">
    <thead>
    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
        <th>{{ __('messages.transaction.type') }}</th>
        <th>{{ __('messages.transaction.user_name') }}</th>
        <th>{{ __('messages.transaction.transaction_date') }}</th>
        <th>{{ __('messages.plan.amount') }}</th>
        <th>{{ __('messages.transaction.invoice') }}</th>
    </tr>
    </thead>
    <tbody class="text-gray-600 fw-bold">
    </tbody>
</table>
