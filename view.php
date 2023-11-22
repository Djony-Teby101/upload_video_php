<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View video</title>
</head>
<body>
    <H1>welcome</H1>

    <a href="index.php">Upload</a>
    <div class="alb">
        <?php
        require_once('config.php');
        $sql="SELECT * FROM videos ORDER BY id DESC";
        $res=mysqli_query($dbb, $sql);

        if(!mysqli_num_rows($res)>0){
            echo('Empty');
        }

        while($video=mysqli_fetch_assoc($res)){ ?>
            
            <video controls src="uploads_videos/<?=$video['video_url']?>" width="250" height="250">
        
            </video>
       <?php
            ?>
            <?php   
        }
        ?>
</body>
        
</html>