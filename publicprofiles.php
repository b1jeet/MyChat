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
          .container a
          {
            
            font-size: 20px;
            color: black;
          }
          

      </style>
  </head>
    
  <body data-spy="scroll" data-target="#navbar" data-offset="0">
      <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
  <a class="navbar-brand" href="y.php">MyChat</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="timeline.php">Timeline<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="my_tweets.php">Tweets</a>
      </li>
        <li class="nav-item active">
        <a class="nav-link" href="publiprofiles.php">Public Profiles</a>
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
      <i><h2>Profiles to Follow</h2></i>
    <?php
    $con = mysqli_connect("localhost", "root", "", "twitter");
      $query="SELECT * FROM login LIMIT 10";
      $result=mysqli_query($con,$query);
      while($row=mysqli_fetch_assoc($result))
      {
          echo "<p><a href='profilepage.php?userid=".$row['id']."'>".$row['email']."</a></p>";
      }
    ?>
    </div>
    <div class="col-md-6">
    
    </div>
  </div>
</div>
      
      
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
  </body>
</html>