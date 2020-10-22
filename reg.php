<?php
    $con = mysqli_connect("localhost","chittu","Chitrakshi","todo-list");
    if ($con)
    {
            $name = $_POST['uname'];
            $uemail = $_POST['uemail'];
            $pword = md5($_POST['pword']);
            $res = "INSERT INTO username(name, uemail, pword) VALUES ('$name','$uemail','$pword')";
            mysqli_query($con, $res);

            $res1 = "SELECT * FROM username WHERE uemail = '$uemail'";
            $result = $con->query($res1);
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {
                    $id = $row["id"];
                    $pword = $row["pword"];

                    $agent_id = $id;
                    $pword = $pword;

                }

                $messgae = 'account created';
                $status = 200;
            }
            $requestData = array(
                'agent_id' => $id,
                'pword' => $pword
            );
            $responseData = array(
                'status' => $status,
                'status_message' => $messgae
            );
            header('Content-Type: application/json');
            echo json_encode($requestData);
            echo json_encode($responseData);
        
            
    }
