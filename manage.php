<?php
// I know this is very insecure but I cba to actually properly implement this :D
// to get sha256 of your password: https://coding.tools/sha256
$password_hash = "97D93A835E9FB1D9DA7DAC0EFDB31B90B491CBDC79B3A0012CB94A604E9CB5F1";

if(isset($_POST["post_password"]) && !empty($_POST["post_password"])) 
	$password = $_POST["post_password"];
else
	die("password was not set.");

if(strtoupper(hash("sha256", $password)) != strtoupper($password_hash))
	die("incorrect password.");

$action = $_GET["a"];
if($action == "upload")
	upload();
else if($action == "delete")
	delete();
else
	printf("unknown action.");

printf("<a href='index.php'>back to index</a>");

function upload() {
	$title = "";
	$content = "";
	$password = "";
	if(isset($_POST["post_title"]) && !empty($_POST["post_title"])) 
		$title = $_POST["post_title"];
	else
		die("post title was not set.");
	
	if(isset($_POST["post_content"])) 
		$content = $_POST["post_content"];
	
	// Remove all html tags from the post
	$title = filter_var($title , FILTER_SANITIZE_STRING);
	$content = filter_var($content , FILTER_SANITIZE_STRING);
	
	// I should probably also add some way to check that there's no SQL injection going on
	// but because this is just a single user website, only the owner of the site can really 
	// abuse this
	
	$db = new SQLite3("blog.db");
	$db->exec("INSERT INTO posts (date, title, content) VALUES (datetime('now'), '" . $title . "', '" . $content . "')");
	
	printf("Successfully created post!<br>");
}

function delete() {
	$pid = 0;
	if(isset($_POST["post_id"]) && !empty($_POST["post_id"])) 
		$pid = $_POST["post_id"];
	else
		die("post id was not set.");

	if(!filter_var($pid, FILTER_VALIDATE_INT))
		die("post id was not an integer.");

	$db = new SQLite3("blog.db");
	$db->exec("DELETE FROM posts WHERE id == " . strval($pid));

	printf("Successfully deleted post!<br>");
}
?>
