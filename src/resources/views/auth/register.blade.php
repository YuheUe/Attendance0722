<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>attendance</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
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
    <div class="header__wrap">
        <span class="header__text">
            会員登録
        </span>
    </div>
    <form class="form__wrap" action="{{ route('register') }}" method="post">
        @csrf
        <div class="form__content">
            <div class="form__item">
                <input class="form__input" type="text" name="name" placeholder="名前" value="{{ old('name') }}">
            </div>
            <div class="error__item">
                @error('name')
                    <span class="error__message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form__content">
            <div class="form__item">
                <input class="form__input" type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
            </div>
            <div class="error__item">
                @error('email')
                    <span class="error__message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form__content">
            <div class="form__item">
                <input class="form__input" type="password" name="password" placeholder="パスワード">
            </div>
            <div class="error__item">
                @error('password')
                    <span class="error__message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form__item">
            <input class="form__input" type="password" name="password_confirmation" placeholder="確認用パスワード">
        </div>
        <div class="form__item form__item-button">
            <button class="form__input form__input-button">会員登録</button>
        </div>
    </form>
    <div class="register__wrap">
        <div class="register__item">
            <p class="register__item-text">
                アカウントをお持ちの方はこちらから
            </p>
        </div>
        <div class="register__button">
            <a class="register__item-button" href="/login">ログイン</a>
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