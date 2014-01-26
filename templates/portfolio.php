<?php
/*
//  This page shows the current users stock portolio 
//
//  Variables are passed in from index.php via $user, which called all db rows for the user:
//  Eg:
//            Array
//                    (
//                   [0] => Array
//                        (
//                           [id] => 20
//                           [username] => newguy12
//                           [hash] => $1$V411.CmR$JTOkUNRexX40YIdbBRwtP1
//                           [cash] => 10000.0000
//                        )
//
//                    )
//
/////////////////////////////////////////////////////////////////////////////////////////*/ ?>

<div>
    <h2>Welcome <?= $user[0]["username"] ?> </h2>
</div>

<ul>
    <li>Available Cash: <?= $user[0]["cash"] ?></li>
    <li><h2>Current Stocks</h2></li>

        <?php foreach ($positions as $position): ?>

            <tr>
                <td><strong>Company:</strong><?= $position["symbol"] ?></td>
                <td><strong>Shares Held: </strong><?= $position["shares"] ?></td>
                <td><strong>Share Price:</strong><?= $position["price"] ?></td>
            </tr></br>

        <? endforeach ?>

</ul>

<div>
    <a href="quote.php">Seach Stocks by Symbol </a>
<div>
    <a href="logout.php">Log Out</a>
</div>
<div>
    <a href="sell.php">Sell Stocks</a>
</div>
<div>
    <a href="buy.php">Buy Stocks</a>
</div>