<!DOCTYPE html>
<html lang="en">
<head>
	<title>Student Console</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
<!--===============================================================================================-->
</head>
<body style=" background-image: url(./css/bg.jpg);">
<div class="container">
<img src="./css/logo_with_text.png">
</div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						<img src="./css/studentdark.png" class="img-fluid">
					</span>
				</div>

				<form class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <div class="container">
                            <span class="label-input100">Registration Number</span>
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="batch" class="form-group">
                                        <option value="Fa10">Fa20</option>
                                        <option value="Sp20">Sp20</option>
                                        <option value="Fa19">Fa19</option>
                                        <option value="Sp19">Sp19</option>
                                        <option value="Fa18">Fa18</option>
                                        <option value="Sp18">Sp18</option>
                                        <option value="Fa17">Fa17</option>
                                        <option value="Sp17">Sp17</option>
                                        <option value="Fa16">Fa16</option>
                                        <option value="Sp16">Sp16</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="program" class="form-group">
                                        <option value="BCS">BCS</option>
                                        <option value="BSE">BSE</option>
                                        <option value="BEE">BEE</option>
                                        <option value="BBA">BBA</option>
                                        <option value="BAF">BAF</option>
                                        <option value="BME">BME</option>
                                        <option value="BCE">BCE</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="reg" >
                                </div>
                            </div>
                            </div>
                        <div class="d-flex flex-row bd-highlight mb-3">

                        <div class="d-flex flex-row">

                        <span class="focus-input100"></span>
                        <div class="wrap-input100 validate-input m-b-26">


                            <span class="focus-input100"></span>
                        </div>

                    </div>

                    </div>
                    </div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
                            </a><br>
                            <a href="#" class="txt1">
                                Signup
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
