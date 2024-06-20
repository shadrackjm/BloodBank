<!DOCTYPE html>
<html lang="eng">

<head>
	<title>Blood Donation System| Home Page</title>

	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<!-- Custom-Files -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="{{ asset('css/fontawesome-all.css')}}">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //Web-Fonts -->

</head>

<body>
    {{-- include header --}}


    <!-- header 2 -->
    <div id="home">
        <!-- navigation -->
        <div class="main-top py-1">
            <nav class="navbar navbar-expand-lg navbar-light fixed-navi">
                <div class="container">
                    <!-- logo -->
                    <h6>

                            <span style="color: rgb(230, 19, 19); font-size: 20px; font-family: Arial, sans-serif;"><i>Blood Donation system</i></span>
                    </h6>
                    <!-- //logo -->
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item active mt-lg-0 mt-3">
                                <a class="nav-link" href="/">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item mx-lg-4 my-lg-0 my-3">
                                <a class="nav-link" href="/register" style="color: rgb(29, 8, 8); font-family: Arial, sans-serif; font-size: 20px;"><b>Register</b></a>

                            </li>
                        </ul>
                        <!-- login -->
                        <a href="/login" class="login-button ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3" >
                            <i class="fas fa-sign-in-alt mr-2"></i>Login</a><?php// } ?>
                        <!-- //login -->
                    </div>
                </div>
            </nav>
        </div>
        <!-- //navigation -->
        <!-- modal -->

        <!-- register -->
        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-2">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="login px-4 mx-auto mw-100">
                            <h5 class="text-center mb-4">Register Now</h5>
                            <form action="#" method="post"  name="signup" onsubmit="return checkpass();">
                                <div class="form-group">
                                    <label>Full Name</label>
                                     <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <label>Mobile Number</label>
                                    <input type="text" class="form-control" name="mobileno" id="mobileno" required="true" placeholder="Mobile Number" maxlength="10" pattern="[0-9]+">
                                </div>

                                <div class="form-group">
                                    <label class="mb-2">Email Id</label>
                                    <input type="email" name="emailid" class="form-control" placeholder="Email Id">
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Age</label>
                                    <input type="text" class="form-control" name="age" id="age" placeholder="Age" required="">
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Gender</label>
                                    <select name="gender" class="form-control" required>
<option value="">Select</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Blood Group</label>
                                    <select name="bloodgroup" class="form-control" required>

                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" id="address" required="true" placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" name="message" required> </textarea>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required="">
                                </div>

                                <button type="submit" class="btn btn-primary submit mb-4" name="submit">Register</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //register -->
        <!-- //modal -->
    </div>
    <!-- //header 2 -->

	<!-- banner -->
	<div class="slider">
		<div class="callbacks_container">
			<ul class="rslides callbacks callbacks1" id="slider4">
				<li>
					<div class="banner-top1">
						<div class="banner-info_agile_w3ls">
							<div class="container">
								<h3 style="font-family: 'Arial', sans-serif; color: #0e0b0b; text-align: center; position: relative; padding: 20px;">
                                    <span style="display:block; font-size:20; font-weight: bold; margin-bottom: 10px; animation: fadeIn 2s ease-in-out;">Welcome to blood donation service</span>
                                    <br>
                                    <span style="display: block; font-size:20; color: #8F0B0B; animation: fadeIn 4s ease-in-out;">Once a blood donor, forever a life saver.</span>
                                    <div style="content: ''; display: block; width: 250px; height: 3px; background: linear-gradient(to right, #8F0B0B, #110E07); margin: 10px auto 0; animation: expand 2s ease-in-out;"></div>
                                </h3>
                            </style>
                            <style>
                                @keyframes fadeIn {
                                    from {
                                        opacity: 0;
                                        transform: translateY(-20px);
                                    }
                                    to {
                                        opacity: 1;
                                        transform: translateY(0);
                                    }
                                }
                                @keyframes expand {
                                    from {
                                        width: 0;
                                    }
                                    to {
                                        width: 100px;
                                    }
                                }
                            </style>



							</div>
						</div>
					</div>
				</li>


			</ul>
		</div>
	</div>
	<!-- //banner -->
	<div class="clearfix"></div>

	<!-- banner bottom -->
	<div class="banner-bottom py-5">
		<div class="d-flex container py-xl-3 py-lg-3">
			<div class="banner-left-bottom-w3ls offset-lg-2 offset-md-1">
			<h3 class="text-white my-3"><br><br>High professional doctors</h3>
                <br>
				<p style="color: black"><b>All specialists have extensive practical experience and regularly training courses in educational centers of the
					world</b></p>
			</div>

		</div>
	</div>
	<!-- //banner bottom -->
	<!-- blog -->
	<div class="container-fluid">
        <div class="row">
            <h1 class="card-title text-center my-3">Some of Our Donor</h1>
            @foreach ($all_donors as $item)
                @if ($item->is_public == 1)
                    <div class="card col-md-3 m-2">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            @if (empty($item->image))
                            <img src="{{asset('images/blood-donor.jpg')}}" alt="Profile" class="rounded-circle" height="70px" width="70px">
                            @else
                            <img src="{{ Storage::url($item->image) }}" alt="Profile" class="rounded-circle" height="70px" width="70px">
                            @endif
                            <h2>{{$item->name}}</h2>
                        </div>
                    </div>
                @endif
                
            @endforeach
        </div>
    </div>
	<!-- //blog -->

	<!-- treatments -->
	<div class="screen-w3ls py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="w3ls-titles text-center mb-5">
				<h3 class="title">BLOOD GROUPS</h3>
				<span>
					<i class="fas fa-user-md"></i>
				</span>
				<p class="mt-2">blood group of any human being will mainly fall in any one of the following groups..</p>
			</div>
			<div class="row">
            <div class="col-lg-6">

                <ul>


<li>A positive or A negative</li>
<li>B positive or B negative</li>
<li>O positive or O negative</li>
<li>AB positive or AB negative.</li>
                </ul>
                <p>A healthy diet helps ensure a successful blood donation, and also makes you feel better! Check out the following recommended foods to eat prior to your donation.</p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="{{asset('images/blood-donor (1).jpg')}}" alt="">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-8">
            <h4 style="padding-top: 30px;">UNIVERSAL DONORS AND RECIPIENTS</h4>
                <p>
The most common blood type is O, followed by type A.

Type O individuals are often called "universal donors" since their blood can be transfused into persons with any blood type. Those with type AB blood are called "universal recipients" because they can receive blood of any type.</p>
            </div>
            <div class="col-md-4" style="padding-top: 30px;">

                <a class="btn btn-lg btn-secondary btn-block login-button ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3"  href="/register" > Become a Donar</a>
            </div>
        </div>
		</div>
	</div>
	<!-- //treatments -->

	<!-- footer -->
	<footer>
    <div class="w3ls-footer-grids pt-sm-4 pt-3">
      <div class="container py-xl-5 py-lg-3">
        <div class="row">
          <div class="col-md-4 w3l-footer">
            <h2 class="mb-sm-3 mb-2">
              <a href="/" class="text-white font-italic font-weight-bold">
                <span>Blood Donation System</span>
                <i class="fas fa-syringe ml-2"></i>
              </a>
            </h2>
            <p>
                Donating blood is a simple yet powerful act that saves lives. With just a small amount of your time, you can provide a lifeline to accident victims, surgery patients, and those battling chronic illnesses. Our safe and efficient blood donation system ensures your contribution makes a real difference. Be a hero in your community—donate blood today and help save lives.</p>
          </div>

          <div class="col-md-4 w3l-footer">
            <h3 class="mb-sm-3 mb-2 text-white">Quick Links</h3>
            <div class="nav-w3-l">
              <ul class="list-unstyled">
                <li>
                  <a href="/">Home</a>
                </li>
                <li class="mt-2">
                  <a href="/login">Login if your a member</a>
                </li>
                <li class="mt-2">
                  <a href="/register">Register Now!</a>
                </li>

              </ul>
            </div>
          </div>
        </div>
        <div class="border-top mt-5 pt-lg-4 pt-3 pb-lg-0 pb-3 text-center">
          <p class="copy-right-grids mt-lg-1">©  Blood Donation System

          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- //footer -->


	<!-- Js files -->
	<!-- JavaScript -->
	<script src="{{asset('js/jquery-2.2.3.min.js')}}"></script>
	<!-- Default-JavaScript-File -->

	<!-- banner slider -->
	<script src="{{asset('js/responsiveslides.min.js')}}"></script>
	{{-- <script>
		$(function () {
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 1000,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});
		});
	</script> --}}
	<!-- //banner slider -->

	<!-- fixed navigation -->
	<script src="{{ asset('js/fixed-nav.js')}}"></script>
	<!-- //fixed navigation -->

	<!-- smooth scrolling -->
	<script src="{{asset('js/SmoothScroll.min.js')}}"></script>
	<!-- move-top -->
	<script src="{{ asset('js/move-top.js')}}"></script>
	<!-- easing -->
	<script src="{{ asset('js/easing.js')}}"></script>
	<!--  necessary snippets for few javascript files -->
	<script src="{{ asset('js/medic.js')}}"></script>

	<script src="{{ asset('js/bootstrap.js')}}"></script>
	<!-- Necessary-JavaScript-File-For-Bootstrap -->

	<!-- //Js files -->

</body>

</html>
