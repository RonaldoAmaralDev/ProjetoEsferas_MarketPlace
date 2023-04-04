_Ajax = null;
var Ajax = new Class({
	url: null,
	dataType: "html",
	contentType: this.type,
	processData: this.process,
	params: {},
	success: null,
	uploadOn: null,
	isNewModal: false,
	loder: true,
	type: "POST",
	typeForm: false,
	error: function (jqXHR, textStatus, errorThrown) {
		console.log(jqXHR);
		console.log(textStatus);
		console.log(errorThrown);
	},
	initialize: function (url, isNewModal) {
		this.setUrl(url);
		this.setIsNewModal(isNewModal);
	},
	setSuccess: function (success) {
		if (Default.isFunction(success))
			this.success = success;
	},
	setUrl: function (url) {
		if (!Default.isEmpty(url))
			this.url = url;
	},
	setIsNewModal: function(isNewModal) {
		this.isNewModal = isNewModal;
	},
	setLoader: function(loder) {
		this.loder = loder;
	},
	setDataType: function (dataType) {
		if (!Default.isEmpty(dataType))
			this.dataType = dataType;
	},
	setTypeForm: function (typeForm){
		if (!Default.isEmpty(typeForm))
			this.typeForm = typeForm;
	},
	setParams: function (params) {
		if (!Default.isEmpty(params))
			this.params = params;
	},
	setType: function (type) {
		if (!Default.isEmpty(type))
			this.type = type;
	},
	execute: function () {
		jQuery.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		var self = this;
		if (Default.isEmpty(this.url)) {
			console.log("Ajax: URL não foi especificada.")
			return;
		}
		if (_Ajax && (_Ajax.readyState != 4 || _Ajax.status != 200)) {
			console.log("Ajax: Abortado.");
			console.log(_Ajax);
			_Ajax.abort();
		}
		console.log("Ajax: Buscando " + this.url);

		//Envio de imagem
		if(this.typeForm){
			_Ajax = jQuery.ajax({
				type: this.type,
				url:  this.url,
				data: this.params,
				cache:false,
				contentType: false,
				processData: false,
				error: this.error,				
				beforeSend: function (request) {					
					//if(this.setLoader) {
						$("body").removeClass('loaded');
						$(".loader").fadeIn('fast');
					//}
				},
				success: function (callback) {
					if (Default.isFunction(self.success))
						self.success(callback);
						
					console.log("Ajax: Finalizado.");
				},
                complete: function () {
					//if(this.setLoader) {
						$("body").addClass('loaded');
                    	$(".loader").fadeOut('fast');
					//}
                },
				statusCode: {
					404: function () {
						console.log("Ajax (404): Página não encontrada.");
					},
					500: function () {
						console.log("Ajax (500): Erro de servidor.");
					}
				}
			});
		} else {
			//Envio normal
			_Ajax = jQuery.ajax({
				url:  this.url,
				type: this.type,
				data: this.params,
				dataType: this.dataType,
				cache: false,
				error: this.error,
				beforeSend: function (request) {
					//if(this.setLoader) {
						$("body").removeClass('loaded');
						$(".loader").fadeIn('fast');
					//}
				},
				success: function (callback) {
					if (Default.isFunction(self.success))
						self.success(callback);

					console.log("Ajax: Finalizado.");
				},				
                complete: function () {
					//if(this.setLoader) {
						$("body").addClass('loaded');
                    	$(".loader").fadeOut('fast');
					//}
                },
				statusCode: {
					404: function () {
						console.log("Ajax (404): Página não encontrada.");
					},
					500: function () {
						console.log("Ajax (500): Erro de servidor.");
					}
				}
			});
		}
	}
});
