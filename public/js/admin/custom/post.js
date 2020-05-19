$(function () {
    // ================================================================================================
    //* Archive
    $("#table-admin-post").DataTable();

    // ================================================================================================
    //* Create
    $("#form-create-post").on("submit", function (e) {
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
    $("#form-single-post").on("submit", function (e) {
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

    // Delete comment
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
                data: JSON.stringify({
                    id: $(this).attr("comment-id"),
                }),
                dataType: "JSON",
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
