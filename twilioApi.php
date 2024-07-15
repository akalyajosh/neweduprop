<?php
	
	if(isset($_POST)){
		$function = $_POST['functionname'];
		if($function == "sendOtp"){
			$phone_num = $_POST['phnum'];
			sendOtp($phone_num);
		}
		
		if($function == "verifyOtp"){
			$code = $_POST['code'];
			$phone_num = $_POST['phnum'];
			verifyOtp($phone_num, $code);
		}
		
	}
	
	function sendOtp($phone_num){
		
		$username = 'AC12b222794ca57d32fd6924dc42026c57';
		$password = '8b19f930add778c1fbc8cabb90f250ba';
		
		$auth = $username.":".$password;
		
		$sid = "VA65b5b0acb1d5eaf8b75add92bd208f49";
		
		$url = "https://verify.twilio.com/v2/Services/". $sid;
	
		$api_url = $url . "/Verifications";
		
		$param = [
			'To' => $phone_num,
			'Channel' => 'sms'
		];
		
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, $auth);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param);

		$result = curl_exec($ch);
		
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		if($httpcode == 200){
			$response = ['success' => $httpcode, 'response' => $result];
		}else{
			$response = ['error' => $httpcode, 'response' => $result];
		}
		
		curl_close($ch);
		
		echo json_encode($response);
		
	}
	
	function verifyOtp($phone_num, $code)
	{
		$username = 'AC12b222794ca57d32fd6924dc42026c57';
		$password = '8b19f930add778c1fbc8cabb90f250ba';
		
		$auth = $username.":".$password;
		
		$sid = "VA65b5b0acb1d5eaf8b75add92bd208f49";
		
		$url = "https://verify.twilio.com/v2/Services/". $sid . "/VerificationCheck";
		
		$param = [
			'To' => $phone_num,
			'Code' => $code
		];
		
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, $auth);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $param);

		$response = curl_exec($ch);
	
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		if($httpcode == 200){
			$response = ['success' => $httpcode, 'response' => $result];
			
		}else{
			$response = ['error' => $httpcode, 'response' => $result];
		}
		
		curl_close($ch);
		echo json_encode($response);
	
	}
	
