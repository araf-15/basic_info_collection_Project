<?php include "inc/header.php";?>

<?php
spl_autoload_register(function($class_name){
    include"Connections/".$class_name.".php";
});
?>


<section class="mainleft">
    <?php
    $user = new Teacher();
    if(isset($_POST['create'])){
        $name = $_POST['name'];
        $dept = $_POST['dept'];
        $age  = $_POST['age'];

        $user->setName($name);
        $user->setDept($dept);
        $user->setAge($age);

        if($user->insert()){
            echo "<span class='insert'>Data Inserted Successfully...!!!</span>";
        }
    }
    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $dept = $_POST['dept'];
        $age = $_POST['age'];

        $user->setName($name);
        $user->setDept($dept);
        $user->setAge($age);

        if($user->update($id)){
            echo "<span class='insert'>Data Updated Successfully...!!!</span>"; 
        }
    }

    ?>


<?php
    if(isset($_GET['action']) && $_GET['action'] == 'delete'){
        $id = (int)$_GET['id'];
        if($user->delete($id)){
            echo "<span class = 'delete'>Data Deleted Successfully...</span>";   
        }
    }
?>


<?php
    if(isset($_GET['action']) && $_GET['action'] == 'edit'){
        $id = (int)$_GET['id'];
        $result = $user->readById($id);

?>

<form action="" method="post">
 <table>
    <input type="hidden" name="id" value = "<?php echo $result['id'];?>"/>
    <tr>
        <td>Name: </td>
        <td><input type="text" name="name" value = "<?php echo $result['name'];?>" required="1"/></td>    
    </tr>

    <tr>
       <td>Department: </td>
        <td><input type="text" name="dept" value="<?php echo $result['dept']; ?>" required="1"/></td>
    </tr>

    <tr>
      <td>Age: </td>
        <td><input type="text" name="age" value="<?php echo $result['age'];?>" required="1"/></td>
    </tr>
    <tr>
      <td></td>
        <td>
        <input type="submit" name="update" value="Submit"/>
        <input type="reset"  name= "clear" value="Clear"/>
        </td>
    </tr>
  </table>
</form>

<?php } else{?>

<form action="" method="post">
 <table>
    <tr>
        <td>Name: </td>
        <td><input type="text" name="name" placeholder="Enter Name" required="1"/></td>    
    </tr>

    <tr>
       <td>Department: </td>
        <td><input type="text" name="dept" placeholder="Enter Department" required="1"/></td>
    </tr>

    <tr>
      <td>Age: </td>
        <td><input type="text" name="age" placeholder="Enter" required="1"/></td>
    </tr>
    <tr>
      <td></td>
        <td>
        <input type="submit" name="create" value="Submit"/>
        <input type="reset"  name="clear" value="Clear"/>
        </td>
    </tr>
  </table>
</form>

<?php } ?>
</section>



<section class="mainright">
  <table class="tblone">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Department</th>
        <th>Age</th>
        <th>Action</th>
    </tr>
<?php
$i=0;
    foreach ($user->readAll() as $key => $value) {
        $i++;
?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value ['name']; ?></td>
        <td><?php echo $value ['dept']; ?></td>
        <td><?php echo $value ['age']?></td>
        <td>

            <?php echo "<a href='teacher.php?action=edit&id=".$value['id']."'>Edit</a>";?>


        <!-- <a href="">Edit</a> --> ||
        <!-- <a href="">Delete</a> -->
            <?php echo "<a href='teacher.php?action=delete&id=".$value['id']."'onClick='return confirm(\"Are you sure to Delete Data...!!!\")'>Delete</a>";?>

        </td>
    </tr>
<?php }?>
  </table>
</section>
<?php include "inc/footer.php";?>