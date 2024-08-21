<?php
session_start();
if (!isset($_SESSION['items']))
{
    $_SESSION['items'] = [];
}
if (isset($_POST['add_item']))
{
    $name = $_POST['name'];
    $count = $_POST['count'];
    $price = $_POST['price'];
    $product = new Product($name, $count, $price);
    $_SESSION['items'][] = $product;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br>
    <label for="count">Count:</label>
    <input type="number" id="count" name="count" required><br>
    <label for="price">Price:</label>
    <input type="number" step="0.01" id="price" name="price" required><br>
    <button type="submit" name="add_item">AddItem</button>
</form>
<form method="post">
    <button type="submit" name="buy">Buy</button>
</form>
<form method="post" action="xmlCookiesTicks.php">
    <button type="submit" name="get_tickets">GetTickets</button>
</form>
</body>
</html>