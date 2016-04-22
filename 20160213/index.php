<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>テストドキュメント</title>
</head>

<body>
<h1>CSVを配列に。</h1>
<?php 

	$filepath = "list.csv";

			//変数格納 = 		csvファイルパス , readOnly 
	if (($handle = fopen($filepath, "r")) !== false) {
	
	$w = 0;
					//一行 = 			変数格納
	while (($line = fgetcsv($handle, 1000, ",")) !== false) {
		
		//一行を一列ずつ配列に格納
		$records[$w][0] = htmlspecialchars(mb_convert_encoding( $line[0], "UTF-8", "sjis-win")); //A列
		$records[$w][1] = htmlspecialchars(mb_convert_encoding( $line[1], "UTF-8", "sjis-win")); //B列
		$records[$w][2] = htmlspecialchars(mb_convert_encoding( $line[2], "UTF-8", "sjis-win")); //C列
		$records[$w][3] = htmlspecialchars(mb_convert_encoding( $line[3], "UTF-8", "sjis-win")); //D列
		$w++;
	} 
	
//htmlspecialchars --- <>等、htmlタグに使われる文字をエスケープ処理する（XSS対策）
//mb_convert_encoding --- 引数1の文字列を、引数3の型から、引数2の型に変換する。（文字化け対策）

	//fopen したものをcloseして解放（サーバー負荷軽減？）
	fclose($handle); 
	} 

	echo "A列｜B列｜C列｜D列｜<br><br>\n";

for( $i=0 ; $i<count($records);$i++){
	echo $records[$i][0].'|'.$records[$i][1].'|'.$records[$i][2].'|'.$records[$i][3].'|'."<br>\n";
	echo "<br>\n";
}
?>


</body>
</html>