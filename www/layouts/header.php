
<?php  require 'card-f.php';?>
		<header class="header-container">
			<div class="top-nav">
				<h1 class="logo-title"><a href="index.php">Comics shop</a></h1>
			</div>
			<div class="bottom-nav">
				<div class="nav">	
				<nav class="header-nav">
					<ul class="header-nav-list">
						<li class="header-nav-item"><a href="../categori-comics.php" class="ref-menu">Комиксы</a></li>
						<li class="header-nav-item"><a href="../categori-manga.php" class="ref-menu">Манга</a></li>
						<li class="header-nav-item"><a href="../categori-book.php" class="ref-menu">Книги</a></li>
						<li class="header-nav-item"><a href="../categori-comics-en.php" class="ref-menu">Комиксы на английском</a></li>
					</ul>
				</nav>
				<a href="log.php" class="ref-menu" id="icon-user"><svg  class="icon"  aria-hidden="true" data-prefix="far" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M423.309 291.025L402.221 285C431.798 243.89 436 202.294 436 180 436 80.649 355.484 0 256 0 156.649 0 76 80.516 76 180c0 22.299 4.198 63.884 33.779 105l-21.088 6.025C21.28 310.285 0 371.59 0 408.605v25.681C0 477.138 34.862 512 77.714 512h356.571C477.138 512 512 477.138 512 434.286v-25.681c0-36.247-20.725-98.161-88.691-117.58zM256 48c72.902 0 132 59.099 132 132s-59.098 132-132 132-132-59.099-132-132S183.098 48 256 48zm208 386.286c0 16.41-13.304 29.714-29.714 29.714H77.714C61.304 464 48 450.696 48 434.286v-25.681c0-33.167 21.987-62.316 53.878-71.427l46.103-13.172C162.683 335.058 200.427 360 256 360s93.317-24.942 108.019-35.994l46.103 13.172C442.013 346.29 464 375.438 464 408.605v25.681z"></path></svg></a>
				<a href="card.php" class="ref-menu" id="icon-card" >
					<svg  class="icon"  aria-hidden="true" data-prefix="far" data-icon="shopping-cart" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
						<path fill="currentColor" d="M551.991 64H144.28l-8.726-44.608C133.35 8.128 123.478 0 112 0H12C5.373 0 0 5.373 0 12v24c0 6.627 5.373 12 12 12h80.24l69.594 355.701C150.796 415.201 144 430.802 144 448c0 35.346 28.654 64 64 64s64-28.654 64-64a63.681 63.681 0 0 0-8.583-32h145.167a63.681 63.681 0 0 0-8.583 32c0 35.346 28.654 64 64 64 35.346 0 64-28.654 64-64 0-18.136-7.556-34.496-19.676-46.142l1.035-4.757c3.254-14.96-8.142-29.101-23.452-29.101H203.76l-9.39-48h312.405c11.29 0 21.054-7.869 23.452-18.902l45.216-208C578.695 78.139 567.299 64 551.991 64zM208 472c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm256 0c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm23.438-200H184.98l-31.31-160h368.548l-34.78 160z"></path>
					</svg>
					<span class="count-card"><?php echo countProducts(); ?></span>
				</a>	
				</div>
			</div>
			<div class="banner">
					<img src="template/img/170603267001202.jpg" alt="banner" class="img-banner">
			</div>
		</header>