$(function () {
    // ================================================================================================
    //* Archive
    $("#table-admin-user").DataTable();

    // ================================================================================================
    //* Create
    $("#form-create-user").on("submit", function (e) {
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
    $("#form-single-user").on("submit", function (e) {
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

    // Set avatar
    $("#set-avatar").click(function (e) {
        e.preventDefault();

        $("#set-avatar-modal").modal("toggle");
    });

    $("#set-avatar-modal").on("click", ".gallery-item", function (e) {
        e.preventDefault();
        let imgURL = $(this).find("img").attr("src");

        $("#avatar-preview").attr("src", imgURL);
        $("input[name='avatar']").val(imgURL);
        $("#set-avatar-modal").modal("hide");
    });

    $("#remove-avatar").click(function (e) {
        e.preventDefault();

        $("#logo-preview").attr("src", "/images/default/no-image.jpg");
        $("input[name='avatar']").val("");
        $("#set-avatar-modal").modal("hide");
    });
});
