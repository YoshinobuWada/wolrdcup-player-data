<head>
    <link rel="stylesheet" href="/css/paginate.css">
    <link rel="stylesheet" href="/css/index.css">
</head>
<table id="Player">
    <tr class="gray">
        <th>No</th>
        <th>背番号</th>
        <th>ポジション</th>
        <th>所属</th>
        <th>名前</th>
        <th>誕生日</th>
        <th>身長</th>
        <th>体重</th>
        <th></th>
    </tr>
@foreach($players as $player)
    <tr>
        <th>{{ $player->id }}</th>
        <th>{{ $player->uniform_num }}</th>
        <th>{{ $player->position }}</th>
        <th>{{ $player->club }}</th>
        <th>{{ $player->name }}</th>
        <th>{{ $player->birth }}</th>
        <th>{{ $player->height }}</th>
        <th>{{ $player->weight }}</th>
        <th><a href="{{ route('players.detail',['id'=>$player->id]) }}" class="btn btn-primary">詳細</a></th>
    </tr>
@endforeach
</table>
<div>
    {{ $players->links('pagination::default') }}
</div>
