<?php

    //    Connexion à la base de données
    $pdo = new PDO
    (
        'mysql:host=localhost;dbname=DMF;charset=UTF8',
        'root',
        'resomar12',
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
   );