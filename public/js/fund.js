$(document).ready(function () {

    let messageDiv = `
                <div class="row show">
                <div class="col show">
                <div class="alert alert-warning w-50 text-warning show">
                Search minimal 2 letters
                </div>
                </div>
                </div>
                `;
    let noresDiv = `
                <div class="row show">
                <div class="col show">
                <div class="alert alert-warning w-50 text-warning show">
                No Data Found
                </div>
                </div>
                </div>
                `;

    $('#searchbox').on('keyup', function () {
        let searchTerm = $(this).val().toLowerCase();
        let searchUrl = $('#searchbox').data('search-url');
        let container = $('.fund-container');
        let pagination = $(".pagination-container");

        if (searchTerm.length === 0) {
            $.ajax({
                url: searchUrl,
                type: "GET",
                dataType: "html",
                success: function (response) {
                    container.html("");
                    container.append(response);
                    pagination.show();
                }
            });
            return;
        }

        if (searchTerm.length < 2) {
            $('.fund-container').html(messageDiv);
            pagination.hide();
            return;
        }

        $.ajax({
            url: searchUrl,
            type: "GET",
            data: { query: searchTerm },
            success: function (response) {
                container.html("");
                if (response.length === 0) {
                    container.append(noresDiv);
                    pagination.hide();
                    return;
                }
                pagination.hide();
                $('.fund-container').html(response);
            },
            error: function (xhr) {
                console.log("Error:", xhr);
            }
        });
    });
});
