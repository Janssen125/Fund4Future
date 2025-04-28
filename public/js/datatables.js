$(document).ready(function () {
    $('#dataTable').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        language: {
            search: "Search:",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ entries",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        }
    });
    $('.dataTables_wrapper').addClass('show');
});