<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/app.css">
    <script src="/app.js"></script>
    <title>My Blog</title>
</head>
<body>
<article>
    <h1>{!!  $post->title !!}</h1>
    <p>By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> <a href="/categories/{{$post->category->name}}">{{$post->category->name}}</a>
    </p>
    <div>
        <p>{{$post->body}}</p>

    </div>
</article>

<a href="/">Go back</a>

</body>

</html>
