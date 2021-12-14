
<?php


require 'dbConnection.php';
$sql = "select title,content,startdate,enddate from todo ";
$op  = mysqli_query($con,$sql);
   ?>
   <!DOCTYPE html>
   <html>
       <head>
           <title>O/P TODO</title>
           <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
       </head>

       <body>
       <table>
  <tr>
    <th>title</th>
    <th>content</th>
    <th>start Date</th>
    <th>end Date</th>
    <?php 

while($data = mysqli_fetch_assoc($op)){

?>
    <tr>
       <td><?php echo $data['title'];?></td>
       <td><?php echo $data['content'];?></td>
       <td><?php echo $data['startdate'];?></td>
       <td><?php echo $data['enddate'];?></td>

                <!-- <td>
                    <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                    <a href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>

                </td> -->
            </tr>

  <?php
}
?>
</table>

           <script src="" async defer></script>
       </body>
   </html>
   
    






