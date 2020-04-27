$(function () {
    // ================================================================================================
    //* Archive
    $("#table-admin-product").DataTable();

    // ================================================================================================
    //* Create
    $("#form-create-product").on("submit", function (e) {
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
    $("#form-single-product").on("submit", function (e) {
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

    // Upload image to gallery
    $(".upload-gallery input[type=file]").change(function (e) {
        e.preventDefault();

        let form = $(this).parents(".upload-gallery");

        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: new FormData(form[0]),
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

                if ($(".gallery-list").length) {
                    $(".gallery-list").append(`
                        <div class="col-sm-2 gallery-item">
                            <img src="${res.image.src}" data-size="${res.image.size} B" data-filename="${res.image.filename}"
                                class="img-responsive">
                        </div>
                        `);
                } else {
                    $(".attachment-library").html(`
                        <div class="row gallery-list">
                            <div class="col-sm-2 gallery-item">
                                <img src="${res.image.src}" data-size="${res.image.size} B" data-filename="${res.image.filename}"
                                    class="img-responsive">
                            </div>
                        </div>
                    `);
                }
            },
            error: (e) => {
                form.find(".alert-dismissible");
                form.prepend(`
                    <div class="alert alert-danger alert-dismissible fade" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${e.responseJSON.message}
                    </div>`);
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
    // ================================================================================================
    //* Category
    $("#table-admin-category").DataTable();

    $("#form-category").submit(function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: form.serialize(),
            dataType: "json",
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

                $("#table-admin-category")
                    .DataTable()
                    .row.add(
                        $(`
                        <tr>
                            <td>${res.category.id}</td>
                            <td>${res.category.name}</td>
                            <td class="row-actions">
                                <a href="${res.category.categoryUrl}")}}">
                                    <i class="os-icon os-icon-ui-49"></i>
                                </a>
                                <a class="danger" href="${res.category.deleteUrl}">
                                    <i class="os-icon os-icon-ui-15"></i>
                                </a>
                            </td>
                        </tr>`).appendTo($("#table-admin-category tbody"))
                    )
                    .draw();
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
});
