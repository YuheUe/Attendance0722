<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>attendance</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>
<body>
  <header>
        <div class="header_left">
            <span class="header_logo">
                Atte
            </span>
        </div>
  </header>
  <main>
    <div class="login-error__message">
            <span class="login-error__message-text">{{ session('message') }}</span>
    </div>
    <div class="header__wrap">
        <span class="header__text">
            ログイン
        </span>
    </div>
    <form class="form__wrap" action="/login" method="post">
        @csrf
        <div class="form__item">
            <input class="form__input" type="email" name="email" placeholder="メールアドレス">
        </div>
        <div class="error__item">
            @error('email')
                <span class="error__message">{{ $message }}</span>
            @enderror
        </div>
        <div class="form__item password__wrap">
            <input class="form__input password__input" type="password" name="password" placeholder="パスワード">
        </div>
        <div class="error__item">
            @error('password')
                <span class="error__message">{{ $message }}</span>
            @enderror
            </div>
        <div class="form__item form__item-button">
            <button class="form__input form__input-button" type="submit">ログイン</button>
        </div>
    </form>
    <div class="register__wrap">
        <div class="register__item">
            <p class="register__item-text">
                アカウントをお持ちでない方はこちらから
            </p>
        </div>
        <div class="register__button">
            <a class="register__item-button" href="/register">会員登録</a>
        </div>
    </div>
  </main>
  <footer>
        <div class="footer__item">
            <small class="footer__text">
                Atte,inc.
            </small>
        </div>
    </footer>
</body>
</html>