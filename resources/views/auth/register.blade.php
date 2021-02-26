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
                <h3 class=" text-center my-3">Register</h3>
                <hr>
                <form method="POST" action="{{ route('register') }}" class="p-3">
                    @csrf
                    <input type="hidden" name="role_id" value="3">
                    <div class="container my-2">
                        <span class="label-input100">Registration Number</span>
                        <div class="row">
                            <div class="col-md-4">
                                <select name="batch" class="form-group col-12">
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
                                <select name="program" class="form-group col-12">
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
                    <div class=" form-group">

                        <input type="text" class=" form-control" name="name" placeholder="Enter your name...">
                        @if($errors->has('name'))
                        <p class=" text-danger">
                            {{$errors->first('name')}}
                        </p>
                        @endif
                    </div>
                    <div class=" form-group">

                        <input type="email" class=" form-control" name="email" placeholder="Enter your email...">
                    </div>
                    <div class=" form-group">

                        <input type="password" class=" form-control" id="password" name="password" placeholder="Enter your password...">
                    </div>
                    <div class=" form-group">

                        <input type="password" class=" form-control" id="cpassword" name="password_confirmation" placeholder="Confirm password...">
                        <div id="error" class=" text-danger"></div>
                    </div>
                    <div class=" form-group">

                        <input type="text" class=" form-control" name="section" placeholder="Enter your section...">
                    </div>
                    <div class=" form-group">
                        <select class=" form-control" name="semester">
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="4th">4th</option>
                            <option value="5th">5th</option>
                            <option value="6th">6th</option>
                            <option value="7th">7th</option>
                            <option value="8th">8th</option>
                            <option value="9th">9th</option>
                            <option value="10th">10th</option>
                            <option value="11th">11th</option>
                            <option value="12th">1st</option>
                        </select>
                    </div>
                    <div class=" form-group">
                        <select class=" form-control" name="department">
                            <option value="CS">CS</option>
                            <option value="ME">ME</option>
                            <option value="CE">CE</option>
                            <option value="BBA">BBA</option>
                            <option value="BAF">BAF</option>
                            <option value="SE">SE</option>
                            <option value="EE">EE</option>

                        </select>
                    </div>
                    <div class=" text-center">
<button type="submit" class=" btn btn-info">
                            Submit
                        </button>

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
    <script>
        $(document).ready(function(){

            $('#cpassword').on('keyup',function(){
                // console.log($(this).val());

                var pass=$('#password').val();
                console.log(pass);
                if($(this).val() !=pass){
                    $('#error').text('Passwords dont match');
                }
                else{
                    $('#error').text('');
                }


            });
        })
    </script>
</body>
</html>

