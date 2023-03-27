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

<body> <?php

        // header("refresh: 10");
        // Load the RSS feed
        // $rss = simplexml_load_file('./news.xml');
        // $rss = simplexml_load_file('https://lorem-rss.herokuapp.com/feed?unit=second&interval=5');
        $rss = simplexml_load_file('https://tools.cdc.gov/api/v2/resources/media/342776.rss');

        // Get the channel information
        $channel_title = $rss->channel->title;
        $channel_link = $rss->channel->link;
        $channel_description = $rss->channel->description;

        // Loop through the items in the feed
        $max = 10;
        $i = 0;
        foreach ($rss->channel->item as $item) {

            if ($i <= $max) {

                // Get the item information
                $item_title = $item->title;
                $item_link = $item->link;
                $item_description = $item->description;
                $item_pubDate = $item->pubDate;

                // Do something with the item information (e.g. display it on a webpage)
                echo '<div class="published_item" <h4><a href="' . $item_link . '" target="_blank">' . $item_title . '</a></h4>';
                echo '<p>' . $item_description . '</p>';
                // echo '<p>Item Link: ' . $item_link . '</p>';
                echo '<p>Published on: ' . $item_pubDate . '</p></div>';
                $i++;
            }
        }


        ?> </body>

</html>
