<?php
    $con = mysqli_connect("localhost","root","mytodo","notes");
    if ($con)
    { 
            $useremail = $_POST['mail'];
            $password = md5($_POST['password']);
            $res = "SELECT * FROM user WHERE useremail = '$useremail'";
            $result = $con->query($res);
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {
                    $id = $row["id"];
                    $mail = $row["useremail"];
                    $password = $row["password"];

                    $agent_id = $id;
                    $passwordword = $password;

                }

                $messgae = 'success';
                $status = 200;
            }
           
         else {
                 $messgae = "failure.";
                $status = 401;
            }

            $requestData = array(
                'agent_id' => $agent_id,
                'passwordword' => $passwordword
            );


            
            $responseData = array(
                'status' => $status,
                'status_message' => $messgae,
                'agent_id' => $agent_id
            );
            header('Content-Type: application/json');
            echo json_encode($requestData);
            echo json_encode($responseData);
        
        
    }
?>