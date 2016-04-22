<html>
<body>

<?php
// A database named 'form' has to be created using mysql command 'create database form;'
//the passwords are saved in respective variables
$servername = "localhost";

$username = 'root';
$password = 'root';
$dbname = "form";
//setting up a connection
try {
   $conn = new mysqli($servername, $username, $password,$dbname);
//error handling
if(! $conn) {
	die('Could not connect:'. mysql_error());
}		
   echo "<h2>Database form Connected successfully<h2>";
//create a table in the database using sql
$sql = "CREATE table details(
	name char(40) NOT NULL,
	age int NOT NULL,
	email varchar(30) NOT NULL,
	PRIMARY KEY(name)
)";
if($conn->query($sql) === TRUE) {
	echo "Table details was created successfully";
}
else {
	echo "Error creating table:" .$conn->error;
}	
	
}catch(PDOException $e){
   echo "<h1>" . $e->getMessage() . "</h1>";
}

         
         // define variables and set to empty values
         $name = $age = $email = "";
//this method calls test_input function to get the input from the fields in the form         
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
    			$nameErr = "Name is required";
  		} else {
    		$name = test_input($_POST["name"]);
  		}
       	
	    if (empty($_POST["age"])) {
    		$emailErr = "Age is required";
  		} else {
    		$email = test_input($_POST["age"]);
  		}
            $email = test_input($_POST["email"]);
         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
	

   ?>
  
      <h2>Display Form</h2>
      
      <form method = "post" action = "display.php">
         <table>
            <tr>
               <td>NAME:</td> 
               <td><input type = "text" name = "name"></td>
            </tr>
            
            <tr>
            	<td>AGE:</td>
            	<td><input type = "text" name = "age"></td>
            </tr>
            
            <tr>
               <td>EMAIL:</td>
               <td><input type = "text" name = "email"></td>
            </tr>
            
            <tr>
               <td>
                  <input type = "submit" name = "submit" value = "Submit"> 
               </td>
            </tr>
         </table>
      </form>
      
    
</body>
</html>

