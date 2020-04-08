$(document).ready(function(){
	
	$("#acc_create_form").validate({
		submitHandler : function(form) {
		    $('#submit_btn').attr('disabled','disabled');
			$('#submit_btn').button('loading');
			form.submit();
		},
		rules : {
			tcpKey : {
				required : true,
				tcpKey: true,
				remote: {
					url: "check-key.php",
					type: "post",
					data: {
						tcpKey: function() {
							return $( "#tcp_key" ).val();
						}
					}
				}
			},
			creditos : {
				required : true
			},
			nAdmin : {
				required : true
			},
			myIP :{
				required : true
			}
		},
		messages : {
			tcpKey : {
				required : "Error Code: Feild Key is empty",
				remote : "Error Code: Duplicated Key"
			},
			creditos : {
				required : "Error Code: Field Creditos is empty"
			},
			nAdmin : {
				required : "Error Code: Field Admin is empty"
			},
			myIP : {
				required : "Error Code: Field IP is empty"
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