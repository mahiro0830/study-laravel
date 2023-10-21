<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Index</title>
</head>
<body>
  <h1>Hello/Index</h1>
  <p>ファイルパス　：{!! $msg !!}</p>
  <p>ファイルサイズ：{!! $size !!}</p>
  <p>最終更新日　　：{!! $lastModified !!}</p>
  <ul>
  @foreach ( $data as $item )
  <li>{!! $item !!}</li>
  @endforeach
  </ul>
  <form action="/hello/other" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <input type="submit">
  </form>
</body>
</html>
