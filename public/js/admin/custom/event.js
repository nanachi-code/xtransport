$(function () {
    // ================================================================================================
    //* Archive
    $("#table-admin-event").DataTable();

    // ================================================================================================
    //* Create
    $("#form-create-event").on("submit", function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: (res) => {
                window.location.href = res.redirect;
            },
            error: (e) => {
                form.find(".alert-dismissible");
                for (const key in e.responseJSON.errors) {
                    for (const message of e.responseJSON.errors[key]) {
                        form.prepend(`
                        <div class="alert alert-danger alert-dismissible fade" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">×</span>
                            </button>
                            ${message}
                        </div>`);
                    }
                }
                setTimeout(() => {
                    form.find(".alert-dismissible").remove();
                }, 3000);
                console.log(e.responseJSON);
            },
        });
    });

    // ================================================================================================
    //* Single
    $("#form-single-event").on("submit", function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: (res) => {
                form.find(".alert-dismissible").remove();
                form.prepend(`
                    <div class="alert alert-success alert-dismissible fade" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${res.message}
                    </div>`);
                setTimeout(() => {
                    form.find(".alert-dismissible").remove();
                }, 3000);
                console.log(res);
            },
            error: (e) => {
                form.find(".alert-dismissible").remove();
                for (const key in e.responseJSON.errors) {
                    for (const message of e.responseJSON.errors[key]) {
                        form.prepend(`
                        <div class="alert alert-danger alert-dismissible fade" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">×</span>
                            </button>
                            ${message}
                        </div>`);
                    }
                }
                setTimeout(() => {
                    form.find(".alert-dismissible").remove();
                }, 3000);
                console.log(e.responseJSON);
            },
        });
    });

    // Set thumbnail
    $("#set-thumbnail").click(function (e) {
        e.preventDefault();

        $("#set-thumbnail-modal").modal("toggle");
    });

    $("#set-thumbnail-modal").on("click", ".gallery-item", function (e) {
        e.preventDefault();
        let imgURL = $(this).find("img").attr("src");

        $("#thumbnail-preview").attr("src", imgURL);
        $("input[name='thumbnail']").val(imgURL);
        $("#set-thumbnail-modal").modal("hide");
    });

    $("#remove-thumbnail").click(function (e) {
        e.preventDefault();

        $("#thumbnail-preview").attr("src", "/images/default/no-image.jpg");
        $("input[name='thumbnail']").val("");
        $("#set-thumbnail-modal").modal("hide");
    });
});
