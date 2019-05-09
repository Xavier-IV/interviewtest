<!DOCTYPE html>
<html lang="en">
<head>
<title>Edit jacket</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="aStar Fashion Template Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles/bootstrap-4.1.3/bootstrap.css') }}">
<link href="{{ asset('js/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles/checkout.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles/checkout_responsive.css') }}">
<link href="{{ asset('image/25.jpg') }}" type="image/png" rel="shortcut icon">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			
			<!-- Hamburger -->
			<div class="hamburger menu_mm"><i class="fa fa-bars menu_mm" aria-hidden="true"></i></div>

			<!-- Navigation -->
			<nav class="header_nav">
				<ul class="d-flex flex-row align-items-center justify-content-start">
					<li><a href="{{ route('home') }}">home</a></li>
					<li><a href="{{ route('jackets') }}">jacket</a></li>
					<li><a href="{{ route('sneakers') }}">sneaker</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-start justify-content-start menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="menu_top d-flex flex-row align-items-center justify-content-start">
		</div>
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="{{ route('home') }}">home</a></li>
				<li class="menu_mm"><a href="{{ route('jackets') }}">jacket</a></li>
				<li class="menu_mm"><a href="{{ route('sneakers') }}">sneaker</a></li>
			</ul>
		</nav>
	</div>
	
	<!-- Sidebar -->

	<div class="sidebar">

		<!-- Sidebar Navigation -->
		<nav class="sidebar_nav">
			<ul>
				<li><a href="{{ route('home') }}">home<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
				<li><a href="{{ route('jackets') }}">jacket<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
				<li><a href="{{ route('sneakers') }}">sneaker<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
			</ul>
		</nav>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/checkout.jpg" data-speed="0.8"></div>
		<div class="home_container">
			<div class="home_content">
				<div class="home_title">Edit jacket</div>
			</div>
		</div>
	</div>

	<!-- Checkout -->

	<div class="checkout">
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="checkout_container d-flex flex-xxl-row flex-column align-items-start justify-content-start">
							<!-- Billing -->
							<div class="billing checkout_box">
								<div class="checkout_form_container">
									<form action="{{ route('editjacket', ['id' => $jacket->id] )}}" method="POST" id="editform" class="checkout_form" enctype="multipart/form-data">
									@csrf
										<div class="row">
											<div class="product_image">
												<img src="http://adam.mib-printsifu.ga/storage/app/public/image/{{$jacket->image}}" alt="">
												<input type="file" name="image" id="image">
											</div>
											<div class="col-lg-6">
												<label for="checkout_name">Name of jacket</label>
												<input type="text" id="name" name="name" class="checkout_input" value="{{$jacket->name}}">
											</div>
											<div class="col-lg-6">
												<label for="checkout_last_name">Price</label>
												<input type="number" id="price" name="price" class="checkout_input" value="{{$jacket->price}}">
											</div>
										</div>
										<div>
											<label for="checkout_company">Brand of jacket</label>
											<input type="text" id="brand" name="brand" class="checkout_input"  value="{{$jacket->brand}}">
                                        </div>
									    <div class="checkout_button trans_200"><a href="#" onclick="document.getElementById('editform').submit()">Update jacket</a></div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="{{ asset('js/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('css/styles/bootstrap-4.1.3/popper.js') }}"></script>
<script src="{{ asset('css/styles/bootstrap-4.1.3/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('js/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('js/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('js/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('js/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('js/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('js/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('js/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('js/js/checkout.js') }}"></script>
</body>
</html>