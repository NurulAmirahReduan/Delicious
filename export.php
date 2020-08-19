<?php  
$conn = new mysqli('localhost', 'root', '');  
mysqli_select_db($conn, 'whbms');  
$sql = "SELECT `id`,`title`,`detail`, `descrtiption` FROM `news`";  
$setRec = mysqli_query($conn, $sql);  
$columnHeader = '';  
$columnHeader = "News title" . "\t" . "Detail " . "\t" . "Descrtiption" . "\t";  
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=news.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
 ?> 
 
