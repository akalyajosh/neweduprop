$(window).on('load',function(){
	if(localStorage.getItem('myNumber') == '' || localStorage.getItem('myNumber') == null){
		$('#myModal').modal('show');
		$('#featured_property_section').hide();
		$('#signout').css('display', 'none');
		$('#loginuser').css('display', 'block');
		}else{
		$('#myModal').modal('hide');
		$('#featured_property_section').show();
		$('#signout').css('display', 'block');
		$('#loginuser').css('display', 'none');
	}
});
$('#loginuser').on('click', function(){
	$('#myModal').modal('show');	
});
$('#signout').on('click', function(){
	localStorage.removeItem('myNumber');
	location.reload();
});
$('#generateotp').on('click', function(){
	var mobile_num = $('#phone-num').val();
	$.ajax({
		url: './api/twilioApi.php',
		type: 'POST',
		data: {
			functionname: 'sendOtp',
			phnum: mobile_num
		},
		dataType:'json',
		success: function(response){
			var jsonResponse = JSON.parse(response);
			localStorage.setItem('myNumber', mobile_num);
			$('.mobile_field').css('display', 'none');
			$('.otp_field').css('display', 'block');
			$('#signout').css('display', 'block');
			$('#loginuser').css('display', 'none');
		},
		error: function(jqXHR, textStatus, errorThrown){
			console.log(textStatus, errorThrown);
		}
	});
});
$('#verify_otp').on('click', function(e){
	e.preventDefault();
	var otp = $('#verify-otp').val();
	var phone =  $('#phone-num').val();
	$.ajax({
		url: './api/twilioApi.php',
		type: 'POST',
		data: {
			functionname: 'verifyOtp',
			code: otp,
			phnum: phone
		},
		success: function(response){
			var jsonResponse = JSON.parse(response);
			$('#featured_property_section').show();
		},
		error: function(jqXHR, textStatus, errorThrown){
			console.log(textStatus, errorThrown);
		}
	});
}); 
