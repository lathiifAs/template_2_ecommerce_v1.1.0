<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login</title>
	<link rel="icon" href="img/favicon.png') }}">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ base_url('assets/client_template/css/bootstrap.min.css') }}">
	<!-- animate CSS -->
	<link rel="stylesheet" href="{{ base_url('assets/client_template/css/animate.css') }}">
	<!-- owl carousel CSS -->
	<link rel="stylesheet" href="{{ base_url('assets/client_template/css/owl.carousel.min.css') }}">
	<!-- font awesome CSS -->
	<link rel="stylesheet" href="{{ base_url('assets/client_template/css/all.css') }}">
	<link rel="stylesheet" href="{{ base_url('assets/client_template/css/nice-select.css') }}">
	<!-- flaticon CSS -->
	<link rel="stylesheet" href="{{ base_url('assets/client_template/css/flaticon.css') }}">
	<link rel="stylesheet" href="{{ base_url('assets/client_template/css/themify-icons.css') }}">
	<!-- font awesome CSS -->
	<link rel="stylesheet" href="{{ base_url('assets/client_template/css/magnific-popup.css') }}">
	<!-- swiper CSS -->
	<link rel="stylesheet" href="{{ base_url('assets/client_template/css/slick.css') }}">
	<!-- swiper CSS -->
	<link rel="stylesheet" href="{{ base_url('assets/client_template/css/price_rangs.css') }}">
	<!-- style CSS -->
	<link rel="stylesheet" href="{{ base_url('assets/client_template/css/style.css') }}">
</head>

<body class="bg-white">
	<!--::header part start::-->
	<header class="main_menu home_menu">
		<div class="container-fluid">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-11">
				</div>
			</div>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container ">
				<form class="d-flex justify-content-between search-inner">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="ti-close" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- Header part end-->

	<!--================Home Banner Area =================-->
	<!-- breadcrumb start-->
	<section class="breadcrumb breadcrumb_bg">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="breadcrumb_iner">
						<div class="breadcrumb_iner_item">
							<p>Daftar</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- breadcrumb start-->

	<!--================login_part Area =================-->
	<section class="login_part section_padding">
		<div class="container">
			<div class="row align-items-center">

                <!-- tampilan mobile -->
                <div class="col-lg-6 col-md-6 d-lg-none d-block">
                </div>
                <!-- tampilan website -->
                <div class="col-lg-6 col-md-6  d-none d-lg-block">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>ECO RACING ADALAH PELUANG  BISNIS TERBAIK TAHUN INI</h2>
                            <p>Daftar dan gabung bersama kami?</p>
                        </div>
                    </div>
                </div>
				<div class="col-lg-6 col-md-6">
					<div class="login_part_form">
						<div class="login_part_form_iner">
							{{-- notif --}}
							@include('template/notif')
							<h3>Daftar Akun<br></h3>
							<form action="{{ site_url('sistem/register/register_process') }}" method="post">
								<div class="col-md-12 form-group p_star">
									<input type="text" class="form-control" type="nama" name="nama" placeholder="Nama">
								</div>
								<div class="col-md-12 form-group p_star">
									<input type="text" class="form-control" id="alamat" name="alamat" value=""
										placeholder="Alamat">
								</div>
								<div class="col-md-12 form-group p_star">
									<select name="jns_kelamin" class="form-control select2 wide">
										<option value="L">Laki-laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
								<div class="col-md-12 form-group p_star">
									<input type="text" class="form-control" id="hp" name="hp" value=""
										placeholder="No Hp">
								</div>
								<!-- <div class="col-md-12 form-group p_star">
									<input type="text" class="form-control" type="username" name="username"
										placeholder="Username">
								</div>
								<div class="col-md-12 form-group p_star">
									<input type="password" class="form-control" id="password" name="password" value=""
										placeholder="Password">
								</div> -->
								<div class="col-md-12 form-group p_star">
									<input type="text" class="form-control" type="email" name="email"
										placeholder="Email">
								</div>
								<div class="col-md-12 form-group">
									<button type="submit" value="submit" class="btn_3">
										Daftar
									</button>
									<a href="{{ site_url('sistem/login') }}"> <button type="button" value="beranda"
											style="margin-top:-3;background-color:grey" class="btn_3">
											Masuk
										</button> </a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================login_part end =================-->
	<!--::footer_part start::-->
	<footer class="footer_part">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="copyright_text">
						<P>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script> All rights reserved | <a href="https://masruri-sabdagurugpmc.com"
								target="_blank">masruri-sabdagurugpmc.com</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</P>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--::footer_part end::-->

	<!-- jquery plugins here-->
	<!-- jquery -->
	<script src="{{ base_url('assets/client_template/js/jquery-1.12.1.min.js') }}"></script>
	<!-- popper js -->
	<script src="{{ base_url('assets/client_template/js/popper.min.js') }}"></script>
	<!-- bootstrap js -->
	<script src="{{ base_url('assets/client_template/js/bootstrap.min.js') }}"></script>
	<!-- easing js -->
	<script src="{{ base_url('assets/client_template/js/jquery.magnific-popup.js') }}"></script>
	<!-- swiper js -->
	<script src="{{ base_url('assets/client_template/js/swiper.min.js') }}"></script>
	<!-- swiper js -->

	<!-- particles js -->
	<script src="{{ base_url('assets/client_template/js/owl.carousel.min.js') }}"></script>
	<script src="{{ base_url('assets/client_template/js/jquery.nice-select.min.js') }}"></script>
	<!-- slick js -->
	<script src="{{ base_url('assets/client_template/js/slick.min.js') }}"></script>
	<script src="{{ base_url('assets/client_template/js/jquery.counterup.min.js') }}"></script>
	<script src="{{ base_url('assets/client_template/js/waypoints.min.js') }}"></script>
	<script src="{{ base_url('assets/client_template/js/contact.js') }}"></script>
	<script src="{{ base_url('assets/client_template/js/jquery.ajaxchimp.min.js') }}"></script>
	<script src="{{ base_url('assets/client_template/js/jquery.form.js') }}"></script>
	<script src="{{ base_url('assets/client_template/js/jquery.validate.min.js') }}"></script>
	<script src="{{ base_url('assets/client_template/js/mail-script.js') }}"></script>
	<script src="{{ base_url('assets/client_template/js/stellar.js') }}"></script>
	<script src="{{ base_url('assets/client_template/js/price_rangs.js') }}"></script>
	<!-- custom js -->
	<script src="{{ base_url('assets/client_template/js/custom.js') }}"></script>
</body>

</html>