var Loader = new Class({
    message: null,
    initialize: function (message) {
        if (!Default.isEmpty(message)) this.message = message;
    },
    show: function () {
        if (!Default.isEmpty(this.message)) {
            $("body").prepend(
                "<div id='ajax-loader' class='body-preloader'><div class='content-preloader text-center'><i class='fas fa-spinner fa-spin fa-2x'></i><h4>" +
                    this.message +
                    "</h4></div></div>"
            );
        } else {
            $("body").prepend(
                "<div id='ajax-loader' class='body-preloader'><div class='content-preloader text-center'><i class='fas fa-spinner fa-spin fa-2x'></i></div></div>"
            );
        }
        $("#ajax-loader").hide().fadeIn("slow");
        console.log("show loader");
        setTimeout(function () {
            $("#ajax-loader")
                .show()
                .fadeOut("fast", function () {
                    this.remove();
                });
        }, 1500);
    },
    hide: function () {
        $("#ajax-loader")
            .show()
            .fadeOut("fast", function () {
                this.remove();
            });
        console.log("hide loader");
    },
});
