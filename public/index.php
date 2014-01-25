<?php

    // configuration
    require("../includes/config.php"); 

    //get users info from db table 'users'
    $user = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
    
    //get users stock holdings from table 'stocks'
    $rows = query("SELECT * FROM stocks WHERE id = ?", $_SESSION["id"]);

    $positions = [];

        //iterate through each row returned from 'stocks' table, and assign the data to $positions Array
        foreach ($rows as $row)
        {
            $stock = lookup($row["symbol"]);
            if ($stock !== false)
            {
                $positions[] = [
                    "name" => $stock["name"],
                    "price" => $stock["price"],
                    "shares" => $row["shares"],
                    "symbol" => $row["symbol"]
                ];
            }
        }

    // render portfolio and pass in $user Array which contains all the users data and $positions Array which contains the stock holdings data
    render("portfolio.php", [ "title" => "Portfolio", "user" => $user, "positions" => $positions]);

?>
