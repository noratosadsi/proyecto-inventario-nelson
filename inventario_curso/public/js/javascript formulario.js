
//document.write('<script src=//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js></script>');

//show password

$(document).ready(function(){
    $("#pw").focus(function(){
        this.type = "text";
    }).blur(function(){
        this.type = "password";
    })   
});

//Placeholder fixed for Internet Explorer
$(function() {
	var input = document.createElement("input");
	if(('placeholder' in input)==false) { 
		$('[placeholder]').focus(function() {
			var i = $(this);
			if(i.val() == i.attr('placeholder')) {
				i.val('').removeClass('placeholder');
				if(i.hasClass('password')) {
					i.removeClass('password');
					this.type='password';
				}			
			}
		}).blur(function() {
			var i = $(this);	
			if(i.val() == '' || i.val() == i.attr('placeholder')) {
				if(this.type=='password') {
					i.addClass('password');
					this.type='text';
				}
				i.addClass('placeholder').val(i.attr('placeholder'));
			}
		}).blur().parents('form').submit(function() {
			$(this).find('[placeholder]').each(function() {
				var i = $(this);
				if(i.val() == i.attr('placeholder'))
					i.val('');
			})
		});
	}
	});

//mostrar contraseña al dar click en el checkbox

 //Código jquery para detectar cuándo se activa el checkbox
  $("#remember").change(function() {
    //Si el checkbox está seleccionado
    if($(this).is(":checked")) {
		$("#pw").attr("type","text");
    }
    else {
      //alert("El checkbox no está seleccionado");
		$("#pw").attr("type","password");
    }
  });
