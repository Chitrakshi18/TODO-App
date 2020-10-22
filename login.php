<?php
    $con = mysqli_connect("localhost","root","mytodo","notes");
    if ($con)
    { 
            $umail = $_POST['uemail'];
            $pword = md5($_POST['pword']);
            $res = "SELECT * FROM user WHERE uemail = '$uemail'";
            $result = $con->query($res);
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {
                    $id = $row["id"];
                    $mail = $row["uemail"];
                    $pword = $row["pword"];

                    $agent_id = $id;
                    $pword = $pword;

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
                'pword' => $pword
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
