<?php
$name=$_POST['Name'];
$regno=$_POST['regno'];
$phon=$_POST['phon'];
$email=$_POST['email'];

$conn=new mysqli('localhost','root','','student_details');
if($conn-> connect_error)
{
    die('Connection failed :'.$conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into stud_info(Name,Regno,Phone,Mail)values(?,?,?,?)");
    $stmt->bind_param("siis",$name,$regno,$phon,$email);
    $stmt-> execute();
    echo "<center>"."<h4>"."Registration successful"."</h4>"."</center>"."<br>";
    $stmt->close();
}
$sql="SELECT Name, Regno, Phone, Mail FROM stud_info";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        echo "<br>"."NAME : ".$row["Name"]. " "."REGNO : ".$row["Regno"]." "."PHONE : ".$row["Phone"]." "."EMAIL : ".$row["Mail"]."<br>";

    }
}
else {
    echo "Zero results";
}
$conn->close();
