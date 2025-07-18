<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thanks</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet" />
</head>

<body>
    <main>
        <div class="thanks__content">
            <div class="thanks__background">Thank you</div>

            <div class="thanks__heading">
                <h2>お問い合わせありがとうございました</h2>
            </div>

            <div class="thanks__button">
                <a href="{{ route('contact.index') }}" class="btn-home">HOME</a>
            </div>
        </div>
    </main>
</body>

</html>
