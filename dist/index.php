<?php include "includes/header.php"; ?>
			<!-- Banner -->
				<section id="banner" class="ban-1" style="background-image: url('https://picsum.photos/id/1/1600/484');">
					<header>
						<h2>Important title of some kind - [post_title][0]</h2>
						<a href="#" class="button">Read More</a>
					</header>
					<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					<a class="next" onclick="plusSlides(1)">&#10095;</a>
				</section>

				<section id="banner" class="ban-2" style="display:none;background-image: url('https://picsum.photos/id/2/1600/484');">
					<header>
						<h2>Important title of some kind - [post_title][1]</h2>
						<a href="#" class="button">Read More</a>
					</header>
					<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					<a class="next" onclick="plusSlides(1)">&#10095;</a>
				</section>

				<section id="banner" class="ban-3" style="display:none;background-image: url('https://picsum.photos/id/3/1600/484');">
					<header>
						<h2>Important title of some kind - [post_title][2]</h2>
						<a href="#" class="button">Read More</a>
					</header>
					<a class="prev">&#10094;</a>
					<a class="next">&#10095;</a>
				</section>

				<script type="text/javascript">
				// Change the banner every 5 seconds
				$(document).ready(function() {
				//Simple loop
					setInterval(function(){
						if($(".ban-1").is(":visible")){
							$(".ban-1").hide();$(".ban-2").show();
            } else if ($(".ban-2").is(":visible")) {
							$(".ban-2").hide();$(".ban-3").show();
            } else if ($(".ban-3").is(":visible")) {
							$(".ban-3").hide();$(".ban-1").show();
						}
    			//this code runs every 10 seconds
				}, 10000);

				//Code Buttons
				//Next
				$(".next").click(function(){
					if($(".ban-1").is(":visible")){
						$(".ban-1").hide();$(".ban-2").show();
					} else if ($(".ban-2").is(":visible")) {
						$(".ban-2").hide();$(".ban-3").show();
					} else if ($(".ban-3").is(":visible")) {
						$(".ban-3").hide();$(".ban-1").show();
					}
				});
				//Prev
				$(".prev").click(function(){
					if($(".ban-1").is(":visible")){
						$(".ban-1").hide();$(".ban-3").show();
					} else if ($(".ban-2").is(":visible")) {
						$(".ban-2").hide();$(".ban-1").show();
					} else if ($(".ban-3").is(":visible")) {
						$(".ban-3").hide();$(".ban-2").show();
					}
				});

				});
				</script>

			<!-- Highlights -->
				<section class="wrapper style1">
					<div class="container">
						<div class="row gtr-200">
							<section class="col-4 col-12-narrower">
								<div class="box highlight">
									<a href="#"><i style="background-color:#71C4CC;cursor:pointer;" class="icon solid major fa-users"></i></a>
									<a href="#"><h3>This Is Important - [section_title]</h3></a>
									<p>Duis neque nisi, dapibus sed mattis et quis, nibh. Sed et dapibus nisl amet mattis, sed a rutrum accumsan sed. Suspendisse eu. - [section_desc]</p>
								</div>
							</section>
							<section class="col-4 col-12-narrower">
								<div class="box highlight">
									<a href="#"><i style="background-color:#87CC71;cursor:pointer;" class="icon solid major fa-search-plus"></i></a>
									<a href="#"><h3>Also Important - [section_title]</h3></a>
									<p>Duis neque nisi, dapibus sed mattis et quis, nibh. Sed et dapibus nisl amet mattis, sed a rutrum accumsan sed. Suspendisse eu. - [section_desc]</p>
								</div>
							</section>
							<section class="col-4 col-12-narrower">
								<div class="box highlight">
									<a href="#"><i style="background-color:#A771CC;cursor:pointer;" class="icon solid major fa-edit"></i></a>
									<a href="#"><h3>Probably Important - [section_title]</h3></a>
									<p>Duis neque nisi, dapibus sed mattis et quis, nibh. Sed et dapibus nisl amet mattis, sed a rutrum accumsan sed. Suspendisse eu. - [section_desc]</p>
								</div>
							</section>
						</div>
					</div>
				</section>

			<!-- Gigantic Heading -->
						<iframe scrolling="no" src="ajax\horizontal_time_line.html" width="100%" height="600px;"></iframe>
			<!-- Posts -->
				<section class="wrapper style1">
					<div class="container">
						<div class="row">
							<section class="col-6 col-12-narrower">
								<div class="box post">
									<a href="#" class="image left"><img src="images/pic01.jpg" alt="" /></a>
									<div class="inner">
										<h3>Recent Post - [post_title]</h3>
										<p>Duis neque nisi, dapibus sed mattis et quis, nibh. Sed et dapibus nisl amet mattis, sed a rutrum accumsan sed. Suspendisse eu. - [post_desc]</p>
									</div>
								</div>
							</section>
							<section class="col-6 col-12-narrower">
								<div class="box post">
									<a href="#" class="image left"><img src="images/pic02.jpg" alt="" /></a>
									<div class="inner">
							<h3>Recent Post - [post_title]</h3>
										<p>Duis neque nisi, dapibus sed mattis et quis, nibh. Sed et dapibus nisl amet mattis, sed a rutrum accumsan sed. Suspendisse eu. - [post_desc]</p>
									</div>
								</div>
							</section>
						</div>
						<div class="row">
							<section class="col-6 col-12-narrower">
								<div class="box post">
									<a href="#" class="image left"><img src="images/pic03.jpg" alt="" /></a>
									<div class="inner">
							<h3>Recent Post - [post_title]</h3>
										<p>Duis neque nisi, dapibus sed mattis et quis, nibh. Sed et dapibus nisl amet mattis, sed a rutrum accumsan sed. Suspendisse eu. - [post_desc]</p>
									</div>
								</div>
							</section>
							<section class="col-6 col-12-narrower">
								<div class="box post">
									<a href="#" class="image left"><img src="images/pic04.jpg" alt="" /></a>
									<div class="inner">
							<h3>Recent Post - [post_title]</h3>
										<p>Duis neque nisi, dapibus sed mattis et quis, nibh. Sed et dapibus nisl amet mattis, sed a rutrum accumsan sed. Suspendisse eu. - [post_desc]</p>
									</div>
								</div>
							</section>
						</div>
					</div>
				</section>

			<!-- CTA -->
			<section id="cta" class="wrapper style3">
				<div class="container">
					<header>
					 <img class="logo_main" src="images/ucr_logo.png" alt="UCR Logo"></img>
					</header>
				</div>
			</section>

<?php include "includes/footer.php"; ?>
