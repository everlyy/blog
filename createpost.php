<?php
// I know this is very insecure but I cba to actually properly implement this :D
// to get sha256 of your password: https://coding.tools/sha256
// Default password is meow!
$password_hash = "97D93A835E9FB1D9DA7DAC0EFDB31B90B491CBDC79B3A0012CB94A604E9CB5F1";

$title = "";
$content = "";
$password = "";
if(isset($_POST["post_title"]) && !empty($_POST["post_title"])) 
	$title = $_POST["post_title"];
else
	die("post title was not set.");

if(isset($_POST["post_content"])) 
	$content = $_POST["post_content"];

if(isset($_POST["post_password"]) && !empty($_POST["post_password"])) 
	$password = $_POST["post_password"];
else
	die("password was not set.");

if(strtoupper(hash("sha256", $password)) != strtoupper($password_hash))
	die("incorrect password.");

// Remove all html tags from the post
$title = filter_var($title , FILTER_SANITIZE_STRING);
$content = filter_var($content , FILTER_SANITIZE_STRING);

// I should probably also add some way to check that there's no SQL injection going on
// but because this is just a single user website, only the owner of the site can really 
// abuse this

$db = new SQLite3("blog.db");
$db->exec("INSERT INTO posts (date, title, content) VALUES (datetime('now'), '" . $title . "', '" . $content . "')");

printf("Successfully created post!<br>");
printf("<a href='index.php'>back to index</a>");
?>
