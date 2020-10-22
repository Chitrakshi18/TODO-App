<?php
    $con = mysqli_connect("localhost","root","mytodo","todo-list");
    if ($con)
    {
            $name = $_POST['usernamename'];
            $useremail = $_POST['useremail'];
            $passwordword = md5($_POST['passwordword']);
            $res = "INSERT INTO username(name, useremail, passwordword) VALUES ('$name','$useremail','$passwordword')";
            mysqli_query($con, $res);

            $res1 = "SELECT * FROM username WHERE useremail = '$useremail'";
            $result = $con->query($res1);
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {
                    $id = $row["id"];
                    $passwordword = $row["passwordword"];

                    $agent_id = $id;
                    $passwordwordword = $passwordword;

                }

                $messgae = 'account created';
                $status = 200;
            }
            $requestData = array(
                'agent_id' => $id,
                'passwordwordword' => $passwordwordword
            );
            $responseData = array(
                'status' => $status,
                'status_message' => $messgae
            );
            header('Content-Type: application/json');
            echo json_encode($requestData);
            echo json_encode($responseData);
        
            
    }
