<?php
if(isset($_POST['submit'])){
    if(isset($_FILES['video']) AND !empty($_FILES['video'])){
        $video_name=strip_tags($_FILES['video']['name']) ; 
        $tmp_name= strip_tags($_FILES['video']['tmp_name']) ;
        $erro= strip_tags($_FILES['video']['error']);

        // recuperer la connexion a $base
        require_once('config.php');
      if($erro===0){
        die("erreur lors de l'enregistrement");
      }  
      $video_ex=pathinfo($video_name, PATHINFO_EXTENSION);

      $video_ex_lc=strtolower($video_ex);
      $allowed=[
            "mp4",
            "webm",
            "avi",
            "flv"
      ];
      if(!in_array($video_ex_lc, $allowed)){
        $errormsg="format de fichier incorrect !";
        header("location: index.php?error:$errormsg");
      }
      
    //   modifier le nom du fichier video.
      $new_video_name=uniqid("video-",true).'.'.$video_ex_lc ;
      
      $video_upload_path="uploads_videos/".$new_video_name;

      $sql="INSERT INTO videos(video_url) VALUES ('$new_video_name')";
      mysqli_query($dbb, $sql);

      header('location: view.php');



      move_uploaded_file($tmp_name, $video_upload_path);

      

    }else{
         header('location: index.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload_video</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: center;
            flex-direction: column;
            min-height: 100vh;
        }
        input{
            font-size: 2rem;
        }
    </style>
</head>
<body>
    
   
    <form  method="post" enctype="multipart/form-data" >
    <input type="file" name="video">
    <input type="submit" name="submit" value="upload">
    </form>
</body>

</html>