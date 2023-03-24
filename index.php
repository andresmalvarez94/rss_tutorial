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


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .published_item {
        display: grid;
    }
    </style>
</head>

<body>
    <form method="post">
        <div><label for="title">title</label><input id='title' type="text" name="title"></div>
        <div><label for="link">link</label><input id='link' type="text" name="link"></div>
        <div><label for="description">description</label><input id='description' type="text" name="description"></div>
        <input type="submit" name="submit" value="submit">
    </form>
    <div class="feed"> <?php
                        // Load the RSS feed
                        $rss = simplexml_load_file('./news.xml');

                        // Get the channel information
                        $channel_title = $rss->channel->title;
                        $channel_link = $rss->channel->link;
                        $channel_description = $rss->channel->description;

                        // Loop through the items in the feed
                        foreach ($rss->channel->item as $item) {
                            // Get the item information
                            $item_title = $item->title;
                            $item_link = $item->link;
                            $item_description = $item->description;
                            $item_pubDate = $item->pubDate;

                            // Do something with the item information (e.g. display it on a webpage)
                            echo '<div class="published_item" <h4><a href="' . $item_link . '" target="_blank">' . $item_title . '</a></h4>';
                            echo '<p>' . $item_description . '</p>';
                            echo '<p>Item Link: ' . $item_link . '</p>';
                            echo '<p>Published on: ' . $item_pubDate . '</p></div>';
                        }
                        ?> </div>
</body>

</html>
