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
    <meta name="viewport" content="width=device-width">
    <title><?php echo $json_data['user']['username']; ?>'s badges</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Signika" rel="stylesheet">

    <style>
    body {
        /* font-family: 'Open Sans', sans-serif; */
        font-family: 'Signika', sans-serif;
        background-color:#FCFFFE;
        background-image:url('backgroundImage.png');
        background-repeat:no-repeat;
        background-size:100%;
        background-position: 0px 82px;

    }
    h1 {
        font-family: 'Montserrat', sans-serif;
        color:#2B2B2B;
    }
    a {
        font-size: 1.0em;
        font-weight:bold;
        text-decoration:none;
        color:#1649A0;
    }
    a:hover {
        text-decoration:underline;
        color:#2760AE;
    }

    hr {
        color:#6c6c6c;
    }

    @media (max-width:582px) {
       body {
           background-position: 0px 122px;
       }
    }


    </style>
</head>
<body>
    <header>
        <h1>My Badges from <a target="_blank" href="http://www.codeschool.com">CodeSchool.com</a></h1>
    </header>

    <hr/>

    <section style="overflow:auto;margin:20px 0 20px 0">
        <div>
            <?php 
            foreach ($courses as $course) {
                echo '<div">';
                    echo '<div style="float:left;width:300px;overflow:auto;padding:10px;">';
                        echo '<div style="float:left;"><a  target="_blank" href="' . $course["url"] . '"><img style="width:100px;" src="' . $course["badge"] . '"/></a></div>';
                        echo '<div style="float:left;height:55px;width:190px;padding-left:10px;padding-top:25px;"><a target="_blank" style="word-wrap:break-word;" href="' . $course["url"] . '">' . $course["title"] . '</a></div>';
                    echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <hr/>

    <footer style="margin-top:20px;margin-bottom:10px;font-size:0.7em;">
        <p>&copy 2016. Robert Giffin</p><br/><br/>
    </footer>
</body>
</html>


 