<?php
$db = new SQLite3("blog.db");
$db->exec("CREATE TABLE posts (id INTEGER PRIMARY KEY AUTOINCREMENT, date DATETIME NOT NULL, title STRING NOT NULL, content STRING)");
$db->exec("INSERT INTO posts (date, title, content) VALUES (datetime('now'), 'Database initialized', 'Successfully initialized the database!')");
printf("Successfully initialized database.\nMAKE SURE TO DELETE initdb.php NOW OR PEOPLE WILL BE ABLE TO SPAM THE DB INIT MESSAGE ON YOUR PAGE!!!");
?>
