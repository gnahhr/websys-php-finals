<?php
     $pdo = new PDO('mysql:host=localhost;port=3306;dbname=escafe','root','');
     
     //FETCH ASSOC
     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
     //ERROR HANDLING
     $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     //SITE SETTINGS
     $statement = $pdo -> prepare ("SELECT * FROM sitesettings");
     $statement -> execute([]);
     $site = $statement -> fetch(0);

     $siteName = $site['siteName'];
     $siteLogo = $site['siteLogo'];
     $balance = $site['balance'];
?>