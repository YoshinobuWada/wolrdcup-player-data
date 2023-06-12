<?php 
$referer = isset($_SERVER['HTTP_REFERER'])?
$_SERVER['HTTP_REFERER']: null;
$url     = '/';
if(!strstr($referer, $url)){
    header('Location: /');
    exit;
}
?>
<head>
<link rel="stylesheet" href="/css/detail.css">
</head>
<div class="wrap">
<table id="detail">
    <tr>
        <th>No</th>
        <td>{{ $players->id }}</td>
    </tr>
    <tr>
        <th>背番号</th>
        <td>{{ $players->uniform_num }}</td>
    </tr>
    <tr>
        <th>ポジション</th>
        <td>{{ $players->position }}</td>
    </tr>
    <tr>
        <th>名前</th>
        <td>{{ $players->name }}</td>
    </tr>
    <tr>
        <th>国</th>
        <td >{{ $players->country->name }}</td>
    </tr>
    <tr>
        <th>所属</th>
        <td>{{ $players->club }}</td>
    </tr>
    <tr>
        <th>誕生日</th>
        <td>{{ $players->birth }}</td>
    </tr>
    <tr>
        <th>身長</th>
        <td>{{ $players->height }}</td>
    </tr>
    <tr>
        <th>体重</th>
        <td>{{ $players->weight }}</td>
    </tr>
    <tr>
        <th>総得点</th>
        @if($goals != 0)
        <td>{{ $goals }}点</td>
        @else
        <td>無得点です。</td>
        @endif
    </tr>
    <tr>
        <th>得点履歴</th>
        <td>
            @foreach($pairings as $index => $pairing)
            ・{{ $pairing->kickoff }}開始 {{ $pairing->name }}戦 {{ $pairing->goal_time }}: {{ $index + 1 }}点目<br>
            @endforeach
        </td>
    </tr>
</table> 
<button class="back" onclick="location.href='/'">戻る</button>
</div>