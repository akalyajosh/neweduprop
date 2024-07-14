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
	if (/^\d{10}$/.test(mobile_num)) {
		localStorage.setItem('myNumber', mobile_num);
		$('.mobile_field').css('display', 'none');
		$('#featured_property_section').show();
		$('.otp_field').css('display', 'block');
		$('#signout').css('display', 'block');
		$('#loginuser').css('display', 'none');
		}else{
		alert('Not a valid mobile num');
	}
});