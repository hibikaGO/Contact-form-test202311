<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <!--フォント追加-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <!--css下記追加-->
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
</head>
<body>
    <div class="content">
        <div class="content-title-back">
            <p class="title">Thank you</p>
        </div>
        <div class="content__response">
            <p class="response-text">お問い合わせありがとうございました</p>
            <form action="/" method="get">
            @csrf
                <button class="response__button" type="submit">HOME</button>
            </form>
        </div>
    </div>
</body>
</html>