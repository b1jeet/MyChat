
<html lang="en">
  <head>

      <title>Hello, world!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
      <style>
          
          .jumbotron
          {
              background-image: url(photo-1528920304568-7aa06b3dda8b.jpg);
              text-align: center;
          }
          
        .input-group
          {
              position: relative;
              left: 450px;
          }
          #appheader
          {
              font-size: 50px;
              margin-left: 325px;
          }
          .card-img-top
          {
              width: 100%;
              height: 250px;
          }
          #appStoreIcon {
              
              width: 200px;
              
          }
          
          #footer {
              
              background-color: aqua;
              padding-top: 150px;
              margin-top: 50px;
              text-align: center;
              padding-bottom: 150px;
          }
          
          body {
               position:relative;
               width: 100%;
               background-image: url(Testimonial-Background.jpg);
               
          }
          .form-control: hover{
            background-color: #f2cd96;
          }
          #session
          {
            background-color: #d0e5ac;
            text-decoration-color: #177493;
            font-size: 30px;
            padding: 5px;
            border-radius: 10px;
            font-family: 'Ink Free',serif;
          }
          .time
          {
            color: grey;
          }
      .tweet
          {
            border: 1px solid #deed12;
            border-radius: 5px;
            padding: 5px;
            margin: 5px; 
          }
          .tweet:hover
          { 
            border: 1px solid #deed12;
            border-radius: 5px;
            padding: 5px;
            margin: 5px;
            background: url("GettyImages-588489711-5c7969e3c9e77c0001e98e49.jpg");
            color: white; 
          }
          .post_tweet
          {
            padding-top: 25px;
            padding-left: 100px;
            padding-bottom: 950px;
            padding-right: 550px;
            
          }
          .container
          {
            
            
          }
          
o
      </style>
  </head>
    
  <body data-spy="scroll" data-target="#navbar" data-offset="0">
      <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
  <a class="navbar-brand" href="main.html">MyChat</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="timeline.php">Timeline</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="my_tweets.php">Tweets</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="publicprofiles.php">Public Profiles</a>
      </li>
      
    </ul>
    <div id="session">
    <?php
    session_start();
    $first_name=$_SESSION['varname'];
    echo "HELLO, $first_name";
    ?>
  </div>
  </div>
</nav>
<div class="container">
      <div class="row">
    <div class="col-md-6">
      
      <i><h2>Recent Tweets</h2></i>
      <?php
      $con=mysqli_connect("localhost","root","","twitter");
      $x=$_SESSION['varname'];
      
      $sql = "SELECT id FROM login WHERE first_name='$x'";
$r = mysqli_query($con, $sql);
$ro = mysqli_fetch_assoc($r);
 $h = $ro["id"] ;
 
if (mysqli_num_rows($r) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($r)) {
        echo "id: ";
}
}
         function displaytweets()
      {
        
        global $con;
        global $h;
        $query="SELECT * FROM tweets ORDER BY `datetime` DESC LIMIT 5 ";
        $result=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            $userquery="SELECT * FROM login WHERE id=".mysqli_real_escape_string($con,$row['userid']);
            $userqueryresult=mysqli_query($con,$userquery);
            $user = mysqli_fetch_assoc($userqueryresult);
            echo "<div class='tweet'><p><h6>".$user['email']." </h6><span class='time'>".time_since(time()-strtotime($row['datetime']))." ago</span>:</p>";
            echo "<p>".$row['tweet']."</p>";
            echo "<form action='follow.php' method='POST'><p><input id='followbutton' type='submit' class='btn btn-success' value='Follow' onclick='hideaction()'></input></p><p><input type='hidden' id='userid' name='userId' value='".$row['userid']."'></p><p><input type='hidden' id='id' name='id' value='".$h."'></p></form>";

            echo "<form action='unfollow.php' method='POST'><p><input id='unfollowbutton' type='submit' class='btn btn-warning' value='Unfollow'></input></p><p><input type='hidden' id='userid' name='userId' value='".$row['userid']."'></p><p><input type='hidden' id='id' name='id' value='".$h."'></p></form></div>";
        }
         
     }


              
              function time_since($since) {
        $chunks = array(
            array(60 * 60 * 24 * 365 , 'year'),
            array(60 * 60 * 24 * 30 , 'month'),
            array(60 * 60 * 24 * 7, 'week'),
            array(60 * 60 * 24 , 'day'),
            array(60 * 60 , 'hour'),
            array(60 , 'min'),
            array(1 , 'sec')
        );

        for ($i = 0, $j = count($chunks); $i < $j; $i++) {
            $seconds = $chunks[$i][0];
            $name = $chunks[$i][1];
            if (($count = floor($since / $seconds)) != 0) {
                break;
            }
        }

        $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
        return $print;
    }
   
displaytweets();

      ?>
    
    </div>
    <div class="col-md-6">
      <div class="post_tweet">
    <?php
          
    function displayTweetBox() {
        
                    global $h;
     
            echo '<form class="form-inline" action="posttweet.php" method="post">
                <div class="form-group">
                <textarea class="form-control" id="tweetcontent" name="tweetcontent"></textarea>
                <p><input type="hidden" id="loginid" name="loginid" value="'.$h.'"></p>
                &nbsp;
                <p><button type="submit" class="btn btn-danger" id="post_button">Post Tweet</button></p>
                
                </div>
            </form>';
            
            
        
  }
  displayTweetBox();
    ?>
    </div>
  </div>
</div>
      
      
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
  </body>
</html>
