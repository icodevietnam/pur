<footer class="page-footer white">
	<div class="front container">
		<div class="about-us">
			<div class='row'>
				<div id='contactUs' class='col s12 m6 l6'>
					<p class="title"><?php echo Language::show('contactus', 'General'); ?></p>
					<span class='hide address'></span>
					<ul>
						<li><i class="small material-icons">location_on</i><span><?php echo Language::show('address', 'General'); ?> : 443 Lê Văn Sỹ, Tân Bình, Hồ Chí Minh</span></li>
						<li><i class="small material-icons">phonelink_ring</i><span><?php echo Language::show('phone', 'General'); ?> : 0909 076 619 </span></li>
						<li><i class="small material-icons">email</i><span><?php echo Language::show('email', 'General'); ?> : purshop@gmail.com</span></li>
					</ul>
					<ul class="social-network">
						<li><a href="#"><i class="fa fa-2x fa-facebook-square " aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-2x fa-google-plus-square" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div id='shopLocation' onload="General.showtext();" class='col s12 m6 l6'>
					<div class='col s12 m6 l6' id='shopMap'></div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<p class="copyright center-align">
		© <?php echo Language::show('copyright', 'General'); ?> <?php echo date("Y"); ?>, <?php echo Language::show('purshop', 'General'); ?> . <?php echo Language::show('allright', 'General'); ?>.
		</p>
	</div>
</footer>
<?php
    Assets::js([
        Url::templatePath().'js/main/home.min.js',
        Url::templatePath().'js/page/general.js',
    ]);

    echo $js; //place to pass data / plugable hook zone
	echo $footer; //place to pass data / plugable hook zone
?> 
</body>
</html>