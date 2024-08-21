<?php
$xml = simplexml_load_file('../xml/cookiesTicks.xml');
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
<h1>Purchased Tickets</h1>
<?php foreach ($xml->ticket as $ticket): ?>
    <div>
        <h2>Ticket Date: <?php echo $ticket->date; ?></h2>
        <ul>
            <?php foreach ($ticket->items->item as $item): ?>
                <li>
                    <strong><?php echo $item['name']; ?></strong><br>
                    Count: <?php echo $item->count; ?><br>
                    Price: <?php echo $item->price; ?><br>
                    Total: <?php echo $item->total; ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <strong>Total Sum: <?php echo $ticket->total; ?></strong>
    </div>
<?php endforeach; ?>
</body>
</html>