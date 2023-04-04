var Default = new Class({
    isEmpty: function (text) {
        if (
            typeof text == "undefined" ||
            text === null ||
            text === "" ||
            text === "0" ||
            text === "NaN"
        )
            return true;
        if (typeof text == "number" && isNaN(text)) return true;
        if (text instanceof Date && isNaN(Number(text))) return true;
        return false;
    },
    isCheck: function (input) {
        if (input.is(":checked")) return true;
        return false;
    },
    reticaAcento: function (palavra) {
        var comacento = "áàãâäéèêëíìîïóòõôöúùûüçÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜÇ";
        var semacento = "aaaaaeeeeiiiiooooouuuucAAAAAEEEEIIIIOOOOOUUUUC";
        var nova = "";
        for (i = 0; i < palavra.length; i++) {
            if (comacento.search(palavra.substr(i, 1)) >= 0) {
                nova += semacento.substr(
                    comacento.search(palavra.substr(i, 1)),
                    1
                );
            } else {
                nova += palavra.substr(i, 1);
            }
        }
        return nova;
    },
    isFunction: function (handler) {
        if (typeof handler == "function" && handler instanceof Function) {
            return true;
        } else {
            return false;
        }
    },
    redirect: function (text, time) {
        if (!this.isEmpty(text)) {
            setTimeout(function () {
                window.location = text;
            }, time);
        }
        return false;
    },
    message: function (title, icon, html, redirect){
        Swal.fire({
            title: title,
            icon: icon,
            html: html,
            showCloseButton: true,
            confirmButtonText: 'Fechar',
          });
          if(redirect){
            this.redirect(redirect, 1000);
          }
    },
    confirm: function (title, html, action) {
        Swal.fire({
            title: title,
            html: html,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#04bb1d ',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, deletar!',
            cancelButtonText: 'Não, cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deletado!',
                    'Registro deletado com sucesso!',
                    'success'
                );                
                if(redirect){
                    this.redirect(redirect, 1000);
                }
            }
        });
    }
});

var Default = new Default();
jQuery(document).ready(function () {
    AJAXPATH = jQuery("meta[name='ajax-path']").attr("content");
    AJAXFULLPATH = jQuery("meta[name='ajax-full-path']").attr("content");
});
