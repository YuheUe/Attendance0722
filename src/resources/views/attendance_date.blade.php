<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>attendance</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/attendance.css') }}" />
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
    <form class="header__wrap" action="{{ route('per/date') }}" method="post">
        @csrf
        <button class="date__change-button" name="prevDate"><</button>
        <input type="hidden" name="displayDate" value="{{ $displayDate }}">
        <p class="header__text">{{ $displayDate->format('Y-m-d') }}</p>
        <button class="date__change-button" name="nextDate">></button>
    </form>
    <div class="table__wrap">
        <table class="attendance__table">
            <tr class="table__row">
                <th class="table__header">名前</th>
                <th class="table__header">勤務開始</th>
                <th class="table__header">勤務終了</th>
                <th class="table__header">休憩時間</th>
                <th class="table__header">勤務時間</th>
            </tr>
            @foreach ($users as $user)
                <tr class="table__row">
                    <td class="table__item">{{ $user->name }}</td>
                    <td class="table__item">{{ $user->attendance_start }}</td>
                    <td class="table__item">{{ $user->attendance_end }}</td>
                    <td class="table__item">{{ $user->total_rest }}</td>
                    <td class="table__item">{{ $user->total_work }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    {{ $users->links('vendor/pagination/paginate') }}
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