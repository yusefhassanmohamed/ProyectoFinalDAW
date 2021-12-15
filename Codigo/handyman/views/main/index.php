<?php include 'views/partials/nav.php' ?>
<link rel="stylesheet" href="views/public/styles/mainStyles.css">
<div class="carousel slide" data-bs-ride="carousel" id="carouselExampleIndicators">
		<div class="carousel-indicators">
			<button aria-label="Slide 1" class="active" data-bs-slide-to="0" data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators" type="button"></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img alt="..." class="d-block w-100" src="views/public/images/tecnico2.webp">
				<div class="carousel-caption">
					<h5 class="animated fadeInDown" style="animation-delay: 1s">Eficiencia</h5>
					<p class="animated fadeInUp d-none d-md-block" style="animation-delay: 2s">Una de nuestras cualidades es la rapidez y eficiencia de nuestros trabajos. No solo nos adaptamos a tu horario sino que también trabajamos en tiempo record.</p>
					<p class="animated fadeInUp" style="animation-delay: 3s"><a href="index.php?c=Usuario&a=sobreNosotros">Saber más</a></p>
				</div>
			</div>
			<div class="carousel-item">
				<img alt="..." class="d-block w-100" src="views/public/images/tecnico1.jpg">
				<div class="carousel-caption">
					<h5 class="animated fadeInDown" style="animation-delay: 1s">Evolución</h5>
					<p class="animated fadeInUp d-none d-md-block" style="animation-delay: 2s">Somos una empresa que empatiza con el cliente. Mejoramos día a día formando a nuestros expertos y expertas para estar al tanto de todas los avances tecnológicos.</p>
					<p class="animated fadeInUp" style="animation-delay: 3s"><a href="index.php?c=Usuario&a=sobreNosotros">Saber más</a></p>
				</div>
			</div>
			<div class="carousel-item">
				<img alt="..." class="d-block w-100" src="views/public/images/tecnico3.jpg">
				<div class="carousel-caption">
					<h5 class="animated fadeInDown" style="animation-delay: 1s">Calidad</h5>
					<p class="animated fadeInUp d-none d-md-block" style="animation-delay: 2s">Orgullosos de tener a los mejores técnicos del mercado. Con años de experiencia y un basto currículum, tus electrodomésticos estarán en las mejores manos.</p>
					<p class="animated fadeInUp" style="animation-delay: 3s"><a href="index.php?c=Usuario&a=sobreNosotros">Saber más</a></p>
				</div>
			</div>
		</div><button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="visually-hidden">Previous</span></button> <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="visually-hidden">Next</span></button>
	</div>
<?php include 'views/partials/footer.php' ?>
