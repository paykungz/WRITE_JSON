<?php
   	
   $myFile = "data.json";
   $arr_data = array(); // create empty array
    $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "12345678";
 $db = "mydb";
	$conn = new mysqli($dbhost,$dbuser,$dbpass,$db);
$sql = "SELECT * FROM member";
$result = $conn->query($sql);

  try
  {
	   //Get form data
	   
if ($result->num_rows > 0) {
    // output data of each row
    $data = array();
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        $formdata = array(
	      'id'=> $row['id'],
	      'firstName'=> $row['name'],
	      'lastName'=> $row['last'],
	      'age'=>$row['age'],
	      'image'=> $row['image']
	   );
       array_push($data,$formdata);
    }
} else {
    echo "0 results";
}		$resp = array();
		$resp['formdata'] = $formdata;
		$fp = fopen('result.json','w');
		fwrite($fp, json_encode($data));
		fclose($fp);
       //Convert updated array to JSON
	   
	   //write json data into data.json file
	   

   }
   catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
   }

?>