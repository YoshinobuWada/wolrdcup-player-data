<head>
    <link rel="stylesheet" href="/css/setting.css">
</head>
@section('content')
    <form action="{{ route('players.register') }}" method="post">
        @csrf
        <div class="wrap">
            <h1>新規登録画面</h1>
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
                    <input type="text" class="text" name="email" id="email" />
                </dd>
                <dt>
                    <label for="password">パスワード:</label>
                </dt>
                <dd>
                    @if ($errors->has('password'))
                        <p class="error">
                            {{ $errors->first('password') }}<br>
                        </p>
                    @endif
                    <input type="password" class="text" name="password" id="password">
                </dd>
                <dt>
                    <label for="password_confirmation">パスワード確認:</label>
                </dt>
                <dd>
                    @if ($errors->has('password_confirmation'))
                        <p class="error">
                            {{ $errors->first('password_confirmation') }}<br>
                        </p>
                    @endif
                    <input type="password" class="text" name="password_confirmation" id="password_confirmation" />
                </dd>
                <dt>
                    <label for="role">ユーザー種別選択:</label>
                </dt>
                <dd>
                    @if ($errors->has('role'))
                        <p class="error">
                            {{ $errors->first('role') }}<br>
                        </p>
                    @endif
                    <input type="radio" class="radio" name="role" id="radio1" onclick="manageblock()"
                        value="1">一般ユーザー
                    <input type="radio" class="radio" name="role" id="radio2" onclick="managehide()"
                        value="0">管理ユーザー
                </dd>
                <dt>
                    <label for="country_id">所属国選択:</label>
                </dt>
                <dd>
                    <input type="hidden" name="country_id" id="country_id1" value="0" disabled />
                    <select name="country_id" id="country_id2" class="input" disabled>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </dd>
            </dl>
            <button type="submit" class="btn" id="send" onclick="return confirm('この情報でユーザー登録を行いますか？')">登録</button><br>
            <button type="button" class="btn" id="back" onclick="location.href='{{ route('players.login') }}'">戻る</button>
        </div>
    </form>
    <script src="{{ asset('/js/setting.js') }}"></script>
