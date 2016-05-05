<!doctype html>   
<html>   
<head> 
    <meta charset="UTF-8" />    
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <title>Page title</title>   
</head>   
<body>   
    <header id="header">  
       <h1>Your page</h1>
    </header>   
      <?php
        @session_start();
         if(isset($_POST['title'])) $title = $_POST['title']; 
        if(isset($_POST['text'])) $text = $_POST['text']; 
        if(isset($_POST['datetime'])) $datetime = $_POST['datetime']; 

        $con = new MongoClient();
        $collection= $con->notes->data;
        if ($text != null && $text != "") {       
        $data = array('login' => $_SESSION["session_login"], 'title' => $title, 'text' => $text, 'datetime' => $datetime);
        $collection->insert($data);     
        }
        $con->close();
      ?>
    
    <div id ="main">
        <article id = "article">    
        <h2>Your notes</h2>
             <?php
                session_start();
                $datefromcal = $_POST['datefromcal'];
                if( $datefromcal != "")
                $_SESSION["session_datefromcal"] = $datefromcal;
                 $con = new MongoClient();
                 $collection= $con-> notes-> data;
                 $filter=array("login" =>$_SESSION["session_login"], "datetime"=> $_SESSION["session_datefromcal"]);
                 $list = $collection->find($filter);
                 $i = 1;
                    while($document = $list->getNext())
                    {

                        echo "Note № ".$i."<br/>";
                        echo "Title:".$document["title"]."<br/>";
                        echo "Text:".$document["text"]."<br/>";
                        echo "Date:".$document["datetime"];
                        echo
                            "<table>"
                            ."<tr>"
                            ."<td>"
                            ."<form method='post'  action='deleteNotes.php'>"
                            ."<input hidden name='noteToDelete' value=".$document['_id']."></input>"
                            ."<input type='image'  width='30' height='30' img src='images/delete.png'></input>"
                            ."</form>"
                            ."</td>"

                            ."<td>" 
                            ."<form method='post' action='edit.php'>"
                            ."<input hidden name='noteToEdit' value=".$document['_id']."></input>"
                            ."<input type='image' width='30' height='30' img src='images/edit.png'></input>"
                            ."</form>"
                            ."</td>"
                            ."</tr>"
                            ."</table>"."<br/>";  
                        $i++;
                    }
                  $con->close();
             ?>

        </article>
        <aside id="aside">
            <?php 
                @session_start(); 
                echo "<h3>Hello, ".$_SESSION["session_login"]."!</h3><p></p>";
            ?>
            <p></p>
            <form>           
                <input type="button" class="btn btn-primary" value="To calendar" onClick='location.href="tabl_cal.php"'><br/><br/>
                <input type="button" class="btn btn-primary" value="Log out" onClick='location.href="form.html"'>
            </form>
        </aside>
    </div>
</body>   
</html>   

