<?php 
 
// Load the database configuration file 
//time zone
date_default_timezone_set('Asia/Colombo');
//database connection
$con = mysqli_connect("localhost", "root", "", "lakderana");
//$con = mysqli_connect("sql305.epizy.com", "epiz_30503065", "zw5mJOROdZ", "epiz_30503065_lakderana");
if (mysqli_connect_errno()) {
    echo "Connection Fail" . mysqli_connect_error();
}
 
// Fetch records from database 
$query = mysqli_query($con, "select p.PayID, e.EmpID, e.EmpFLname, c.CusID, c.CusFLName, p.PaymentDate, p.PaymentType, p.Amount, p.Discount, p.PaidAmount, p.DueAmount, p.PaymentStatus from payment as P
left join customer as c on c.CusID = p.CusID
left join employee as e on e.EmpID = p.EmpID");
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "payment-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('Payment ID', 'Customer Name', 'Total Amount', 'Discount', 'Paid Amount', 'Due Amount', 'Payment Type', 'Payment Date', 'Payment Status'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['PayID'], $row['CusFLName'], $row['Amount'], $row['Discount'], $row['PaidAmount'], $row['DueAmount'], $row['PaymentType'], $row['PaymentDate'], $row['PaymentStatus']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>