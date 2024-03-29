<?php 

include('security.php');

include('includes/header.php'); 
include('includes/navbar.php');
?>
 

 <div class="modal fade" id="faceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Known Faces</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">
        <div class="form-group">
                <label>Name</label>
                <input type="text" name="face_name" class="form-control" placeholder="Enter Name" required>
            </div>


            <div class="form-group">
                <label>Designation</label>
                <input type="text" name="face_designation"  class="form-control" placeholder="Enter Designation" required>
            </div>

            <div class="form-group">
                <label>Upload Image</label>
                <input type="file"  name="face_image" id="face_image" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="save_face" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-secondary">Known Faces &ensp; &ensp;
            <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#faceModal">
              Add Known Faces
            </button>
    </h6>
  </div>
    <div class="card-body">
     
    
  <?php
  if(isset($_SESSION['success']) && $_SESSION['success'] !='')
  {
      echo '<h2 class="bg-primary" text="white">' .$_SESSION['success'].'</h2>';
      unset($_SESSION['success']);
  }

if(isset($_SESSION['status']) && $_SESSION['status'] !='')
{
    echo '<h2 class="bg-danger" text="white">'.$_SESSION['status'].'</h2>';
    unset($_SESSION['status']);
}
?>
    <div class="table-responsive">
        <?php

        $query = "SELECT * FROM face";
        $query_run = mysqli_query($connection, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Designation </th>
            <th>Image</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>

            <?php
                 while($row = mysqli_fetch_assoc($query_run))
            {
         ?>
                  <tr>
                <td><?php  echo $row['id']  ?> </td>
                <td><?php  echo $row['name']  ?> </td>
                <td><?php  echo $row['designation']  ?> </td>
               <td> <?php  echo '<img src="upload/' .$row['images'].'" width="100px;" height="100px;" alt="image">'?> </td>
               
                <td>
                    <form action="face_edit.php" method="POST">
                    <input type="hidden" name="edit_id" value="<?php  echo $row['id']  ?>">
                     <button type="submit" name="edit_data_btn" class="btn btn-success"> EDIT </button>

                    </form>
                    </td>


                    <td>
                    <form action="" method="POST">
                        
                        <button type="submit"  class="btn btn-danger"> DELETE </button>
                    </form>
            </td>

            
                </tr>

                <?php
            }
            ?>
          
       </tbody>
      </table>
      <?php
        }    
            else 
            {
                echo "No Record Found";
            
            }

        ?>

    </div>
</div>
</div>

<!-- /.container-fluid -->

     <?php 
include('includes/scripts.php');
include('includes/footer.php');
?>
   
  