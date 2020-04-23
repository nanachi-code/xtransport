//* Datatable
$(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#table-admin-product").DataTable();
    $("#table-admin-category").DataTable();
    $("#table-admin-size").DataTable();
    $("#table-admin-post").DataTable();
    $("#table-admin-comment").DataTable();
    $("#table-admin-user").DataTable();
    $("#table-admin-order").DataTable();
    $("#table-admin-product-order").DataTable();
    $("#table-admin-company").DataTable();

    $("#form-product").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: $("#form-product").attr("action"),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: (res) => {
                $("#form-product .alert-dismissible").remove();
                $("#form-product").prepend(`
                    <div class="alert alert-success alert-dismissible fade" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${res.message}
                    </div>`);
                setTimeout(() => {
                    $("#form-product .alert-dismissible").remove();
                }, 3000);
                console.log(res);
            },
            error: (e) => {
                $("#form-product .alert-dismissible").remove();
                $("#form-product").prepend(`
                    <div class="alert alert-danger alert-dismissible fade" role="alert">
                        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                            <span aria-hidden="true">×</span>
                        </button>
                        ${e.responseJSON.message}
                    </div>`);
                setTimeout(() => {
                    $("#form-product .alert-dismissible").remove();
                }, 3000);
                console.log(e.responseJSON);
            },
        });
    });

    $("#form-create-product").submit(function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            type: "POST",
            url: $("#form-product").attr("action"),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: (res) => {
                window.location.href = res.redirect;
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

    $("#form-category").submit(function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            type: "POST",
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

    $("#form-size").submit(function (e) {
        e.preventDefault();
        let form = this;

        $.ajax({
            type: "POST",
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

                $("#table-admin-size")
                    .DataTable()
                    .row.add(
                        $(`
                        <tr>
                            <td>${res.size.id}</td>
                            <td>${res.size.name}</td>
                            <td class="row-actions">
                                <a href="${res.size.url}")}}">
                                    <i class="os-icon os-icon-ui-49"></i>
                                </a>
                                <a class="danger" href="#">
                                    <i class="os-icon os-icon-ui-15"></i>
                                </a>
                            </td>
                        </tr>`).appendTo($("#table-admin-category tbody"))
                    )
                    .draw();
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

    $("#form-post").submit(function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            type: "POST",
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

    $("#form-user").submit(function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            type: "POST",
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

    $("#form-create-user").submit(function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: (res) => {
                window.location.href = res.redirect;
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

    $("#form-company").submit(function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            type: "POST",
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

    $("#form-create-company").submit(function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: (res) => {
                window.location.href = res.redirect;
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

    $("#form-create-post").submit(function (e) {
        e.preventDefault();
        let form = $(this);

        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: (res) => {
                window.location.href = res.redirect;
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

    $(".dt-delete, .single-delete").on("click", function () {
        return confirm(
            "Are you sure you want to delete this? This action cannot be undone."
        );
    });

    $(".single-disable").on("click", function () {
        return confirm(
            "Are you sure you want to disable this? This action cannot be undone."
        );
    });

    //! No longer using.
    // $("input[type=file]").change(function () {
    //     if (this.files && this.files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function (e) {
    //             $(".input-preview").attr("src", e.target.result);
    //         };

    //         reader.readAsDataURL(this.files[0]);
    //     }
    // });

    $("#content-editor").on("keyup", function (e) {
        if (e.key === "Enter") {
            $(this).val(
                $(this)
                    .val()
                    .replace(/\n(?!.|\n)/g, "\n<br>\n")
            );
        }

        let content = $(this).val();
        $("#preview-post").html(content);
        $("#content-editor").trigger("input");
    });

    $("textarea").on("input", function () {
        $(this)
            .height(105)
            .height(
                this.scrollHeight - parseInt($(this).css("padding-top")) * 2
            );
    });

    $("textarea").trigger("input");

    $("#add-content-i").click(function (e) {
        e.preventDefault();

        $("#content-editor").val(`${$("#content-editor").val()}<i></i>`);
        $("#content-editor").trigger("input");
    });

    $("#add-content-b").click(function (e) {
        e.preventDefault();

        $("#content-editor").val(`${$("#content-editor").val()}<b></b>`);
        $("#content-editor").trigger("input");
    });

    $("#add-content-link").click(function (e) {
        e.preventDefault();

        $("#content-editor").val(
            `${$("#content-editor").val()}<a href=""></a>`
        );
        $("#content-editor").trigger("input");
    });

    $("#add-content-ul").click(function (e) {
        e.preventDefault();

        if (!$(this).hasClass("opened")) {
            $("#content-editor").val(`${$("#content-editor").val()}\n<ul>`);
            $(this).addClass("opened");
            $(this).text("/ul");
        } else {
            $("#content-editor").val(`${$("#content-editor").val()}</ul>`);
            $(this).removeClass("opened");
            $(this).text("ul");
        }
        $("#content-editor").trigger("input");
    });

    $("#add-content-ol").click(function (e) {
        e.preventDefault();

        if (!$(this).hasClass("opened")) {
            $("#content-editor").val(`${$("#content-editor").val()}\n<ol>`);
            $(this).addClass("opened");
            $(this).text("/ol");
        } else {
            $("#content-editor").val(`${$("#content-editor").val()}</ol>`);
            $(this).removeClass("opened");
            $(this).text("ol");
        }
        $("#content-editor").trigger("input");
    });

    $("#add-content-li").click(function (e) {
        e.preventDefault();

        if (!$(this).hasClass("opened")) {
            $("#content-editor").val(`${$("#content-editor").val()}\n<li>`);
            $(this).addClass("opened");
            $(this).text("/li");
        } else {
            $("#content-editor").val(`${$("#content-editor").val()}</li>`);
            $(this).removeClass("opened");
            $(this).text("li");
        }
        $("#content-editor").trigger("input");
    });

    $("#add-content-image").click(function (e) {
        e.preventDefault();

        $("#add-image-modal").modal("toggle");
    });

    $("#add-image-modal #gallery-list .gallery-item").click(function (e) {
        e.preventDefault();
        let imgURL = $(this).find("img").attr("src");

        $("#content-editor").val(
            `${$(
                "#content-editor"
            ).val()}\n<br>\n<img class="img-responsive" src="${imgURL}" alt=""></img>`
        );
        $("#add-image-modal").modal("hide");
        $("#content-editor").trigger("keyup");
        let content = $("#content-editor").val();
        $("#preview-post").html(content);
    });

    $(".delete-post-comment").click(function (e) {
        e.preventDefault();
        let wrapper = $(this).closest(".comment-wrapper"),
            c = confirm(
                "Are you sure you want to delete this? This action cannot be undone."
            );
        if (c) {
            $.ajax({
                type: "POST",
                url: $(this).attr("href"),
                data: JSON.stringify({ id: $(this).attr("comment-id") }),
                dataType: "json",
                success: function (res) {
                    wrapper.remove();
                    if (!$(".comment-wrapper").length) {
                        $(".comment-box").html("No comments found.");
                    }
                    console.log(res);
                },
            });
        }
    });

    $("#btn-add-product").click(function () {
        $("#table-admin-add-product-order").DataTable();
    });

    $("a.add-product").click(function (e) {
        e.preventDefault();

        let row = $(this).parents("tr");
        let _p = {
            id: row.find(".product-id").html().trim(),
            name: row.find(".product-name").html().trim(),
            category:
                row.find(".product-category").html().trim() == "Uncategorized"
                    ? null
                    : row.find(".product-category").html().trim(),
            description: row.find(".product-description").html().trim(),
        };
        console.log(_p);
    });

    $("#gallery-list .gallery-item").click(function (e) {
        e.preventDefault();
        let imgURL = $(this).find("img").attr("src"),
            imgFilename = $(this).find("img").attr("data-filename"),
            imgSize = $(this).find("img").attr("data-size"),
            imgDeleteURL =
                $("#attachment-delete").attr("href") + "/" + imgFilename;

        $("#attachment-info-modal").modal("toggle");
        $("#attachment-image").attr("src", imgURL);
        $("#attachment-filename").text(imgFilename);
        $("#attachment-size").text(imgSize);
        $("#attachment-delete").attr("href", imgDeleteURL);
    });

    $("#upload-gallery input[type=file]").change(function (e) {
        e.preventDefault();

        let form = $("#upload-gallery");

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

                if ($("#gallery-list").length) {
                    $("#gallery-list").append(`
                        <div class="col-sm-2 gallery-item">
                            <img src="${res.image.src}" data-size="${res.image.size} B" data-filename="${res.image.filename}"
                                class="img-responsive">
                        </div>
                        `);
                } else {
                    $("#attachment-library").html(`
                        <div class="row" id="gallery-list">
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

    $("#set-thumbnail").click(function (e) {
        e.preventDefault();

        $("#set-thumbnail-modal").modal("toggle");
    });

    $("#set-thumbnail-modal #gallery-list .gallery-item").click(function (e) {
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
});
