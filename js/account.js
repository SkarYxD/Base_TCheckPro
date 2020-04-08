$(document).ready(function(){
	
	$("#account-form").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			descripcion : {
				required : true,
				remote   : {
						url: "check-email.php",
						type: "post",
						data: {
							descripcion: function() {
								return $( "#descripcion" ).val();
							},
							email: function() {
								return $( "#email" ).val();
							}
						}
				}
			},
			descripcion : {
				required : true
			}
		},
		messages : {
			name : {
				required : "Introduzca un nombre de usuario"
			},
			email : {
				required : "Introduzca correo electrónico",
				remote : "Correo electrónico ya existe"
			},
			descripcion : {
				required : "Introduza una descripción"
			}

		},
		errorPlacement : function(error, element) {
			$(element).closest('div').find('.help-block').html(error.html());
		},
		highlight : function(element) {
			$(element).closest('div').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			 $(element).closest('div').removeClass('has-error').addClass('has-success');
			 $(element).closest('div').find('.help-block').html('');
		}
	});
	
	
});