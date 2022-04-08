<?php
function getposts() {
	$db = new SQLite3("blog.db");
	$posts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 8");
	while($post = $posts->fetchArray()) {
		printf("<div class='post'>");
		printf("<h3 class='post_header'>");
		printf("<span class='post_id'>[%d] </span>", $post["id"]);
		printf("<span class='post_title'>%s</span>", $post["title"]);
		printf("</h3>");
		printf("<p class='post_content'>%s</p>", $post["content"]);
		$date = new DateTime($post["date"]);
		printf("<p class='post_date'>%s</p>",  $date->format("d/m/Y"));
		printf("</div>");
		printf("<br>");
	}
	printf("<a href='blog.db' download>blog.db</a>");
}
?>

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
			<a href="upload.php">create post</a>
		</div>
	</div>
	<div class="content">
		<?php getposts(); ?>
	</div>
</body>
</html>
