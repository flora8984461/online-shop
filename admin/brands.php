<?php
require '../core/init.php';
include 'includes/head.php';
include 'includes/nav.php';

$sql="SELECT * FROM brand ORDER BY brand";
$result = $db -> query($sql);

$errors = array();

//Edit brand
if(isset($_GET['edit'])&&!empty($_GET['edit'])){
    $edit_id = (int)$_GET['edit'];
    $sql2 = "SELECT * FROM brand WHERE id = '$edit_id'";
    $edit_result = $db -> query($sql2);
    $edit_brand = mysqli_fetch_assoc($edit_result);
}


//Delete brand
if(isset($_GET['delete'])&&!empty($_GET['delete'])){
    $delete_id = (int)$_GET['delete'];
    $sql = "DELETE FROM brand WHERE id='$delete_id'";
    $db -> query($sql);
    header('Location:brands.php');
}

if(isset($_POST['add_submit'])){
    $brand = $_POST['brand'];
//check if brand is blank
    if($_POST['brand']==''){
        $errors[] .= 'You must enter a brand'; // ".=" concatenate
    }
//check if brand exists in db
    $sql = "SELECT * FROM brand WHERE brand ='$brand'";
    $anotherresult = $db -> query($sql);
    $count = mysqli_num_rows($anotherresult);
    if($count > 0){
        $errors[] .= $brand.' already exists'; // .'' concatenate
    }
//display errors
    if(!empty($errors)){
        echo display_errors($errors);
    }else{
        //add brand to db
        $sql = "INSERT INTO brand (brand) VALUES ('$brand')";
        if(isset($_GET['edit'])){
            $sql = "UPDATE brand SET brand = '$brand' WHERE id = '$edit_id'";
        }
        $db -> query($sql);
        header('Location:brands.php');  //refresh the page, php header() function
    }


}
?>


<h2 class="text-center" style="margin:20px;">Brands</h2>
<table class="table table-bordered table-striped">
    <thead>
        <th></th> <th>Brand</th> <th></th>
    </thead>

    <!--add brand form-->
    <div class="form-inline">
        <form method="post" action="brands.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:''); ?>" class="form-inline form-group mx-sm-3 mb-2">
            <div class="form-group mb-2">

                <?php
                $brand_value="";
                if(isset($_GET['edit'])){
                $brand_value = $edit_brand['brand'];}

                    elseif(isset($_POST['brand'])){
                        $brand_value = $_POST['brand'];};


                    ?>
                <label for="brand"><b><?=((isset($_GET['edit']))?'Edit':'Add a');?> brand</b></label> <!--the "for" is the id "brand" at next line-->
                <input type="text" class="form-control"
                       style="width:auto;margin:5px;"
                       name="brand" id="brand" value="<?=$brand_value; ?>">
                <!--if user input and submit, is stays the brand that user inputs, if no, stays blank , isset(), $_POST[]-->
                <!--the name "brand" is the key in the $_POST['']-->

                <input type="submit" name="add_submit" value="<?=((isset($_GET['edit']))?'Edit':'Add a');?> brand" class="btn btn-primary">
            </div>
        </form>
    </div>


    <tbody>
        <?php while ($brand = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><a href="brands.php?edit=<?php echo $brand['id']; ?>" class="btn btn-xs btn-default"><i class="fas fa-pencil-alt"></i></a></td>
            <td><?php echo $brand['brand'];?></td>
            <td><a href="brands.php?delete=<?php echo $brand['id']; ?>" class="btn btn-xs btn-default"><i class="fas fa-trash-alt"></i></a></td>
        </tr>
        <?php endwhile?>
    </tbody>
</table>

