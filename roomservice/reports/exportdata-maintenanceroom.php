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
$query = mysqli_query($con, "select * from room where RoomStatus='Maintenance'");
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "maintananceroom-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('Room No', 'Room Branch', 'Room Type', 'Room Max Person', 'Room Price', 'Status'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['RoomNo'], $row['RoomBCode'], $row['RoomType'], $row['MaxPerson'], $row['RoomPrice'], $row['RoomStatus']); 
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