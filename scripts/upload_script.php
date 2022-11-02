<?php   

if(isset($_POST["save"])) 
{
  if( $_FILES['fileToUpload']['name'] != "" )
  {
    $source = $_FILES['fileToUpload']['tmp_name'];
    $destination = "../uploads/" . $_FILES['fileToUpload']['name'];

    echo $source."<br>";
    echo $destination;
    
    copy ($source, $destination ) 
    or die( "Could not copy file" );

    
  }
  else
  {
    die( "No file specified" );
  }
}

?>