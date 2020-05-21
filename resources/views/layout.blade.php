<!DOCTYPE html>
<html>
<head>
	<title>Receipe Blog</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>

	<div class="site-wrap">
		<div class="site-mobile-menu">
			<div class="site-mobile-menu-header">
				<div class="site-mobile-menu-close mt-3">
					<span class="icon-close2 js-menu-toggle"></span>
				</div>
			</div>
			<div class="site-mobile-menu-body"></div>
		</div>

		<header class="site-navbar" role="banner">

			<div class="container">
				<div class="row align-items-center">
				
				<div class="col-11 col-xl-2">
					<h1 class="mb-0 site-logo"><a href="index.html" class="text-white h2 mb-0">QuaratineCamp</a></h1>
				</div>
				<div class="col-12 col-md-10 d-none d-xl-block">
					<nav class="site-navigation position-relative text-right" role="navigation">

					<ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
						<li class="active"><a href="{{url('/home')}}"><span>Home</span></a></li>
						<li><a href="{{url('/getAllLists')}}"><span>QLists</span></a></li>
						<li><a href="{{url('/getAllVolunteers')}}"><span>Volunteers</span></a></li>
						<li><a href="blog.html"><span>Blog</span></a></li>
						<li><a href="contact.html"><span>Contact</span></a></li>
					</ul>
					</nav>
				</div>
					<div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a>
					</div>
				</div>

				</div>
			</div>
	
		</header>

		@yield('content')
		@yield('data')

		<div class="container-fluid text-white bg-primary text-center" style="padding:50px;">
			<p style="margin-bottom:0rem;">
			Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with by <a href="https://colorlib.com" target="_blank" class="text-dark">Colorlib</a>
			</p>
		</div>
	</div>

	<script src="{{asset('js/jquery.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<script>
		$(document).ready(function(){
			$('select[name="city"]').on('change',function(){
				var cityID = $(this).val();

				if(cityID){
					$.ajax({
						url : '/getTownships/' + cityID,
                        type : 'GET',
                        datatype : 'json',
                        success : function(data){
							data = JSON.parse(data);
							$('select[name="township"]').empty();
							$.each(data, function(key, value){
								$('select[name="township"]').append('<option value="'+key+'">' + value + '</option>');
							});
						}
					});
				}
				else{
                    $('select[name="township"]').empty();   
                }
			});
		});
	</script>

	<script>
		$("#search").on("click",function(){
			var link = document.getElementById('township').value;
			$.ajax({
				url : window.location.href = "getData/" + link
			});
		});
	</script>

</body>
</html>