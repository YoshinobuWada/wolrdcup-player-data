<head>
    <link rel="stylesheet" href="/css/paginate.css">
    <link rel="stylesheet" href="/css/index.css">
</head>
<h2>■選手データ</h2>
<form action="{{ route('players.logout') }}" method="POST">
    @csrf
    <button class="logout">ログアウト</button>
    <table id="Player">
        <tr class="gray">
            <th>No</th>
            <th>背番号</th>
            <th>ポジション</th>
            <th>所属</th>
            <th>名前</th>
            <th>国</th>
            <th>誕生日</th>
            <th>身長</th>
            <th>体重</th>
            <th></th>
            @if ($user->role == 0)
                <th></th>
                <th></th>
            @endif
        </tr>
        @foreach ($players as $player)
            @if ($player->del_flg == 0)
                <tr>
                    <th>{{ $player->id }}</th>
                    <th>{{ $player->uniform_num }}</th>
                    <th>{{ $player->position }}</th>
                    <th>{{ $player->club }}</th>
                    <th>{{ $player->player_name }}</th>
                    <th>{{ $player->name }}</th>
                    <th>{{ $player->birth }}</th>
                    <th>{{ $player->height }}</th>
                    <th>{{ $player->weight }}</th>
                    <th><button onclick="location.href='{{ route('players.detail', ['id' => $player->id]) }}'"
                            id="syosai" class="btn btn-primary">詳細</button></th>
                    @if ($user->role == 0)
                        <th><button onclick="location.href='{{ route('players.update', ['id' => $player->id]) }}'"
                                id="hensyu" class="btn btn-primary">編集</button></th>
                        <th><button onclick="location.href='/{{ $player->id }}'; return confirm('この選手のデータを削除しますか？')"
                                id="sakuzyo" class="btn btn-primary">削除</button></th>
                    @endif
                </tr>
            @endif
        @endforeach
    </table>
    <div>
        {{ $players->links('pagination::default') }}
    </div>
</form>
