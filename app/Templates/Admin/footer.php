</div>
<div class="footer">
	<div class="pull-right">
		 Greenwich <strong> University</strong>.
	</div>
	<div>
		<strong>Copyright</strong> Greenwich University Saigon &copy; 2014-2015
	</div>
</div>

</div>
</div>

<?php
Assets::js([
	Url::templateAdminPath().'js/main/admin.min.js',
]);
echo $js; //place to pass data / plugable hook zone
echo $footer; //place to pass data / plugable hook zone
?>

</body>
</html>
