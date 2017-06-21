<!-- Static navbar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php?site=home"><img src="res/img/logo-font.svg" style="height:50px"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
             <?php
             if($_SESSION['status']=="user"||$_SESSION['status']=="admin"){
                $xmlFile = 'inc/menuXML.xml'; 

                if (file_exists($xmlFile)) { 
                $xml = simplexml_load_file($xmlFile);
                    foreach ( $xml->item as $item )   
                    {  
                       echo '<li><a href="index.php?site='.trim($item->id).'">'.$item->name.'</a></li>';   
                       
                       if (isset($_GET['site'])){
                            if($_GET['site']===trim($item->id)){
                                $_SESSION['href']= trim($item->href);
                                $_SESSION['active']=$_GET['site'];
                            }
                       }else{

                                $_SESSION['href']= "sites/home.php";
                                $_SESSION['active']="home";
                            }
                       
                    }  
                }
                else {
                    echo "no XML found";
                }
             }
            ?>
            
             
              
          </ul>
          <ul class="nav navbar-nav navbar-right">
            
            <?php
                if(isset($_SESSION['status'])&&($_SESSION['status']=="user"||$_SESSION['status']=="admin")){
                    echo '<li><a href="index.php?site=Logout">Log Out</a></li>';
                }else{
                    echo '<li><a href="index.php?site=home">Log in</a></li>';
                }
            ?>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>