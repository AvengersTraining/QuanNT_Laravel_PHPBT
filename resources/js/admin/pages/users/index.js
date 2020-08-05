$.fn.dataTable.ext.errMode = 'none';

let userTableEl = $('#users_table');

let selectedUserId = null;

let userDataTable = userTableEl
    .on('error.dt', (e, settings, techNote, message) => {
        window.location.reload();
    })
    .DataTable({
        processing: true,
        serverSide: true,
        ajax: userTableEl.data('actionUrl'),
        columns: [
            { data: 'name', name: 'name' },
            { data: 'username', name: 'username' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],

        fnDrawCallback: function () {
            if (userDataTable.page() > 0 && userDataTable.rows({page: 'current'}).count() === 0) {
                window.location.reload();
            }
        }
    });

bindEvents();

// Bind keypress event on search input
function bindEvents() {
    $('input[type="search"]').keypress(function (event) {
        let keyCode = (event.keyCode ? event.keyCode : event.which);
        if (keyCode === 13) {
            reloadDatatable();
        }
    });
}

// Reload datatable.
function reloadDatatable() {
    userDataTable.draw(false);
}

// Open delte user confirm event binding
userTableEl.on('click', '.btn-delete-user', function () {
    let selectedRow = $(this).closest('tr'),
        selectedUserName = selectedRow.data('username'),
        isConfirm = confirm(`You definitely want to delete your username ${selectedUserName}?`);

    if (isConfirm) {
        let formDelete = selectedRow.find("#confirm-delete-user");
        formDelete.submit();
    }
});
