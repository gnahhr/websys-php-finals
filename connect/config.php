<?php
     $pdo = new PDO('mysql:host=localhost;port=3306;dbname=escafe','root','');
     
     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
     $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
?>