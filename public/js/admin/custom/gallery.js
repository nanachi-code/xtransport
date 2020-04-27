$(function () {
    $(".gallery-list").on("click", ".gallery-item", function (e) {
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
});
