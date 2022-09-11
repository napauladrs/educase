<?php

    $db = new PDO('sqlite:database/db.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $res = $db->exec(
        "CREATE TABLE IF NOT EXISTS `USERS` (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL,
        email TEXT NOT NULL,
        cpf NUMBER,
        idade NUMBER,
        objetivo NUMBER,
        tempo NUMBER,
        password TEXT NOT NULL
        )"      
    );
?>