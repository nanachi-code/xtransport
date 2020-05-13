$(function () {
    // ================================================================================================
    //* Archive
    $("#table-admin-project").DataTable();

    // ================================================================================================
    //* Create
    $("#form-create-project").on("submit", function (e) {
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
    $("#form-single-project").on("submit", function (e) {
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
        let filename = $(this).find("img").attr("data-filename"),
            imgURL = $(this).find("img").attr("src");

        $("#thumbnail-preview").attr("src", imgURL);
        $("input[name='thumbnail']").val(filename);
        $("#set-thumbnail-modal").modal("hide");
    });

    $("#remove-thumbnail").click(function (e) {
        e.preventDefault();

        $("#thumbnail-preview").attr("src", "/images/default/no-image.jpg");
        $("input[name='thumbnail']").val("");
        $("#set-thumbnail-modal").modal("hide");
    });

    // Set gallery
    $("#set-gallery").click(function (e) {
        e.preventDefault();

        $("#set-gallery-modal").modal("toggle");
    });

    $("#set-gallery-modal").on("click", ".gallery-item", function (e) {
        e.preventDefault();
        let item = $(this).find("img");

        if (item.hasClass("selected")) {
            item.removeClass("selected");
        } else {
            item.addClass("selected");
        }
    });

    $("#confirm-gallery").click(function (e) {
        e.preventDefault();

        let items = $("#set-gallery-modal .gallery-item .selected"),
            row = $("#gallery-preview .row"),
            input = $(`input[name="gallery"]`),
            _val = [];
        row.html("");

        for (const item of items) {
            let src = $(item).attr("src"),
                filename = $(item).attr("data-filename");

            row.append(`
            <div class="col-sm-3">
                <img src="${src}" class="img-responsive">
            </div>`);

            _val.push(filename);
        }
        input.val(JSON.stringify(_val));

        $("#set-gallery-modal").modal("hide");
    });

    $("#reset-gallery").on("click", function (e) {
        e.preventDefault();

        let items = $("#set-gallery-modal .gallery-item .selected"),
            row = $("#gallery-preview .row"),
            input = $(`input[name="gallery"]`);

        items.removeClass("selected");
        row.html("");
        input.val("");

        $("#set-gallery-modal").modal("hide");
    });
});
