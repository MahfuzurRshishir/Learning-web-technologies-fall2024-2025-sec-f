<?php
require_once('../Model/employeeModel.php');

if (isset($_POST['searchKey'])) {
    $keyword = trim($_POST['searchKey']);

    $searchedEmployees = searchEmployee($keyword);

    if (!empty($searchedEmployees)) {
        $response = "";
        echo "<h2> <u> Found Employees below: </u> </h2>";
        foreach ($searchedEmployees as $employee) {
            $response .= "ID: " . $employee['id'] . 
                         " - Username: " . $employee['username'] . 
                         " - Name: " . $employee['name'] . 
                         " - Contact: " . $employee['contact'] . "<br>";
        }
        echo $response;
    } else {
        echo "No employees found!";
    }
    exit;
} else {
    echo "Error! Search key not provided.";
    exit;
}
?>
