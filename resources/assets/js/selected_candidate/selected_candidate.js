$(document).ready(function () {

    $('#filterCandidateStatus').select2()
    $('#select2-filterCandidateStatus-container').hover(function () {
        $(this).removeAttr('title');
    });

    var table = $('#selectedCandidateTbl').DataTable({
        processing: true,
        serverSide: true,
        searchDelay: 500,
        ajax: {
            url: selectedCandidateUrl,
            type: 'GET',
            data: function (data){
                data.status = $('#filterCandidateStatus').
                find('option:selected').val();
            }
        },
        columnDefs:[{
            'targets': [2,3],
            'orderable': false,
            'className':'text-center',
            },
        ],
        columns: [
            {
                data: 'candidate.user.full_name',
                name: 'candidate.user.full_name'
            },
            {
                data: 'job.company.user.first_name',
                name: 'job.company.user.first_name'
            },
            {
                data: function (row){
                    if (row.status == 3){
                        return '<span class="badge badge-light-success" >Hired</span>'
                    }
                    return '<span class="badge badge-light-primary">Ongoing</span>'
                },
                name: 'status'
            },
            {
                data: function (row){
                    return '<a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" href="' + jobDetailUrl + '/' + row.job.job_id + '" ' +
                        'title="view"><i class="fas fa-eye fs-4"></i></i></a>';
                },
                name: 'id'
            }
        ],
        'fnInitComplete': function () {
            $('#filterCandidateStatus').
                change(function () {
                    $('#selectedCandidateTbl').
                        DataTable().
                        ajax.
                        reload(null, true);
                });
        },
    });
    handleSearchDatatable(table);
});

$(document).ready(function () {
    $(document).on('click', '#resetFilter', function () {
        $('#filterCandidateStatus').val('').trigger('change');
    });
});
