$.fn.dataTable.ext.errMode = 'none';

let postTableEl = $('#posts_table');
let selectedPostId = null;

let postDatatable = postTableEl
    .on('error.dt', (e, settings, techNote, message) => {
        window.location.reload();
    })
    .DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        ajax: postTableEl.data('actionUrl'),
        columns: [
            { data: 'title', name: 'title' },
            { data: 'article_author', name: 'article_author.name' },
            { data: 'category', name: 'category.name' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],

        fnDrawCallback: function () {
            if (postDatatable.page() > 0 && postDatatable.rows({ page: 'current' }).count() === 0) {
                window.location.reload();
            }
        }
    });

// Open delte user confirm event binding
postTableEl.on('click', '.btn-delete-post', function () {
    let selectedRow = $(this).closest('tr'),
        selectedTitle = selectedRow.data('title'),
        isConfirm = confirm(`You definitely want to delete your post: ${selectedTitle}?`);

    if (isConfirm) {
        let formDelete = selectedRow.find('#confirm-delete-post');
        formDelete.submit();
    }
});
