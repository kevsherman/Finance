<div>
    <ul class="list-group">
        <li class="list-group-item"><?php print($quote["name"]);  ?> </li>
        <li class="list-group-item"><?php print($quote["symbol"]);  ?> </li>
        <li class="list-group-item"><?php print("Current Price: " . $quote["price"]);  ?> </li>
    </ul>
</div>
<a href="buy.php" class="btn btn-default">Buy this Stock</a>