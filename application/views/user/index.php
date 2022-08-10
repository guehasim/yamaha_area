<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- <meta name="theme-color" content="#feed01"/> -->
<link rel="icon" href="#">
<title>Public Area</title>
<!-- <meta name="author" content="Themezinho"> -->
<!-- <meta name="description" content="For all kind of construction company website"> -->
<!-- <meta name="keywords" content="consto, business, construction, company, industrial, building, projects, corporate, apartments, flat, condo, brick, website, design, animation, transition, themezinho"> -->

<!-- CSS FILES -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/lineicons.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/odometer.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/fancybox.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/swiper.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/user/css/style.css">
</head>
<body>

    <div class="first-transition"></div>
    <!-- end first-transition -->
    <div class="page-transition"></div>
	
<nav class="navbar">
  <div class="container">
    <div class="logo"> <img src="<?php echo base_url() ?>assets/login/images/logo.png" alt="Image" style="max-width: 25%;"> </div>
    <!-- end logo -->
  </div>
  <!-- end container --> 
</nav>
<!-- end navbar -->
<header class="page-header">
  <div class="container">
    <h1 style="color: yellow;">
    	<?php foreach ($area->result() as $ad): ?>
            <?php echo $ad->nama;?>
        <?php endforeach ?>
    </h1>
  </div>
  <!-- end container --> 
</header>
<!-- end page-header -->
<section class="content-section ">
<div class="container">
<div class="row">
<!-- end col-12 -->
		<div class="col-12">
		<ul class="projects">

			<?php foreach ($item->result() as $ad): ?>
			
			<li id ="soap" class="one">
				<div data-toggle="tab" role="button" class="soap">				
					<figure class="project-box">
					<?php if ($ad->status == '1'): ?>
					 		<figcaption style="background:#0493c7">
								<h5><?php echo $ad->item;?></h5>
							</figcaption>		
	 				<?php else: ?>
	 				 	<a href="<?php echo base_url() ?>user/update?us=<?php echo $ad->ID_item;?>&uss=<?php echo $ad->ID_area;?>">
                        <figcaption style="background:#000000">
                            <h5><?php echo $ad->item;?></h5>
                        </figcaption>
                    </a>
	 				<?php endif ?>			
					</figure>
				</div>
			</li>
			<?php endforeach ?>
		</ul>
		</div>
<!-- end col-12 -->
</div>
<!-- end row --> 
</div>
<!-- end container --> 
</section>
<!-- end content-section -->
	
<footer class="footer">
	<a href="#" class="scroll-top"><i class="lni lni-arrow-up"></i>
	<small>Scroll Up</small>
	</a>
	<!-- end scroll-top -->
</footer>
<!-- end footer --> 

<!-- JS FILES --> 
<script src="<?php echo base_url() ?>assets/user/js/jquery.min.js"></script> 
<script src="<?php echo base_url() ?>assets/user/js/bootstrap.min.js"></script> 
<script src="<?php echo base_url() ?>assets/user/js/swiper.min.js"></script> 
<script src="<?php echo base_url() ?>assets/user/js/fancybox.min.js"></script> 
<script src="<?php echo base_url() ?>assets/user/js/odometer.min.js"></script> 
<script src="<?php echo base_url() ?>assets/user/js/isotope.min.js"></script> 
<script src="<?php echo base_url() ?>assets/user/js/scripts.js"></script>

<script type="text/javascript">


</script>

</body>
</html>