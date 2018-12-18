<?php


if (is_ajax()) {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        if(isset($_GET['q'])&&!empty($_GET['q']))
        {

            require_once "connect_database.php";
            $list = array();
            $search=$_GET['q'];
            $sql='SELECT u.Id,u.Firstname,u.Lastname 
                                FROM tblusers as u 
                                WHERE u.Firstname LIKE ? or u.Lastname LIKE ? 
                                or u.Email LIKE ?';
            $stmt = $stmt= $db->prepare($sql);
            $stmt->execute(['%'.$search.'%','%'.$search.'%','%'.$search.'%']);
            while ($row = $stmt->fetch()) {
                $list[] = array(
                    'id' => $row['Id'],
                    'name' => "{$row['Lastname']} {$row['Firstname']}"
                );
            }
            header('Content-Type: application/json');
            echo json_encode($list);
        }


    }
}

//Function to check if the request is an AJAX request
function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
?>