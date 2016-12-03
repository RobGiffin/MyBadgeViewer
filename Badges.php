<?php
//header('Content-Type: application/json');
$data = file_get_contents("https://www.codeschool.com/users/giffinr.json");
//important page above has to be made public for the json to work.
//var_dump($data);
$json_data = json_decode($data, true );
//var_dump($json_data);
$courses = $json_data['courses']['completed'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $json_data['user']['username']; ?>'s badges</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <style>
    body {
        font-family: 'Open Sans', sans-serif;
        background-color:#F6F8F8;
    }
    h1 {
        font-family: 'Montserrat', sans-serif;
        color:#2B2B2B;
    }
    a {
        font-size: 0.9em;
        text-decoration:none;
        color:#6c6c6c;
    }
    hr {
        color:#6c6c6c;
    }


    </style>
</head>
<body>
    <header>
        <h1>My Badges from CodeSchool.com</h1>
    </header>

    <hr/>

    <section style="overflow:auto;margin:20px 0 20px 0">
        <div>
            <?php 
            foreach ($courses as $course) {
                echo '<div">';
                    echo '<div style="float:left;width:300px;overflow:auto;padding:10px;">';
                        echo '<div style="float:left;"><img style="width:100px;" src="' . $course["badge"] . '"/></div>';
                        echo '<div style="float:left;height:55px;width:190px;padding-left:10px;padding-top:35px;"><a style="word-wrap:break-word;" href="' . $course["url"] . '">' . $course["title"] . '</a></div>';
                    echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <hr/>

    <footer style="margin-top:20px;font-size:0.7em;font-style:italic;">
        <p>&copy 2016. Robert Giffin</p>
    </footer>
</body>
</html>


 