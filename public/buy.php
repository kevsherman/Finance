<?php
 
 require("../includes/config.php");

//if form was submitted, initiate stock sell
if ($_SERVER["REQUEST_METHOD"] == "POST"){

        //What stock are they buying?
        $stock = $_POST["symbol"];
       
        //send to all uppercase
        $stock = strtoupper($stock);

        //get the stock details from Yahoo
        $stockdetail = lookup("$stock");

        //check if valid symbol
        if($stockdetail == false){
            apologize("Please provide a valid symbol");
        }

        //How many shares are they buying?
        $amt = $_POST["amt"];

        //ensure non-negative integer
        if(preg_match("/^\d+$/", $amt) == false){
            apologize("You must provide a positive whole number");
        }

        //ensure they entered both stock and amount fields
        if($stock == null || $amt == null){
            apologize("Please fill out all of the fields");
        }

        //Whats the total cost of stocks
        $cost = $stockdetail["price"] * $amt;

        //get cash balance from DB
        $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);       
        
        //dump($cash);

        //check that he can afford the purchase 
        if($cost > $cash[0]["cash"]){
            apologize("Insufficient cash to complete transaction");
        }

        //Execute buy: 
        //remove $ from cash
        query ("UPDATE users SET cash = cash - ? WHERE id = ?", $cost, $_SESSION["id"]);

        //add new stocks to portfolio.  If row exisits, UPDATE; if not, INSERT

        query("INSERT INTO stocks (id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], $stock, $_POST["amt"]);

        //when buy complete, redirect to index
        redirect("index.php");
}
        
//if no form submission, load the template
else{
    render("buy_form.php", ["title" => "Buy Stock"]);
}
?>

