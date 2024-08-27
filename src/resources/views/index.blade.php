<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>attendance</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>
<body>
  <header>
        <div class="header_left">
            <span class="header_logo">
                Atte
            </span>
        </div>
            @if (Auth::check())
            <div class="header__right">
                <ul class="header__right-list">
                    <li class="header__right-item">
                        <a class="header__item-link" href="/">ホーム</a>
                    </li>
                    <li class="header__right-item">
                        <a class="header__item-link" href="{{ route('attendance/date') }}">日付一覧</a>
                    </li>
                    <li class="header__right-item">
                        <a class="header__item-link" href="{{ route('logout') }}">ログアウト</a>
                    </li>
                </ul>
            </div>
            @endif
  </header>
  <main>
    <div class="header__wrap">
        <p class="header__text">
            {{ \Auth::user()->name }}さんお疲れ様です！
        </p>
    </div>
    <form class="form__wrap" action="{{ route('work') }}" method="post">
        @csrf
        <div class="form__item">
            @if($status == 0)
                <button class="form__item-button" type="submit" name="start_work">勤務開始</button>
            @else
                <button class="form__item-button" type="submit" name="start_work" disabled>勤務開始</button>
            @endif
        </div>
        <div class="form__item">
            @if($status == 1)
                <button class="form__item-button" type="submit" name="end_work">勤務終了</button>
            @else
                <button class="form__item-button" type="submit" name="end_work" disabled>勤務終了</button>
            @endif
        </div>
        <div class="form__item">
            @if($status == 1)
                <button class="form__item-button" type="submit" name="start_rest">休憩開始</button>
            @else
                <button class="form__item-button" type="submit" name="start_rest" disabled>休憩開始</button>
            @endif
        </div>
        <div class="form__item">
            @if($status == 2)
                <button class="form__item-button" type="submit" name="end_rest">休憩終了</button>
            @else
                <button class="form__item-button" type="submit" name="end_rest" disabled>休憩終了</button>
            @endif
        </div>
    </form>
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