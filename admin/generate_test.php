
<?

define('path','fpdf/font/');
require('fpdf/fpdf.php');
if(isset($_REQUEST['submit']))
{
//Connect to your database
//include("config.php");
$today=date('Y-m-d');
$hostname = "localhost";
$database = "todo";
$username = "";
$password = "";
$conn = mysqli_connect($hostname, $username, $password) or die(mysql_error());
mysqli_select_db($database, $conn);
//Create new pdf file
$pdf=new FPDF();

//Open file
$pdf->Open();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

//set initial y axis position per page
$y_axis_initial = 25;

//print column titles for the actual page
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(25);
$pdf->Cell(30, 6, 'Complaint', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Date', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Text', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Polar words', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Source', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Company id', 1, 0, 'R', 1);

$y_axis = $y_axis + $row_height;

//Select the Products you want to show in your PDF file
$fromdate=$_REQUEST['fromdate'];
$todate=$_REQUEST['todate'];
$result=mysql_query("SELECT * FROM users WHERE date BETWEEN '$fromdate' AND '$todate'") or die(mysql_error());

//initialize counter
$i = 0;

//Set maximum rows per page
$max = 25;

//Set Row Height
$row_height = 6;

while($row = mysql_fetch_array($result))
{
//If the current row is the last one, create new page and print column title
if ($i == $max)
{
$pdf->AddPage();

//print column titles for the current page
$pdf->SetY($y_axis_initial);
$pdf->SetX(25);

$pdf->Cell(30, 6, 'Complaint', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Date', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Text', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Polar words', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Source', 1, 0, 'L', 1);
$pdf->Cell(30, 6, 'Company id', 1, 0, 'R', 1);

//Go to next row
$y_axis = $y_axis + $row_height;

//Set $i variable to 0 (first row)
$i = 0;
}

$complainant = $row['complainant'];
$date = $row['date'];
$complainttext = $row['complainttext'];

$complainttitle = $row['complainttitle'];
$polarwords = $row['polarwords'];
$source = $row['source'];
$companyid = $row['companyid'];

$pdf->SetY($y_axis);
$pdf->SetX(25);
$pdf->Cell(30, 6, $complainant, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $date, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $complainttext, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $polarwords, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $source, 1, 0, 'L', 1);
$pdf->Cell(30, 6, $companyid, 1, 0, 'R', 1);
// $pdf->Cell(30, 6, $companyid, 1, 0, 'R', 1);

//Go to next row
$y_axis = $y_axis + $row_height;
$i = $i + 1;
}

//Create file
$pdf->Output('report.pdf','F');
/*
if($pdf->Output('report.pdf','F'))
{
echo "Report Created Successfyully CLick to view";
}
else
{
echo "failed to create Report";
}*/
}
?>