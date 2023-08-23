<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>alternativetoHRT</title>
		<link href="images/fav-icon.png" rel="icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

	</head>
	
	<body style="background: #f8fff9; padding:100px 0px;">
  
		<table style=" border-top-right-radius: 0px;
    width: 100%;
    border-top-left-radius: 0px;cellspacing:0px;
    border-collapse: collapse;
    border-spacing: 0px 0px;
    margin: 0 auto;
    max-width: 500px;
    background: #fff;
    border: 1px solid #ccc;">
			<tbody>
			<tr style="vertical-align:middle; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc;">
			<td  colspan="2" style="padding:15px 20px 10px; width: 100%; text-align: center;">
				<img src="{{asset('frontend/images/logo.png')}}" style="width:180px;" alt="" />
			</td>
	       </tr>
	       <tr>
	       	<td colspan="2" style="padding:0px 15px 15px;"><h1>Hello!</h1></td>
	       </tr>
	       <tr>
	       <td colspan="2" style="padding:0px 15px 15px;"><p>We recieved your account password reset request.</p></td>
	       </tr>
	       <tr><td colspan="2" style="padding-bottom:0">
	       	<a href="{{ url('admin/resets-password/'.$token) }}" style="text-decoration:none;width:250px;background:green;padding:15px;display:block;color:#fff;font-weight:700;border-radius:10px;text-align:center;margin:0 auto">Reset Password</a>
	       </td></tr>

		<br>

		<tr>
			<td colspan="2" style="padding:10px 15px 15px;">This Password link will be expired in 60 days.</td>
		</tr>
		<tr>
			<td colspan="2" style="padding:0px 15px 15px;">If you did not request a reset password no furthur action is required.</td>
		</tr>
		<tr>
			<td colspan="2" style="padding:0px 15px 15px;">Regards:</td>
		</tr>
		<tr>
			<td colspan="2" style="padding:0px 15px 15px;">alternativetoHRT</td>
		</tr>
		<tr>
			<td>
				<br>
			</td>
		</tr>

		<tr>
			<td colspan="2" style="padding:0px 15px 15px;">If you have any trouble by clicking on "Reset Password Button" <br> then copy and paste the below url in your browser.</td>
		</tr>
		<tr>
			<td>
				<br>
			</td>
		</tr>

		<tr>
			<!-- <td colspan="2" style="padding:0px 15px 15px;">
				{{ url($token) }}
			</td> -->
		</tr>


		<tr><td colspan="2" style="margin:0 auto;padding:12px 30px 11px;font-family:Inter;font-style:normal;font-weight:400;font-size:12px;line-height:18px;color:#fff;width:100%;background:green;text-align:center">© Copyright All rights reserved.</td></tr>	
	</table>
		</body>
</html>