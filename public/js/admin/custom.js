//* Datatable
$(function () {
    console.log("csrf" + $('meta[name="csrf-token"]').attr("content"));

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#table-admin-comment").DataTable();

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

    // Resize text area
    $("textarea").on("input", function () {
        $(this)
            .height(105)
            .height(
                this.scrollHeight - parseInt($(this).css("padding-top")) * 2
            );
    });

    $("textarea").trigger("input");

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
                console.log(e);

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

    // Content editor
    $("#content-editor").on("keyup", function (e) {
        if (e.key === "Enter") {
            $(this).val(
                $(this)
                    .val()
                    .replace(/\n(?!.|\n)/g, "\n<br>\n")
            );
        }

        let content = $(this).val();
        $("#preview-content").html(content);
        $("#content-editor").trigger("input");
    });

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

    $("#add-image-modal").on("click", ".gallery-item", function (e) {
        e.preventDefault();
        let imgURL = $(this).find("img").attr("src");
        console.log("clicked");

        $("#content-editor").val(
            `${$(
                "#content-editor"
            ).val()}\n<br>\n<img class="img-responsive" src="${imgURL}" alt=""></img>`
        );
        $("#add-image-modal").modal("hide");
        $("#content-editor").trigger("keyup");
        let content = $("#content-editor").val();
        $("#preview-content").html(content);
    });
});
