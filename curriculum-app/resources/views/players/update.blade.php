<?php
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
$url = '/';
if (!strstr($referer, $url)) {
    header('Location: /');
    exit();
}
?>

<head>
    <link rel="stylesheet" href="/css/update.css">
</head>
@section('content')
    <div class="wrap">
        <table id="update">
            <form action="{{ route('players.edit', ['id' => $players->id]) }}" method="post">
                @csrf
                <tr>
                    <th>No</th>
                    <td>{{ $players->id }}</td>
                </tr>
                <tr>
                    <th>背番号</th>
                    <td>
                        @if ($errors->has('uniform_num'))
                            <p class="error">
                                {{ $errors->first('uniform_num') }}<br>
                            </p>
                        @endif
                        <input type="text" class="input" name="uniform_num" id="uniform_num"
                            value="{{ $players->uniform_num }}" />
                    </td>
                </tr>
                <tr>
                    <th>ポジション</th>
                    <td>
                        @if ($errors->has('position'))
                            <p class="error">
                                {{ $errors->first('position') }}<br>
                            </p>
                        @endif
                        <select name="position" class="input" id="position">
                            <option value="FW"<?php if ($players->position == 'FW') {
                                echo ' selected';
                            } ?>>FW</option>
                            <option value="MF"<?php if ($players->position == 'MF') {
                                echo ' selected';
                            } ?>>MF</option>
                            <option value="DF"<?php if ($players->position == 'DF') {
                                echo ' selected';
                            } ?>>DF</option>
                            <option value="GK"<?php if ($players->position == 'GK') {
                                echo ' selected';
                            } ?>>GK</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>名前</th>
                    <td>
                        @if ($errors->has('name'))
                            <p class="error">
                                {{ $errors->first('name') }}<br>
                            </p>
                        @endif
                        <input type="text" class="input" name="name" id="name" value="{{ $players->name }}" />
                    </td>
                </tr>
                <tr>
                    <th>国</th>
                    <td>
                        <select name="country_id" id="country_id" class="input">
                            @foreach ($countries as $country)
                                @if ($country->id == $players->country_id)
                                    <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                                @else
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>所属</th>
                    <td>
                        @if ($errors->has('club'))
                            <p class="error">
                                {{ $errors->first('club') }}<br>
                            </p>
                        @endif
                        <input type="text" class="input" name="club" id="club" value="{{ $players->club }}" />
                    </td>
                </tr>
                <tr>
                    <th>誕生日</th>
                    <td>
                        @if ($errors->has('birth'))
                            <p class="error">
                                {{ $errors->first('birth') }}<br>
                            </p>
                        @endif
                        <input type="date" class="input" name="birth" id="birth" value="{{ $players->birth }}" />
                    </td>
                </tr>
                <tr>
                    <th>身長</th>
                    <td>
                        @if ($errors->has('height'))
                            <p class="error">
                                {{ $errors->first('height') }}<br>
                            </p>
                        @endif
                        <input type="text" class="input" name="height" id="height"
                            value="{{ $players->height }}" />
                    </td>
                </tr>
                <tr>
                    <th>体重</th>
                    <td>
                        @if ($errors->has('weight'))
                            <p class="error">
                                {{ $errors->first('weight') }}<br>
                            </p>
                        @endif
                        <input type="text" class="input" name="weight" id="weight"
                            value="{{ $players->weight }}" />
                    </td>
                </tr>
        </table>
        <button type="submit" class="update">編集</button>
        <button type="button" class="back" onclick="location.href='/'">戻る</button>
        </form>
    </div>
