/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!********************************************!*\
  !*** ./resources/assets/js/blogs/blogs.js ***!
  \********************************************/


var tableName = '#blogTbl';
var tbl = $('#blogTbl').DataTable({
  scrollX: false,
  deferRender: true,
  scroller: true,
  processing: true,
  serverSide: true,
  'order': [[0, 'asc']],
  ajax: {
    url: blogUrl
  },
  columnDefs: [{
    'targets': [0],
    'width': '20%'
  }, {
    'targets': [1],
    'width': '50%',
    'orderable': false
  }, {
    'targets': [2],
    'orderable': false,
    'className': 'text-center',
    'width': '8%'
  }],
  columns: [{
    data: function data(row) {
      var showUrl = blogUrl + '/' + row.id;
      return "<div class=\"d-flex align-items-center\">\n                            <div class=\"symbol symbol-circle symbol-50px overflow-hidden me-3\">\n                                <a >\n                                    <div class=\"\">\n                                        <img src=\"".concat(row.blog_image_url, "\" alt=\"\" class=\"user-img\">\n                                    </div>\n                                </a>\n                           </div>\n                           <div class=\"d-flex flex-column\">\n                                <a href=\"").concat(showUrl, "\" class=\"mb-1 show-btn\" data-id=\"").concat(row.id, "\">").concat(row.title.length > 25 ? row.title.slice(0, 25) + '...' : row.title, "</a>\n                            </div>\n                         </div>");
    },
    name: 'title'
  }, {
    data: function data(row) {
      if (!isEmpty(row.description)) {
        var element = document.createElement('textarea');
        element.innerHTML = row.description;
        return element.value.length > 190 ? element.value.slice(0, 190) + '...' : element.value;
      } else return 'N/A';
    },
    name: 'description'
  }, {
    data: function data(row) {
      var url = blogUrl + '/' + row.id;
      var data = [{
        'id': row.id,
        'url': url + '/edit'
      }];
      return prepareTemplateRender('#blogActionTemplate', data);
    },
    name: 'id'
  }]
});
handleSearchDatatable(tbl);
$(document).on('click', '.delete-btn', function (event) {
  var postId = $(this).attr('data-id');
  deleteItem(blogUrl + '/' + postId, tableName, Lang.get('messages.post.post'));
});
$(document).on('click', '.btnDeletePost', function (event) {
  var postId = $(this).attr('data-id');
  swal({
    title: Lang.get('messages.common.delete') + ' !',
    text: Lang.get('messages.common.are_you_sure_want_to_delete') + '"' + Lang.get('messages.post.post') + '" ?',
    type: 'warning',
    showCancelButton: true,
    closeOnConfirm: false,
    showLoaderOnConfirm: true,
    confirmButtonColor: '#6777ef',
    cancelButtonColor: '#d33',
    cancelButtonText: Lang.get('messages.common.no'),
    confirmButtonText: Lang.get('messages.common.yes')
  }, function () {
    window.livewire.emit('deletePost', postId);
  });
});
document.addEventListener('delete', function () {
  swal({
    title: Lang.get('messages.common.deleted') + ' !',
    text: Lang.get('messages.post.post') + Lang.get('messages.common.has_been_deleted'),
    type: 'success',
    confirmButtonColor: '#6777ef',
    timer: 2000
  });
});
var loadStretchy;
$(document).ready(function () {
  $('#filterCategory').select2({
    width: '100%'
  });

  loadStretchy = function loadStretchy() {
    if ($('.cd-stretchy-nav').length > 0) {
      $(document).on('click', '.cd-nav-trigger', function () {
        var stretchyNav = $(this).closest('nav');

        if (stretchyNav.hasClass('nav-is-visible')) {
          stretchyNav.removeClass('nav-is-visible');
        } else {
          $('.cd-stretchy-nav').removeClass('nav-is-visible');
          stretchyNav.addClass('nav-is-visible');
        }
      });
      $(document).on('click', function (event) {
        !$(event.target).is('.cd-nav-trigger') && !$(event.target).is('.cd-nav-trigger span') && $('.cd-stretchy-nav').removeClass('nav-is-visible');
      });
    }
  };

  loadStretchy();
});
var filterCategoryId = null;
document.addEventListener('livewire:load', function () {
  window.livewire.hook('message.processed', function () {
    $('#filterCategory').select2({
      width: '100%'
    });
    $('#filterCategory').val(filterCategoryId).trigger('change.select2');
  });
});
$(document).on('change', '#filterCategory', function () {
  filterCategoryId = $(this).val();
  window.livewire.emit('filterPost', $(this).val());
});
/******/ })()
;