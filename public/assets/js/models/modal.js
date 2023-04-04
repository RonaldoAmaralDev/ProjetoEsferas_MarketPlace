var Modal = new Class({
    id: null,
    selector: null,
    url: null,
    params: null,
    isNewModal: false,
    success: null,
    loading: true,
    fullscreen: false,
    initialize: function (url, isNewModal) {
        if (Default.isEmpty(url)) this.url = url;
        this.isNewModal = isNewModal;
        this.create();
        this.autoload();
    },
    autoload: function () {
        var self = this;
        jQuery("body").delegate(".modal-close", "click", function () {
                if (jQuery(this).data("reload")) {
                    var url = jQuery(this).data("url");
                    if (url) {
                        return location.href = url;
                    }
                    return window.location.reload();
                }
                self.closeAll();
                jQuery("body").removeClass("modal-open");
                jQuery("body").find(".modal-backdrop").fadeOut(200, function () {
                    $(this).remove();
                });
            })
            // Fecha modal e carrega pagina definida
            .delegate(".modal-load-url", "click", function (e) {
                e.preventDefault();

                if (!Default.isEmpty(jQuery(this).data("url"))) {
                    var _url = jQuery(this).data("url");
                } else {
                    var _url = jQuery(this).attr("href");
                }

                var _id = jQuery(this).data("id");
                jQuery(this).closest(".modal-ajax").remove();

                var modal = new Modal();
                var params = { id: _id };
                modal.setParams(params);
                modal.setUrl(_url);
                modal.execute();
            })
            // Envia formulario
            .delegate(".modal-submit", "click", function () {
                var modal = jQuery(this).closest(".modal");
                if (modal.find("form").length) {
                    modal.find("form").submit();
                } else {
                    console.log("Modal: Não foi encontrado um formulário.");
                }
            });
        // Fecha o modal com a tecla 'Esc'
        jQuery(document).keydown(function (e) {
            if (e.keyCode == 27 || e.keyWhich == 27) {
                self.closeAll();
            }
        });
    },
    isOpen: function () {
        if (jQuery(this.selector).css("display") != "none") return true;
        else return false;
    },
    calculationHeight: function () {
        var windowHeight = jQuery(window).height();
        var modalHeight = jQuery(this.selector).find(".modal-content").height();
        var finalHeight = windowHeight - modalHeight + 400 - 100;
        jQuery(this.selector).find(".modal-body").css("max-height", finalHeight + "px");

        this.$element = jQuery(this.selector);
        this.$content = this.$element.find(".modal-content");
        var borderWidth = this.$content.outerHeight() - this.$content.innerHeight();
        var dialogMargin = $(window).width() < 768 ? 20 : 60;
        var contentHeight = jQuery(window).height() - (dialogMargin + borderWidth);
        var headerHeight = this.$element.find(".modal-header").outerHeight() || 0;
        var footerHeight = this.$element.find(".modal-footer").outerHeight() || 0;
        var maxHeight = contentHeight - (headerHeight + footerHeight);

        this.$content.css({
            overflow: "hidden",
        });

        this.$element.find(".modal-body").css({
            "max-height": maxHeight,
            "overflow-y": "auto",
        });
    },
    setFullscreen: function (boolean) {
        if (!Default.isEmpty(boolean) && boolean == true) {
            jQuery(this.selector).find(".modal-dialog").addClass("modal-lg");
        }
    },
    create: function () {
        jQuery("body").addClass("modal-open").css('overflow: hidden; padding-right: 0px;');

        this.id = "modal-" + Math.floor(Math.random() * 10000000 + 1);
        this.selector = "#" + this.id;
        var div ='<div id="' + this.id + '" class="modal-basic modal fade modal-ajax show new-member" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">';        
        div += '	<div class="modal-dialog modal-dialog modal-dialog-centered" role="document">';
        div += '		<div class="modal-content radius-xl">';
        div += "		</div>";
        div += "	</div>";
        div += "</div>";
        div += '<div class="modal-backdrop fade show"></div>';

        jQuery("body").append(div);
    },
    close: function () {
        jQuery("body").find(".modal-ajax").remove();
        jQuery("body").removeClass("modal-open");
        jQuery("body").find(".modal-backdrop").fadeOut(200, function () {
            $(this).remove();
        });
    },
    closeAll: function () {
        jQuery("body").find(".modal-ajax").remove();
        jQuery("body").removeClass("modal-open");
        jQuery("body").find(".modal-backdrop").fadeOut(200, function () {
            $(this).remove();
        });
    },
    setUrl: function (url) {
        if (!Default.isEmpty(url)) this.url = url;
    },
    setIsNewModal: function (isNewModal) {
        this.isNewModal = isNewModal;
    },
    setParams: function (params) {
        this.params = params;
    },
    getId: function () {
        return this.selector;
    },
    execute: function () {
        var self = this;

        if (!Default.isEmpty(this.url)) {
            console.log("Modal: Buscando " + this.url);

            var ajax = new Ajax(this.url, this.isNewModal);

            if (!Default.isEmpty(this.params)) ajax.setParams(this.params);

            ajax.setSuccess(function (callback) {
                jQuery(self.selector).attr("data-url", self.url);
                if (self.isOpen()) {
                    
                    console.log("this.params = ", this.params);
                    console.log("self.selector = " + self.selector);

                    jQuery(self.selector).find(".modal-content").fadeOut(200, function () {
                        jQuery(self.selector).find(".modal-content").html(callback);
                        jQuery(self.selector).find(".modal-content").fadeIn(200);
                    });
                    
                } else {
                    //jQuery(self.selector).fadeOut(0);
                    jQuery(self.selector).find(".modal-content").html(callback);
                    jQuery(self.selector).fadeIn(5);
                }
            });

            ajax.execute();
        } else {
            console.log("Modal: URL inválida.");
        }
    },
});
