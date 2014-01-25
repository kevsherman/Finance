<?php

    // configuration
    require("../includes/config.php"); 

    //get users info from db

    $user = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);

//    dump($user);
    

    // render portfolio and pass in $user Array which contains all the users data from db
    render("portfolio.php", [ "title" => "Portfolio", "user" => $user  ]);

?>
