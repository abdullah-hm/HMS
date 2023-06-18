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
$query = mysqli_query($con, "select p.PayrollID, e.EmpID, e.EmpFLname, monthname(p.Date) as Month, p.Basic, p.OverTime, p.TravelAllowance, p.DeductSalary, (p.Basic + p.OverTime + p.TravelAllowance - p.DeductSalary) as TotalSalary from Payroll as P
inner join employee as e on e.EmpID = p.EmpID");
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "salary-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('Salary ID', 'mployee ID', 'Employee Name', 'Basic Salary', 'Over Time', 'Deduct Salary', 'Total Salary'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['PayrollID'], $row['EmpID'], $row['EmpFLname'], $row['Basic'], $row['OverTime'], $row['DeductSalary'], $row['TotalSalary']); 
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