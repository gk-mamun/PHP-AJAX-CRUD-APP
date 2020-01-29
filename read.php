<?php 

    include('config/config.php');

    $database = new Database();

    extract($_POST);

    if(isset($_POST['readrecord'])) {

        $data = '
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th colspan="2">Action</th>
                </tr> 
            </thead>
            <tbody>
        ';
        $database->query('SELECT * FROM users');
        $database->execute();
        $results = $database->resultset();
        $usernum = $database->rowcount();

        if($usernum > 0 ){
            $number = 1;

            foreach($results as $user => $row) {
                $data .= '
                    <tr>
                        <td>' . $number . '</td>
                        <td>' . $row['fname'] . '</td>
                        <td>' . $row['lname'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>
                            <button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning">Update</button>
                        </td>
                        <td>
                            <button onclick="GetDeleteUserId('.$row['id'].')" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                ';
                $number++;
            }
        }

        $data .= '  </tbody>
                </table>';
        echo $data;
    }

?>