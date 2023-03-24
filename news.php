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
                            echo '<p>Published on: ' . $item_pubDate . '</p></div>';
                        }
                        ?> </div>
</body>

</html>
