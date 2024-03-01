<style>
    table{
        border-collapse: collapse;
    }
    td{
        border:1px solid #666;
        padding:5px 12px;
    }
    th{
        border:1px solid #666;
        padding:5px 12px;
        background-color: black;
        color:white;
    }
</style>
<?php
/****
 * 1.建立資料庫及資料表
 * 2.建立上傳檔案機制
 * 3.取得檔案資源
 * 4.取得檔案內容
 * 5.建立SQL語法
 * 6.寫入資料庫
 * 7.結束檔案
 */

 if(!empty($_FILES['text']['tmp_name'])){
    $filename=$_FILES['text']['name'];
    $filesize=$_FILES['text']['size'];
    echo "檔案上傳成功!檔名為:".$filename;
    echo "<br>檔案大小:".$filesize;
    echo "<br>";
    // "r" 唯獨的指令
    $file=fopen($_FILES['text']['tmp_name'],'r');
    // fopen 抓取目標檔案並由第一行讀取
    $line=fgets($file);
    // fgetes 抓取內容'字串'
    
    $cols=explode(",",$line);
    echo "<table>";
    echo "<tr>";
    foreach($cols as $col){
        echo "<th>";
        echo $col;
        echo "</th>";
    }
    echo "</tr>";
    while(!feof($file)){
        // feof ()  逐行讀取直到最後一行<會讀到最後一行為止>
        $line=fgets($file);
        $cols=explode(",",$line);
        echo "<tr>";
        foreach($cols as $col){
            echo "<td>";
            echo $col;
            echo "</td>";
        }
        echo "</tr>";

    }
    

 }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>文字檔案匯入</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="header">文字檔案匯入練習</h1>
<!---建立檔案上傳機制--->
<form action="?" method="post" enctype="multipart/form-data">
<input type="file" name="text" id="text">
<input type="submit" value="上傳">

</form>


<!----讀出匯入完成的資料----->



</body>
</html>