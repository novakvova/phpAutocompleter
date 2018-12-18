<?php


if (is_ajax()) {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        if(isset($_GET['q'])&&!empty($_GET['q']))
        {
            require_once "connect_database.php";
            $list = array();
            $stmt = $db->query('SELECT Id,Firstname,Lastname FROM tblusers');
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