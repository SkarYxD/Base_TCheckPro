$(document).ready(function(){
	
	$("#register-form").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			name : {
				required : true
			},
			email : {
				required : true,
				email: true,
				remote: {
					url: "check-email.php",
					type: "post",
					data: {
						email: function() {
							return $( "#email" ).val();
						}
					}
				}
			},
			password : {
				required : true
			},
			confirm_password : {
				required : true,
				equalTo: "#password"
			},
			key_tcp : {
				required : true
			}
		},
		messages : {
			name : {
				required : "Ingrese un nombre"
			},
			email : {
				required : "Por favor ingresa un correo",
				remote : "Correo ya registrado en la db"
			},
			password : {
				required : "Debe introducir una contraseña"
			},
			confirm_password : {
				required : "Debe confirmar su contraseña",
				equalTo: "Las contraseñas no coinciden"
			},
			key_tcp : {
				required : "Ingrese una KEY VALIDA"
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