 
$('#generateotp').on('click', function(){
	var mobile_num = $('#phone-num').val();
	if (/^\d{10}$/.test(mobile_num)) {
	localStorage.setItem('myNumber', mobile_num);
    $('.mobile_field').css('display', 'none');
    $('.otp_field').css('display', 'block');
	
	}else{
		alert('Not a valid mobile num');
		}
});

if(localStorage.getItem('myNumber') != ''){
	
	$('.login').removeClass('login-user').addClass('signup-user');
}

