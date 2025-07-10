<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'My Website'; ?></title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header>
        <nav>
            <a href="/">Home</a> |
            <a href="#">About</a> |
            <a href="#">Contact</a>
        </nav>
        <h1><?php echo $page_heading ?? 'Welcome'; ?></h1>
    </header>
    <main>
