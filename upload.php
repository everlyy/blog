<!DOCTYPE html>
<html>
<head>
	<title>everly's blog thing</title>
	<link href="style.css" rel="stylesheet">
</head>
<body>
	<div class="topbar">
		<p>everly's blog thing</p>
		<div class="links">
			<a href="index.php">index</a>
		</div>
	</div>
	<div class="content">
		<h3>create post</h3>
		<form action="createpost.php" id="uploadform" method="post">
			title<br><input type="text" name="post_title"><br>
			post content<br><textarea name="post_content" form="uploadform" rows="8" cols="48"></textarea><br>
			password<br><input type="password" name="post_password"><br>
			<input type="submit" value="post">
		</form>
	</div>
</body>
</html>
