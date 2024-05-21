<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php
    $connection = new mysqli ('localhost','root','','db_register');
    date_default_timezone_set ('Asia/Phnom_Penh');
function Insert(){
    if (isset($_POST['btn-submit'])){
        global $connection;
            $name = $_POST["txtname"];
            $gender = $_POST["txtgender"];
            $phonenumber = $_POST["txtphonenumber"];
            $course = $_POST["txtcourse"];
            $profile = $_FILES["txtprofile"]['name'];

        if(!empty($name) && !empty($gender) && !empty($phonenumber) && !empty($course) && !empty($profile)){
            $profile = date('d-m-y-h-i-s').'-'.$profile;
            $path = '../Image/'.$profile;
            move_uploaded_file($_FILES['txtprofile']['tmp_name'],$path);

            $sql = "INSERT INTO `tbl_register`(`name`, `gender`, `phonenumber`, `course`, `profile`) 
            VALUES ('$name','$gender','$phonenumber','$course','$profile')";

            $rs =$connection->query($sql);
            if($rs){
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Add success!",
                                text: "Welcome you to join my school!",
                                icon: "success",
                                button: "Thank you!",
                                });
                        });
                    </script>
                ';
            }
        }
        else {
            echo '
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Add not Success!",
                            text: "Please, check your information against!",
                            icon: "error",
                            button: "Thank you!",
                            });
                    });
                </script>
            ';
        }
        // echo ''.$name.''.$gender.''.$phonenumber.''.$course.''.$profile.'';
    }
}
Insert();

function GetData() {
    global $connection;
    $rs = $connection->query("SELECT * FROM `tbl_register`");
    while($row = mysqli_fetch_assoc($rs)){
        echo'
            <tr style="font-family: Times New Roman;">
                <td class="bg-transparent fs-4">'.$row['id'].'</td>
                <td class="bg-transparent fs-4">'.$row['name'].'</td>
                <td class="bg-transparent fs-4">'.$row['gender'].'</td>
                <td class="bg-transparent fs-4">'.$row['phonenumber'].'</td>
                <td class="bg-transparent fs-4">'.$row['course'].'</td>
                <td class="bg-transparent fs-4"><img src="../Image/'.$row['profile'].'" alt="'.$row['profile'].'" class="Image-student"></td>
                <td class="bg-transparent fs-4">
                    <button class="btn btn-outline-success" id="btn-open-Update" name="btn-open-Update" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-box-arrow-in-down"></i> Update</button>
                    <button class="btn btn-outline-danger" id="btn-open-Delete" name="btn-open-Delete" data-bs-toggle="modal" data-bs-target="#staticBackdrop1"><i class="bi bi-trash3-fill"></i> Delete</button>
                </td>
            </tr>
        ';
    }
}


function Update(){
    global $connection;
    if(isset($_POST['btn-update'])){
        $id = $_POST['txtid'];
        $name = $_POST['txtname'];
        $gender = $_POST['txtgender'];
        $phonenumber = $_POST['txtphonenumber'];
        $course = $_POST['txtcourse'];
        $profile = $_FILES['txtprofile']['name'];
        if($profile){
            $profile = date('d-m-y-h-i-s').'-'.$profile;
            $path = '../Image/'.$profile;
            move_uploaded_file($_FILES['txtprofile']['tmp_name'],$path);
        }
        else{
            $profile = $_POST['old-image'];
        }
        
        if( !empty($name) && !empty($gender) && !empty($phonenumber) && !empty($course) && !empty($profile)){
            
            $sql = "UPDATE `tbl_register` SET `name`='$name',`gender`='$gender',`phonenumber`='$phonenumber',`course`='$course',`profile`='$profile' WHERE `id` ='$id'";
            $rs = $connection->query($sql);
            if($rs){
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Update success!",
                                text: "Update your data is success!",
                                icon: "success",
                                button: "Thank you!",
                                });
                        });
                    </script>
                ';
            }
        }
        else {
            echo '
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Add not Success!",
                            text: "Please, check your information against!",
                            icon: "error",
                            button: "Thank you!",
                            });
                    });
                </script>
            ';
        }
    }
}
Update();

function Delete(){
    global $connection;
    if (isset($_POST['btn-yes'])){
        $id = $_POST['deleteid'];
        $rs = $connection->query("DELETE FROM `tbl_register` WHERE `id`='$id'");
        if ($rs){
            echo '
                <script>
                    $(document).ready(function(){
                        swal({
                            title: "Delete success!",
                            text: "Delete your data is success!",
                            icon: "success",
                            button: "Thank you!",
                        });
                    });
                </script>
            ';
        }
    }
}
Delete();