<?php
function pdo_connect()
{
    $connstr = 'mysql:' . 'host=localhost;' . 'dbname=crud';
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
        return new PDO($connstr, 'matheus', 'pass', $options);
    } catch (PDOException $exception) {
        exit('Failed to connect to database.');
    }
}

function template_header($title)
{
    echo <<< EOT
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>$title</title>
    </head>

    <body>
        <a href="index.php">Home</a>
        <a href="create.php">Create</a>
        <h1>$title</h1>
    EOT;
}

function template_footer()
{
    echo <<< EOT
    </body>
    </html>
    EOT;
}
