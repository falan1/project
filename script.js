$(document).ready(function() {
	$('#send').on('click', function() {
		var name = $('#name').val();
		var mail = $('#mail').val();
		var comm = $('#comm').val();
		var error = false;
		if(name.length < 1) {
			$('.name_err').show();
			$('.name_err').html('Введите имя');
			error = true;
		} else {
			$('.name_err').hide();
			$('.name_err').html('');
			error = false;
		}
		if(mail.length < 4 || mail.indexOf('@') == -1) {
			$('.mail_err').show();
			$('.mail_err').html('Введите корректный Email');
			error = true;
		} else {
			$('.mail_err').hide();
			$('.mail_err').html('');
			error = false;
		}
		if(comm.length < 10) {
			$('.comm_err').show();
			$('.comm_err').html('Длина сообщения должна быть больше 10 знаков');
			error = true;
		} else {
			$('.comm_err').hide();
			$('.comm_err').html('');
			error = false;
		}
		if(error == true) {
			return;
		} else {
			$.ajax({
                url: 'send.php',
                type: 'POST',
                data: ({
                    name: name,
                    mail: mail,
                    comm: comm
                }),
                dataType: 'html',
                success: function(data) {
                	var info = data.split('s');
                	var color;
                	var num = $('#comments').children().length;
                	if(num % 2 == 0) {
                        color = 'blue';
                	} else {
                		color = 'green';
                	}
                	var h4;
                	var b;
                	if(color == 'blue') {
                		h4 = "<h4 class=\"head_blue\">" +  info[0] + "</h4>";
                		b = "<b class=\"mail_blue\">" +  info[1] + "</b><br><br>";
                    } else {
                		h4 = "<h4 class=\"head_green\">" +  info[0] + "</h4>";
                		b = "<b class=\"mail_green\">" +  info[1] + "</b><br><br>";
                	}
                	var span = "<span>" + info[2] + "</span>";
                	$('#comments').append("<div class=\"col-xs-12 col-sm-6 col-md-6 col-lg-4 comment\">" 
                	+ h4 + "<p class=\"comm_body\"><br>" + b + span + "</p></div>");
                }
            })
		}
	})
})