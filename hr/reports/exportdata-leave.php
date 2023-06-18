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
$query = mysqli_query($con, "select l.LeaveID, l.EmpID, e.EmpFLname, l.Date, l.Reason from emp_leave as l
inner join employee as e on e.EmpID = l.EmpID");
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "leave-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('Leave ID', 'Employee ID', 'Employee Name', 'Leave Date', 'Reason'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['LeaveID'], $row['EmpID'], $row['EmpFLname'], $row['Date'], $row['Reason']); 
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