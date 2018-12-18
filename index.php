<?php require_once "connect_database.php" ?>
<?php include_once "_header.php"; ?>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="droplist">
                <input type="text"
                       name="userInput"
                       id="userInput"
                       placeholder="search..."/>
                <div id="droplistContent" class="dropdown-content">
                </div>
            </div>

            <h1>Авто сервіс Вкрути Лампочку</h1>

            <div class="row">
                <a href="create.php" class="btn btn-success">Додати</a>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $stmt = $db->query('SELECT Id,Email,Firstname,Lastname FROM tblusers');
                    while ($row = $stmt->fetch()) {
                        echo "
                        <tr>
                            <td></td>
                            <td>" . $row['Lastname'] . " " . $row['Firstname'] . "</td>
                            <td>{$row['Email']}</td>
                        </tr>
                              ";
                    }
                    ?>
                    </tbody>
                </table>
            </div>


        </div>
    </div>


<?php include_once "_footer.php"; ?>