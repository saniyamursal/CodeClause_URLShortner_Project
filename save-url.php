<?php

    include "config.php";
    $og_url = mysqli_real_escape_string($conn, $_POST['shorten_url']);
    $shorten_url = str_replace('','', $og_url);
    $hidden_url = mysqli_real_escape_string($conn, $_POST['hidden_url']);


    if(!empty($shorten_url)){
    
        //let's check user have edited or remove domain name or not
        if(preg_match("/\//i", $shorten_url)){
            $explodeURL = explode('/', $shorten_url);
            $short_url = end($explodeURL); //getting last value of full url
            if($short_url != ""){
                $sql = mysqli_query($conn, "SELECT shorten_url FROM url WHERE shorten_url = '{$short_url}' && shorten_url != '{$hidden_url}'");
                if(mysqli_num_rows($sql) == 0){  //if user entered url doesn't exist into database
                    //let update the link or url
                    $sql2 = mysqli_query($conn, "UPDATE url SET shorten_url = '{$short_url}' WHERE shorten_url = '{$hidden_url}'");
                    if($sql2){ //if url updated
                        echo "success";
                    }else{
                        echo "Error - Failed to update link!";
                    }
                }else{
                    echo "The short url that you've entered already exist. Please enter another one!";
                }
            }else{
                echo "Required - You have enter short url!";
            }
        }else{
            echo "Invalid URL -  You can't edit domain name!";
        }
    }else{
        echo "Error - You have enter short URL!";
    }
?>