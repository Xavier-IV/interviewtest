<!DOCTYPE html>
<html lang="en">
<head>
<title>Sneakers</title>
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
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles/responsive.css') }}">
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
					<li class="menu_mm"><a href="{{ route('jackets') }}">jacket</a></li>
					<li class="menu_mm"><a href="{{ route('sneakers') }}">sneaker</a></li>
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

	@include('inc.messages')
	<div class="boxes">
		<div class="section_container">
			<div class="container">
				<div class="row">
					<!-- Box -->
					<div class="col-lg-4 box_col">
						<div class="box">
							<div class="box_title trans_200"><a href="{{ route('createsneakers') }}">Add New Sneakers</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="products_container grid">
							
							<!-- Product -->
							@if(count($sneakers) > 0)
								@foreach($sneakers as $sneaker)
									<div class="product grid-item hot">
										<div class="product_inner">
											<div class="product_image">
												<img src="http://adam.mib-printsifu.ga/storage/app/public/image/{{$sneaker->image}}" height="370" alt="">
											</div>
											<div class="product_content text-center">
												<div class="product_title"><a href="{{ route('showsneakers', ['id' => $sneaker->id]) }}">{{$sneaker->name}}</a></div>
												<div class="product_title">{{$sneaker->brand}}</div>
												<div class="product_price">RM{{$sneaker->price}}</div>
												<div style="display:flex;">
													<div class="product_button ml-auto mr-auto trans_200"><a href="{{ route('deletesneaker', ['id' => $sneaker->id]) }}">delete</a></div>
												</div>
											</div>
										</div>	
									</div>
								@endforeach
							@else
								<p>No sneakers found!</p>
							@endif

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
<script src="{{ asset('js/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/plugins/Isotope/fitcolumns.js') }}"></script>
<script src="{{ asset('js/js/custom.js') }}"></script>
</body>
</html>