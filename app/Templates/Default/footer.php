<footer class="page-footer white">
	<div class="front container">
		<div class="about-us">
			<div class='row'>
				<div id='aboutUs' class='col s12 m6 l6'>
					<p class="title"><?php echo Language::show('contactus', 'Home'); ?></p>
					<ul>
						<li><i class="small material-icons">location_on</i><span><?php echo Language::show('address', 'Home'); ?> : 443 Lê Văn Sỹ, Tân Bình, Hồ Chí Minh</span></li>
						<li><i class="small material-icons">phonelink_ring</i><?php echo Language::show('phone', 'Home'); ?> : 0909 076 619</li>
						<li><i class="small material-icons">email</i><?php echo Language::show('email', 'Home'); ?> : purshop@gmail.com</li>
					</ul>
				</div>
				<div id='shopLocation' class='col s12 m6 l6'>
					
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<p class="copyright center-align">
		© <?php echo Language::show('copyright', 'Home'); ?> <?php echo date("Y"); ?>, <?php echo Language::show('purshop', 'Home'); ?> . <?php echo Language::show('allright', 'Home'); ?>.
		</p>
	</div>
</footer>
<!-- 	<footer class="page-footer black">
	    <div class="container">
	      <div class="row">
	        <div class="col l6 s12">
	          <h5 class="white-text">English Club</h5>
	          <p class="grey-text text-lighten-4">We are a team of Greenwich University's students working on this project like it's our full time job, and apply Scrum into the project. And this project support everyone to learn English and everything about English.</p>


	        </div>
	        <div class="col l3 s12">
	          <h5 class="white-text">University</h5>
	          <ul>
	            <li><a class="white-text" href="#!">Greenwich</a></li>
	            <li><a class="white-text" href="#!">StanFord</a></li>
	            <li><a class="white-text" href="#!">Harvard</a></li>
	          </ul>
	        </div>
	        <div class="col l3 s12">
	          <h5 class="white-text">Connect</h5>
	          <ul>
	            <li><a class="white-text" href="#!">Facebook</a></li>
	            <li><a class="white-text" href="#!">Twitter</a></li>
	            <li><a class="white-text" href="#!">Instagram</a></li>
	          </ul>
	        </div>
	      </div>
	    </div>
	    <div class="footer-copyright orange darken-4">
	      <div class="container">
	      Made by <a class="white-text text-lighten-3" href="#">Nguyễn An Cát</a>
	      </div>
	    </div>
	  </footer>

	<div id="signup" class="sm-modal modal">
	    <div class="row">
    	<div class="col s12">
		    <ul class="tabs">
		    	<li class="tab col s3"><a class="signin" href="#test1">Sign In</a></li>
		        <li class="tab col s3"><a class="signup" href="#test2">Sign Up</a></li>
		    </ul>
    	</div>
	    <div id="test1" class="col s12">
	    	<form method="post" id="signinForm" method="post">
	    		<div class="input-field">
                    <input type="text" name="username" placeholder="Username Or Email">
                </div>
                <div class="input-field">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="col s12">
	        		<span class="error col s12"></span>
	        	</div>
                <button type="button" onclick="signinForm.submit();" class="col s12 btn btn-large teal waves-effect waves-light darken-3">Sign In</button>
	    	</form>
	    </div>
	    <div id="test2" class="col s12">
	    	<form method="post" id="signupForm" method="post">
	    		<div class="input-field col s12">
                    <input type="text" class="username" name="username" placeholder="Username">
                </div>
                <div class="input-field col s12">
                    <input type="password" class="password" name="password" placeholder="Password">
                </div>
                <div class="input-field col s12">
                    <input type="password" class="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                </div>
                <div class="input-field col s12">
                    <input type="text" class="email" name="email" placeholder="Email">
                </div>
                <div class="input-field col s12">
                    <input type="text" class="fullname" name="fullname" placeholder="Full Name">
                </div>
                <div class="input-field col s12">
                    <input type="date" class="birthDate datepicker" name="birthDate" placeholder="Birthdate">
                </div>
                <div class="file-field col s12 input-field">
      				<div class="btn">
        				<span>File</span>
        				<input type="file" class="avatar" name="avatar">
      				</div>
			      	<div class="file-path-wrapper">
			        	<input class="file-path validate" type="text">
			      	</div>
    			</div>
    			<div class="col s12">
	        		<span class="success col s12"></span>
	        	</div>
                <button type="button" onclick="signupForm.submit();" class="col s12 btn btn-large teal waves-effect waves-light darken-3">Sign Up</button>
	    	</form>
	    </div>
  </div>
	</div>
<?php
    Assets::js([
        Url::templatePath().'js/main/home.min.js'
    ]);

    echo $js; //place to pass data / plugable hook zone
	echo $footer; //place to pass data / plugable hook zone
?> 
</body>
</html>
 -->