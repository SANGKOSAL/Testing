<?php include("function.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- link icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Link css -->
    <link rel="stylesheet" href="../CSS/index1.css">
    <title>CRUD-IMAGE</title>
</head>
<body>
    <div class="container-fluid">
      <div class="header">
          <a href="" class="logo">
              <img src="../IMG/logo.webp" alt="">
          </a>
          <form action="search.php" method="get" class="search">
            <input type="text" name="txtsearch" id="txtsearch" placeholder="Search..." class="form-control">
            <button type="submit" name="search" id="search"class="form-control" >Search</button>
          </form>
          <button type="submit" name="btn-register" id="btn-register" class="btn btn-outline-light btn-register" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              <i class="bi bi-person-plus"></i> Register
          </button>
      </div>
      <table class="table text-center align-middle mt-5"> 
        <tr class="fs-4 fw-bold" style="font-family: Times New Roman;">
          <th class="bg-transparent">ID</th>
          <th class="bg-transparent">Name</th>
          <th class="bg-transparent">Gender</th>
          <th class="bg-transparent">Phone Number</th>
          <th class="bg-transparent">Course</th>
          <th class="bg-transparent">Profile</th>
          <th class="bg-transparent">Action</th>
        </tr>
          <?php 
            GetData();
          ?>
      </table>
    </div>






<!-- Modal Register -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">======Register Information Student======</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
            <label for="" id="labelid">ID:</label>
            <input type="text" name="txtid" id="txtid" class="form-control my-2" placeholder="ID Student...">
            <label for="">Name:</label>
            <input type="text" name="txtname" id="txtname" class="form-control my-2" placeholder="Name Student...">
            <label for="">Gender:</label>
            <select name="txtgender" id="txtgender" class="form-select my-2">
                <option value="choose gender">Choose Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <label for="">Phone number:</label>
            <input type="text" name="txtphonenumber" id="txtphonenumber" class="form-control my-2" placeholder="Phone number...">
            <label for="">Course:</label>
            <select name="txtcourse" id="txtcourse" class="form-select my-2">
                <option value="choose gender">Choose Course</option>
                <option value="Web Back End">Web Back End</option>
                <option value="Web Design">Web Design</option>
                <option value="Java">Java</option>
                <option value="Network">Network</option>
                <option value="PHP">PHP</option>
                <option value="Laravel">Laravel</option>
                <option value="Framework">Framework</option>
                <option value="Database">Database</option>
                <option value="C++ Programming">C++ Programming</option>
                <option value="C Programming">C Programming</option>
                <option value="C# Programming">C# Programming</option>
            </select>
            <label for="">Profile:</label>
            <input type="file" name="txtprofile" id="txtprofile" class="form-control my-2" placeholder="Profile Student...">
            
            <div class="box-image" id="box-image">
              <img src="" id="show-image" alt="" class="show-image">
            </div>
            <input type="text" id="old-image" name="old-image" class="form-control my-2 text-center">

            <div class="mt-3">
              <button type="submit" name="btn-cancel" id="btn-cancel" class="btn btn-secondary btn-cancel" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Cancel</button>
              <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-success btn-submit"><i class="bi bi-person-fill-add"></i> Submit</button>
              <button type="submit" name="btn-update" id="btn-update" class="btn btn-success btn-submit"><i class="bi bi-box-arrow-in-down"></i> Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Delete -->
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">======Delete Information Student======</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
          <h5 class="text-center align-middle ">Do you really want to delete your student name?</h5>
          <p class="text-center align-middle">If not, click <strong class="text-danger">NO</strong>&ensp;&ensp;&ensp;If delete, click <strong class="text-primary">YES</strong></p>
          <input type="hidden" name="deleteid" id="deleteid" class="form-control my-2" placeholder="ID Student...">
          <button type="submit" name="btn-no" id="btn-no" class="btn btn-danger btn-cancel" data-bs-dismiss="modal">NO</button>
          <button type="submit" name="btn-yes" id="btn-Yes" class="btn btn-primary btn-submit">YES</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<script>
  function clear(){
    $('#txtid').val();
    $('#txtname').val();
    $('#txtgender').val();
    $('#txtphonenumber').val(); 
    $('#txtcourse').val();
    $('#txtprofile').val();
  }
  $(document).ready(function(){
    $('#btn-register').click(function(){
      clear();
      $('#btn-update').hide();
      $('#labelid').hide();
      $('#txtid').hide( );
      $('#btn-submit').show();
      $('#box-image').hide();
      $('#old-image').hide();
    });
    $('.container-fluid').on('click','#btn-open-Update',function(){

      $('#txtid').show();
      $('#labelid').show();
      $('#btn-update').show();
      $('#box-image').show();
      $('#old-image').hide();
      $('#btn-submit').hide();

      var id = $(this).parents('tr').find('td').eq(0).text();
      var name =$(this).parents('tr').find('td').eq(1).text();
      var gender = $(this).parents('tr').find('td').eq(2).text();
      var phonenumber = $(this).parents('tr').find('td').eq(3).text();
      var course = $(this).parents('tr').find('td').eq(4).text();
      var profile = $(this).parents('tr').find('td').eq(5).find('img').attr('alt');

      $('#txtid').val(id);
      $('#txtname').val(name);
      $('#txtgender').val(gender);
      $('#txtphonenumber').val(phonenumber);
      $('#txtcourse').val(course);
      $('#show-image').attr('src','../Image/'+profile);
      $('#old-image').val(profile);

    });

    $('.container-fluid').on('click','#btn-open-Delete',function(){
      var id = $(this).parents('tr').find('td').eq(0).text();
      $('#deleteid').val(id);
    });

  });
</script>