/******/
(() => { // webpackBootstrap
    var __webpack_exports__ = {};
    /*!************************************************************!*\
      !*** ./resources/assets/js/job_published/job_published.js ***!
      \************************************************************/
    /******/
    (function() {
        // webpackBootstrap
        var __webpack_exports__ = {};
        /*!********************************************************!*\
          !*** ./resources/assets/js/job_published/job_published.js ***!
          \********************************************************/

        $(document).ready(function() {
            var tableName = '#jobPublishedTbl';
            var tbl = $('#jobPublishedTbl').DataTable({
                processing: true,
                serverSide: true,
                searchDelay: 500,
                'language': {
                    'lengthMenu': 'Show _MENU_'
                },
                'order': [
                    [3, 'asc']
                ],
                ajax: {
                    url: jobPublishedUrl
                },
                columnDefs: [{
                    'targets': [0],
                    'width': '10%'
                }, {
                    'targets': [1],
                    'width': '10%'
                }, {
                    'targets': [2],
                    'className': 'text-right',
                    'width': '10%'
                }, {
                    'targets': [3],
                    'orderable': false,
                    'className': 'text-center',
                    'width': '20%'
                }],
                columns: [{
                        data: function data(row) {
                            var element = document.createElement('textarea');
                            var url = jobsUrl + '/' + row.id;
                            element.innerHTML = row.job_title;
                            return '<a href="' + url + '">' + element.value + '</a>';
                        },
                        name: 'job_title'
                    },
                    {
                        data: function(row) {


                            var statusColor = {
                                '0': 'info',
                                '1': 'success',
                                '2': 'danger'
                            };

                            return '<div class="badge badge-light-' + statusColor[row.admin_approved] + '">' + adminStatus[row.admin_approved] + '</div>';
                        },
                        name: 'admin_approved',
                    }, {
                        data: function data(row) {
                            return "<div class=\"badge badge-light\">\n                    <div> ".concat(moment(row.created_at, 'YYYY-MM-DD hh:mm:ss').format('Do MMM, YYYY'), "</div>\n                    </div>");
                        },
                        name: 'created_at'
                    }, {
                        data: function data(row) {
                            var url = jobsUrl + '/' + row.id;
                            var data = [{
                                'id': row.id,
                                'url': url + '/edit'
                            }];
                            return prepareTemplateRender('#jobPublishedActionTemplate', data);
                        },
                        name: 'id'
                    }
                ]
            });
            handleSearchDatatable(tbl);
            $(document).on('click', '.delete-btn', function(event) {
                var jobId = $(event.currentTarget).data('id');
                deleteItem(jobsUrl + '/' + jobId, tableName, Lang.get('messages.job.expired_job'));
            });
        });
        /******/
    })();
    /******/
})();
