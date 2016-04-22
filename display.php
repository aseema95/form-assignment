<html>
<body>

<?php
//This file has the action part on clicking submit. The text in the fields is put in variables and stored in the database

$servername = "localhost";
$username = 'root';
$password = 'root';
$dbname = "form";

try {
   $conn = new mysqli($servername, $username, $password,$dbname);
if(! $conn) {
	die('Could not connect:'. mysql_error());
}		
   echo "<h2>Database 'form' Connected<h2>";
$sql = "insert into details(name,age,email)
values
('$_POST[name]','$_POST[age]','$_POST[email]')";
if(!mysqli_query($conn,$sql)) {
	die("error:" .mysql_error());
}
}
catch(PDOException $e){
   echo "<h1>" . $e->getMessage() . "</h1>";
}
echo "1 record added";
$sql="select * from details;";
$result = $conn->query($sql);
if($result->num_rows >0) {
//output data of each row
while($row = $result->fetch_assoc()) {
echo "<br>";
echo "name: " .$row["name"]. " Age: " .$row["age"].  " Email:" .$row["email"]."<br>";
}
}

else {
echo "0 results";
}        
mysql_close($conn);
      
?>

<form method = "post" action = "form.php">
         <table>            
            <tr>
               <td>
                  <input type = "submit" name = "back" value = "Back"> 
               </td>
            </tr>
         </table>
      </form>
      


</body>
</html>
