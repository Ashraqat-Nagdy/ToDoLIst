<?php
require 'dbConnection.php';

require 'helpers.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  # code...
  $title = clean($_POST['title']);
  $content = clean($_POST['content']);
  $startdate = clean($_POST['startDate']);
  $enddate = clean($_POST['endDate']);

  //validation
  $error = [];
  //validate title
  if ( !validate($title , 1)) {
      # code...
      $error['Title'] = 'please fill the title';
  } 
  //validate content
  if (!validate($content , 1)) {
      # code...
      $error['Content'] = 'please fill the content';
  }
      //validate start date
  
  
  if (!validate($startdate , 1)) {
    # code...
    $error['startDate'] = 'please fill submit start date';

// validate end date
} 
if (!validate($enddate , 1)) {
  # code...
  $error['endDate'] = 'please submit end date';
} 
//validate image

if(!validate($_FILES['image']['name'],1)){
  $error['Image'] = "Field Required";
}else{
  
$tmpPath    =  $_FILES['image']['tmp_name'];
$imageName  =  $_FILES['image']['name'];
$imageSize  =  $_FILES['image']['size'];
$imageType  =  $_FILES['image']['type'];

$exArray   = explode('.',$imageName);
$extension = end($exArray);

$FinalName = rand().time().'.'.$extension;

$allowedExtension = ["png",'jpg'];

 if(!validate($extension,5)){
   $error['Image'] = "Error In Extension";
 }

}
   if(count($error) > 0){
  foreach ($error as $key => $value) {
      # code...
      echo '* '.$key.' : '.$value.'<br>';
  }
}else{

  $desPath = 'uploads/'.$FinalName;

  if(move_uploaded_file($tmpPath,$desPath)){
  


   $sql = "insert into todo (title,content,startDate,enddate,image) values ('$title','$content','$startdate','$enddate','$FinalName')";
   $op  = mysqli_query($con,$sql);

    if($op){
        echo 'Data Inserted';
        $_SESSION['test'] = $data ;
        header("location: index.php");
  
    }else{
        echo 'Error Try Again'.mysqli_error($con);                      
    }
  }else{
  echo 'Error In Uploading file';
  }

  

}
}




?>




<!DOCTYPE html>
<html>
<head>
<title>TODO LIST</title>

</head>

<body>

<h1>MY Todo-List</h1>


<form action="<?php echo $_SERVER['PHP_SELF'];?>"  method ='post' enctype="multipart/form-data" >



    <div class="form-group">
    <label for="exampleInputTitle">Title</label>
    <input type="text"  id="exampleInputTitle" name="title" >
  </div>
  </br>

  <div class="form-group">
    <label for="exampleInputContent">Content</label>
    <input type="text"  id="exampleInputContent" name="content" >
  </div>

  <br>
  <label for="startDate">start date</label>
  <input type="date" id="startdate" name="startDate" min="2000-01-02"><br><br>


  <label for="endDate">End Date</label>
  <input type="date" id="enddate" name="endDate" min="2000-01-02"><br><br>



  <div class="form-group">
    <label for="exampleInputPassword">Image</label>
    <input type="file"  id="exampleInputPassword1" name="image" >
  </div>
 
  <br>

  <button type="submit" class="btn btn-primary">Save my intentions</button>


</form>

</body>
</html>
