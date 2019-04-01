<?php
/**Config File for DB connection**/
require 'config.php' ;
/******Selecting Collection For usage*******/
$i=0 ;
if (isset($_POST['feedback'])) {
  $var = 'feedback';
  $feedback = $_POST['feedback'] ;
  $collection = $db->$var;
  /*Inserting Data in DB*/
  $result = $collection->insertOne( [  'date' => date('Y/m/d')   , 'feedback' => $feedback ] );
  /***Output for the insertion shown***/
  if(isset($result)){
  $i = 1 ;
  echo "Inserted with Object ID '{$result->getInsertedId()}'";
}
else{ $i=2 ; }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Anonymous Feedback form </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="form.css" >
        <script src="form.js"></script>
    </head>
    <body >
        <div class="container">
            <div id="form-main">
                <div id="form-div">
                  <!-- id="reused_form"  -->
                    <form class="montform" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                        </p>
                        <?php
                        if($i==1){ echo'
                        <div class="form-group">
                            <div class="alert alert-success">Feedback Added Successfully</div>
                        </div>';

											}
                        if($i==2){ echo'
                        <div class="form-group">
                            <div class="alert alert-danger">Error Sending Feedback</div>
                        </div>';
											//	echo "<script> alert($result); </script>";

											} ?>
                        <p class="text">
                            <textarea name="feedback" class="feedback-input" id="comment" placeholder="Feedback"></textarea>
                        </p>
                        <div class="submit">
                            <button type="submit" class="button-blue">SUBMIT</button>
                            <div class="ease"></div>
                        </div>
                    </form>
                    <div id="error_message" style="width:100%; height:100%; display:none; ">
                        <h4>
                            Error
                        </h4>
                        Sorry there was an error sending your form.
                    </div>
                    <div id="success_message" style="width:100%; height:100%; display:none; "> <h2>Success! Your Message was Sent Successfully.</h2> </div>
                </div>
            </div>
        </div>
    </body>
</html>
