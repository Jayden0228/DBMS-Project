<?php
    $ch=curl_init();
    $url='http://localhost:8000';

    $datas=array("pid"=>"CRAF-15-D#2");
    $data=http_build_query($datas);
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    $resp=curl_exec($ch);
    if($e=curl_error($ch)){
        echo $e;
    }
    else{
        $decoded=json_decode($resp);
        $decoded=json_decode($decoded);
        print_r($decoded);
        // echo $decoded->Top10Rec[0];

        // $pids= $decoded->Top10Rec;


        include "../Php/_connectDatabase.php";

        // for($x=0;$x<9;$x++)
        // {
        //     $sql = "SELECT * FROM `product` WHERE `pid` = '".(string)$pids[$x]."'";
        //     $res=mysqli_query($db,$sql);
        //     if(mysqli_num_rows($res)!=0)
        //     {
        //         $row=mysqli_fetch_array($res);
        //             echo "<br>".$row['pid'];
        //     }
        //     else{
        //         echo "Zero<br>";
        //     }
        // }

        mysqli_close($db);

    }
    curl_close($ch);
?>
