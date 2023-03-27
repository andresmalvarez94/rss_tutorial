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
    </style>
</head>

<body>
    <form action="./create_post.php" method="post">
        <div><label for="title">title</label><input id='title' type="text" name="title"></div>
        <div><label for="link">link</label><input id='link' type="text" name="link"></div>
        <div><label for="description">description</label><input id='description' type="text" name="description"></div>
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>
