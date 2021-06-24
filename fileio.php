<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP IO</title>
</head>
<body>
<h1>PHP IO</h1>

 <?php
define("filepath", "data.txt");

 $firstName = $lastName = $Gender = $DOB = $Religion = $PreAddress = $PerAddress = $Email = $Phone = $Url = $UserName = $Password ="";
    
$firstNameErr = $lastNameErr = $GenderErr = $DOBErr = $ReligionErr =$PreAddressErr = $PerAddressErr = $EmailErr = $PhoneErr = $UrlErr = $UserNameErr = $PasswordErr ="";
$flag = false;
$successfulMessage = $errorMessage = "";

 if($_SERVER['REQUEST_METHOD'] === "POST") {
$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$Gender = $_POST['gender'];
$DOB = $_POST['DoB'];
$Religion = $_POST['Religion'];

$PreAddress = $_POST['preaddress'];
$PerAddress = $_POST['paddress'];
$Email = $_POST['email'];
$Phone = $_POST['tel'];
$Url = $_POST['url'];

$UserName = $_POST['text'];
$Password = $_POST['password'];
     
 if(empty($firstName)) {
$firstNameErr = "Field can not be empty";
$flag = true;
}
if(empty($lastName)) {
$lastNameErr = "Field can not be empty";
$flag = true;
}
if(empty($Gender)) {
$GenderErr = "Field can not be empty";
$flag = true;
}
if(empty($DOB)) {
$DOBErr = "Field can not be empty";
$flag = true;
}
if(empty($Religion)) {
$ReligionErr = "Field can not be empty";
$flag = true;
}
     
if(empty($PreAddress)) {
$PreAddressErr = "Field can not be empty";
$flag = true;
}
if(empty($PerAddress)) {
$PerAddressErr = "Field can not be empty";
$flag = true;
}
if(empty($Email)) {
$EmailErr = "Field can not be empty";
$flag = true;
}
if(empty($Phone)) {
$PhoneErr = "Field can not be empty";
$flag = true;
}
if(empty($Url)) {
$UrlErr = "Field can not be empty";
$flag = true;
}
if(empty($UserName)) {
$UserNameErr = "Field can not be empty";
$flag = true;
}
if(empty($Password)) {
$PasswordErr = "Field can not be empty";
$flag = true;
}

if(!$flag) {
$fileData = read();

 if(empty($fileData)) {
$data[] = array("fname" => $firstName, "lname" => $lastName, "gender" => $Gender, "DoB" => $DOB, "Religion" => $Religion,"preaddress" => $PreAddress, "paddress" => $PerAddress, "email" => $Email, "tel" => $Phone, "url" => $Url, "text" => $UserName, "password" => $Password);
}
else {
$data[] = json_decode($fileData);
array_push($data, array("fname" => $firstName, "lname" => $lastName,"gender" => $Gender,"DoB" => $DOB, "Religion" => $Religion,"preaddress" => $PreAddress, "paddress" => $PerAddress,"gender" => $Gender,"DoB" => $DOB, "Religion" => $Religion,"text" => $UserName, "password" => $Password));
}

 $data_encode = json_encode($data);
write("");
$res = write($data_encode);
if($res) {
$successfulMessage = "Sucessfully saved.";
}
else {
$errorMessage = "Error while saving.";
}
}
}

 function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}

 function write($content) {
$file = fopen(filepath, "w");
$fw = fwrite($file, $content . "\n");
fclose($file);
return $fw;
}
?>
 
 

 <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
 <fieldset>
          <legend>Basic Information</legend>
 
<label for="firstname">First Name<span style="color: red">*</span>: </label>
<input type="text" name="fname" id="fname">
<span style="color: red"><?php echo $firstNameErr; ?></span>
<br><br>
<label for="lastname">Last Name<span style="color: red">*</span>: </label>
<input type="text" name="lname" id="lname">
<span style="color: red"><?php echo $lastNameErr; ?></span>
<br><br>

<label for="gender">Gender:</label>
      <input type="radio" name="gender" id="gender" value="male">Male
      <input type="radio" name="gender" id="gender" value="female">Female 
      <span style="color: red"><?php echo $GenderErr; ?></span>
      <br>
      
      <label for="dob">DoB</label>
      <input type="date" name="DoB" id="dob">
      <span style="color: red"><?php echo $DOBErr; ?></span>
      <br>
      
      <label for="religion">Religion</label>
      <select name="Religion" id="religion">
      <option value="ISLAM">ISLAM</option>
      <option value="Hindu">Hindu</option>
      <option value="Cristian">Cristian</option>
      <option value="Boudha">Boudha</option>  
      </select>
      <span style="color: red"><?php echo $ReligionErr; ?></span>

</fieldset>

<fieldset>
          <legend>Contact Information:</legend>
          <label for="preaddress">Present Address :</label>
          <textarea name="preaddress" id="preaddress" cols="20" rows="2"></textarea>
          <span style="color: red"><?php echo $PreAddressErr; ?></span>
          <br>
          
          <label for="paddress">Permanent Address :</label>
          <textarea name="paddress" id="paddress" cols="20" rows="2"></textarea>
          <span style="color: red"><?php echo $PerAddressErr; ?></span>
          <br>
          
          <label for="email">Email :</label>
          <input type="email" name="email" id="email">
          <span style="color: red"><?php echo $EmailErr; ?></span>
          <br>
          
          <label for="tel">Phone :</label>
          <input type="tel" name="tel" id="tel">
          <span style="color: red"><?php echo $PhoneErr; ?></span>
          <br>
          
          <label for="url">Personal Website Link :</label>
          <input type="url" name="url" id="url">
          <span style="color: red"><?php echo $UrlErr; ?></span>
          
      </fieldset>
      
<fieldset>
          <legend>Acount Information</legend>
          <label for="text">Username :</label>
          <input type="text" name="text" id="text">
          <span style="color: red"><?php echo $UserNameErr; ?></span>
          <br>
          <label for="password">Password</label>
          <input type="password" name="password" id="password">
          <span style="color: red"><?php echo $PasswordErr; ?></span>
      </fieldset>
      
    <fieldset>
          <legend>Academic Information :</legend>
      </fieldset>

<input type="submit" name="submit" value="Register">
</form>

 <br>
 <span style="color: green"><?php echo $successfulMessage; ?></span>
<span style="color: red"><?php echo $errorMessage; ?></span>


 <?php

 /*$fileData = read();
echo "<br><br>";
$fileDataExplode = explode("\n", $fileData);
 echo "<ol>";
for($i = 0; $i < count($fileDataExplode) - 1; $i++) {
$temp = json_decode($fileDataExplode[$i]);
echo "<li>" . "First Name: " . $temp->fname . " Last Name: " . $temp->lname . "</li>";
}
echo "</ol>";*/

 function read() {
$file = fopen(filepath, "r");
$fz = filesize(filepath);
$fr = "";
if($fz > 0) {
$fr = fread($file, $fz);
}
fclose($file);
return $fr;
}
?>
</body>
</html>