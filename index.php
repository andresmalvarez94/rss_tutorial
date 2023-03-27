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

        .lorem_feed {
            display: grid;
            width: 400px;
            grid-template-areas:
                'a b'
                'c c';
            grid-template-rows: 50px auto;
        }

        .widget-title {
            grid-area: a;
        }

        .btn-refresh {
            grid-area: b;
            border: none;
            background: none;
            align-self: center;
            justify-self: center;
            cursor: pointer;
            transition: .2s;
            font-size: 2em;
        }

        .btn-refresh:hover {
            color: #6ca7d1;
        }

        .feed {
            border: 1px solid blue;
            width: 500px;
            grid-area: c;
        }
    </style>
    <script src="https://kit.fontawesome.com/c00032626e.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="lorem_feed">
        <h4>Lorem Feed</h4>
        <i class="fa-solid fa-arrows-rotate btn-refresh" onclick="refreshIframe()"></i>
        <!-- Load items into IFRAME -->
        <iframe id="newsFeed" class="feed" name="newsFeed" class="feed" src="./news.php"></iframe>
    </div>
    <script>
        function refreshIframe() {
            var iframe = document.getElementById("newsFeed")
            iframe.src = iframe.src
        }
    </script>
</body>

</html>
