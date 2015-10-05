<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Page Not Found.</title>
		<link rel="stylesheet" media="screen" href="<?=BASEURL;?>/base/css/error.css">
		
		<script language="JavaScript">
			function dosearch() {
			var sf=document.searchform;
			var submitto = sf.sengine.value + escape(sf.searchterms.value);
			window.location.href = submitto;
			return false;
			}
		</script>
	</head>
	<body>
		
		<div class="header"></div>
		
		<p class="error">404</p>
		
		<div class="content">
			<h2>Page Not Found</h2>
			
			<p class="text">
				<form name="searchform" onSubmit="return dosearch();">
					<input type="hidden" name="sengine" value="http://www.baidu.com/s?tn=<?php echo DOMAIN; ?>&word=+" />
					<input type="text" name="searchterms" class="inputform">
					<input type="submit" name="SearchSubmit" value="Search" class="button"> 
				</form>
			</p>
				
			<p class="links">
				<a id="button" href="<?php echo HTTP.DOMAIN; ?>">&larr; Back</a>
				<a href="<?php echo HTTP.DOMAIN; ?>">Home</a> 
		</div>
		
	</body>
</html>