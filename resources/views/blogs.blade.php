<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaravelLearning</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
   <!-- <article>
    <a href="blogs/first-blog"><h1>First Blog</h1></a>
    <p>Never give up</p>
   </article>
   <article>
    <a href="blogs/second-blog"><h1>Second Blog</h1></a>
    <p>Never give up</p>
   </article>
   <article>
    <a href="blogs/third-blog"><h1>Third Blog</h1></a>
    <p>Never give up</p>
</article> -->
    <?php foreach ($blogs as $blog): ?>
        <a href="blogs/<?= $blog->slug; ?>"><h1><?= $blog->title; ?></h1></a>
        <p><?= $blog->intro; ?></p>
    <?php endforeach; ?>

    <script src="/app.js"></script>
</body>
</html>