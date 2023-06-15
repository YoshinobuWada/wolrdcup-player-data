<head>
    <link rel="stylesheet" href="/css/login.css">
</head>
@section('content')
    <form action="{{ route('players.logup') }}" method="post">
        @csrf
        <div class="wrap">
            <h1>ログイン</h1>
            <dl class="info">
                <dt>
                    <label for="email">ログインID:</label>
                </dt>
                <dd>
                    @if ($errors->has('email'))
                        <p class="error">
                            {{ $errors->first('email') }}<br>
                        </p>
                    @endif
                    <input type="text" name="email" id="email" />
                </dd>
                <dl>
                    <label for="password">パスワード:</label>
                </dl>
                <dd>
                    @if ($errors->has('password'))
                        <p class="error">
                            {{ $errors->first('password') }}<br>
                        </p>
                    @endif
                    <input type="password" name="password" id="password" />
                </dd>
            </dl>
            <button type="submit" class="login">ログイン</button>
            <p class="link"><a href="{{ route('players.setting') }}">新規登録はこちら</a></p>
        </div>
    </form>
