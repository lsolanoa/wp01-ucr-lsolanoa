<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>TimeLine</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css'><link rel="stylesheet" href="style.css">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-mobile/1.4.5/jquery.mobile.min.js'></script><script  src="script.js"></script>
</head>
<body>
<!-- partial:index.partial.html -->
<section class="cd-horizontal-timeline">
	<div class="timeline">
		<div class="events-wrapper">
			<div class="events">
				<ol>
					<?php 
					setlocale(LC_TIME, 'es_ES');
					//Connect to the Data Base
					include '../php/conn.php';
					//Query Entries
					$sql = "SELECT date_timeline, pages.id_page FROM timeline JOIN pages ON timeline.id_page=pages.id_page ORDER by date_timeline ASC;";
					$result = $db->query($sql);
					$x=1;
					while ($row = $result->fetch_assoc()):					
					 ?>
					<li><a href="posts.php?id=<?php echo $row['id_page']; ?>"<?php if($x==1){echo 'class="selected"';} ?> data-date="<?php echo date("d/m/Y", strtotime($row['date_timeline'])); ?>"><?php echo strftime("%b %e", strtotime($row['date_timeline'])); ?></a></li>
					<?php $x++;endwhile;?>
				</ol>

				<span class="filling-line" aria-hidden="true"></span>
			</div> <!-- .events -->
		</div> <!-- .events-wrapper -->

		<ul class="cd-timeline-navigation">
			<li><a href="#0" class="prev inactive">Prev</a></li>
			<li><a href="#0" class="next">Next</a></li>
		</ul> <!-- .cd-timeline-navigation -->
	</div> <!-- .timeline -->

	<div class="events-content">
		<ol>
			<?php 
					setlocale(LC_TIME, 'es_ES');
					//Connect to the Data Base
					include '../php/conn.php';
					//Query Entries
					$sql = "SELECT date_timeline, pages.id_page, desc_page, title_page, labels_page FROM timeline JOIN pages ON timeline.id_page=pages.id_page ORDER by date_timeline ASC;";
					$result = $db->query($sql);
					$x=1;
					while ($row = $result->fetch_assoc()):					
					 ?>
			<li <?php if($x==1){echo 'class="selected"';} ?> data-date="<?php echo date("d/m/Y", strtotime($row['date_timeline'])); ?>">
				<h2><a href="#"><?php echo $row['title_page']; ?></a></h2>
				<em><?php echo date("F d, Y", strtotime($row['date_timeline'])); ?></em>
				<p>
				<?php echo $row['desc_page']; ?>
				</p>
			</li>	
			<?php $x++;endwhile;?>
		</ol>
	</div> <!-- .events-content -->
</section>
<!-- partial -->

</body>
</html>
