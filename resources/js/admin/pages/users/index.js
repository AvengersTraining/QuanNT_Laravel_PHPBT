$.fn.dataTable.ext.errMode = 'none';

let userTableEl = $('#users_table'),
    editUserModal = $('#edit_user_modal'),
    editUserModalAlertEl = editUserModal.find('alert-notification');

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

// Open edit user modal event binding
userTableEl.on('click', '.btn-edit-user', function () {
    hideElement(editUserModalAlertEl);
    let selectedRow = $(this).closest('tr'),
        actionUrl = selectedRow.find('.btn-edit-user').data('actionUrl'),
        selectedUserId = selectedRow.data('id');
    getInformationUser(actionUrl);

    editUserModal.modal('show');
});

// Get information user
function getInformationUser(actionUrl) {
    axios.get(actionUrl)
        .then(onSuccessGetUser)
        .catch(onErrorGetUser);
}

function onSuccessGetUser(response) {
    if (response.status === 200) {
        let inputNameElm = editUserModal.find('#name'),
            inputUserNameElm = editUserModal.find('#username');
        let user = response.data,
            name = user.name,
            username = user.username;

        inputNameElm.val(name);
        inputUserNameElm.val(username);
    } else {
        showErrorAlert(editUserModalAlertEl, response.message);
    }
}

function onErrorGetUser(error) {

}

// Show error alert.
function showErrorAlert(element, message = '') {
    message && isJqueryObject(element) && element.html(message).addClass('alert-error')
        .removeClass('alert-success');
}

// Hide element
function hideElement(element) {
    isJqueryObject(element) && element.hide();
}

// Show element
function showElement(element) {
    isJqueryObject(element) && element.show();
}

// Check if give object is Jquery object
function isJqueryObject(obj) {
    return obj instanceof $ || obj instanceof Jquery;
}
