$(function () {
    var  baseUrl = $("meta[name='base-url']").attr("content");

    $("[data-plugin='select2']").select2({
        allowClear:!0
    });
    
    $("[data-plugin='select2-no-search']").select2({
        minimumResultsForSearch: -1
    });

    $("#description").trumbowyg({
        svgPath: baseUrl + "/assets/img/ui/icons.svg",
        btns: [
            ["formatting", "strong", "em", "superscript", "subscript"],
            ["unorderedList", "orderedList"]
        ]
    });

    $(document).on("click", ".modal-call", function (e) {
        var modal = new Modal();
        var fullscreen = $(this).data("fullscreen") ? $(this).data("fullscreen") : false;

        if (fullscreen) {
            modal.setFullscreen(fullscreen);
        }

        modal.setParams( { id: $(this).data("id") });
        modal.setUrl($(this).data("url") ? $(this).data("url") : $(this).attr("href"));
        modal.execute();
        
        e.preventDefault();
    });
});