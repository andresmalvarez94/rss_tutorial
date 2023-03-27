<?php
if (isset($_POST['submit'])) {

    echo "<pre>";
    print_r($_POST);
    echo "</pre>";


    $title = $_POST['title'];
    if (!str_contains($_POST['link'], "http://") && !str_contains($_POST['link'], "https://")) {
        $link = "https://" . $_POST['link'];
    } else {
        $link = $_POST['link'];
    }


    $description = $_POST['description'];

    // Load EXISTING XML file
    $rss = simplexml_load_file('./news.xml');

    // Create XML item (assumes existing channel element)
    $item = $rss->channel->addChild('item');

    // Add xml children element within each item
    $item->addChild('title', $title);
    $item->addChild('link', $link);
    $item->addChild('description', $description);
    $item->addChild('pubDate', date(DATE_RSS));

    // $rss->asXML('./news.xml'); --> this was excluded as it saves the file in the lines below.

    // FORMAT XML so each node is in a separate line
    $dom = new DOMDocument('1.0');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($rss->asXML());
    $dom->save('./news.xml');
}
