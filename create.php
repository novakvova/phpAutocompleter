<?php
$errors = array();
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include "connect_database.php";

    $lastname;
    if(isset($_POST['lastname'])and !empty($_POST['lastname']))
    {
        $lastname=$_POST['lastname'];
    }
    else
        $errors['lastname']="Last name is empty";

    $firstname;
    if(isset($_POST['firstname'])and !empty($_POST['firstname']))
    {
        $firstname=$_POST['firstname'];
    }
    else
        $errors['firstname']="First name is empty";

    $email;
    if(isset($_POST['email'])and !empty($_POST['email']))
    {
        $email=$_POST['email'];
    }
    else
        $errors['email']="Email is empty";
    if(count($errors)==0)
    {
        $sql = "INSERT INTO `tblusers`(`Email`, `Firstname`, `Lastname`, `Password`) 
                  VALUES (?,?,?,'123456')";
        $stmt= $db->prepare($sql);
        $stmt->execute([$email, $firstname, $lastname]);

        $linkIndex="/index.php";
        header("Location: {$linkIndex}");
        exit;
    }
}
?>


<?php include_once "_header.php"; ?>

    <div class="container">

        <h1>Додати користувача</h1>

        <?php
        if(count($errors)!=0)
        { ?>
            <div class="alert alert-danger" role="alert">
                Заповніть поля!
            </div>
            <?php
        }
        ?>

        <form method="post" action="create.php">
            <div class="form-group row">
                <label for="firstname" class="col-sm-2 col-form-label">First name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="firstname"
                           id="firstname" placeholder="First name">
                </div>
            </div>
            <div class="form-group row">
                <label for="lastname" class="col-sm-2 col-form-label">Last name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="lastname"
                           id="lastname" placeholder="Last name">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

<?php include_once "_footer.php"; ?>