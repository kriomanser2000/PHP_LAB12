<?php
if (isset($_POST['buy']) && !empty($_SESSION['items']))
{
    $xml = new DOMDocument('1.0', 'UTF-8');
    $xml->formatOutput = true;
    if (file_exists('tickets.xml'))
    {
        $xml->load('tickets.xml');
    }
    else
    {
        $root = $xml->createElement('tickets');
        $xml->appendChild($root);
    }
    $root = $xml->documentElement;
    $ticket = $xml->createElement('ticket');
    $root->appendChild($ticket);
    $date = $xml->createElement('date', date('Y-m-d H:i:s'));
    $ticket->appendChild($date);
    $items = $xml->createElement('items');
    $ticket->appendChild($items);
    $totalSum = 0;
    foreach ($_SESSION['items'] as $product)
    {
        $item = $xml->createElement('item');
        $item->setAttribute('name', $product->getName());
        $items->appendChild($item);
        $count = $xml->createElement('count', $product->getCount());
        $item->appendChild($count);
        $price = $xml->createElement('price', $product->getPrice());
        $item->appendChild($price);
        $total = $xml->createElement('total', $product->getTotal());
        $item->appendChild($total);
        $totalSum += $product->getTotal();
    }
    $totalElement = $xml->createElement('total', $totalSum);
    $ticket->appendChild($totalElement);
    $xml->save('tickets.xml');
    $_SESSION['items'] = [];
}