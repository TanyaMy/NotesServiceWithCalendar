<html>
    <head>
        <link href="styles.css" rel="stylesheet" type="text/css">
        <title>New Note</title>
        <meta charset="UTF-8">
          <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <div class="alert alert-success" role="alert"><h4>New note:)</h4></div>
        <div id="all"> 
            <form action="calendar.php" method="post" name="r_form" >
                <table align="center" cellspacing="" cellpadding="3" class="table">   
                 <tr align="center"><td><h1>New note</h1></td></tr>
               <tr>
                <td><h3>Title:</h3> </td>
                <td> <input type="text" name="title" class="input" /> </td>
               </tr>
               <tr>
                <td><h3>Text:</h3></td>
                <td><textarea  name="text" class="input"/></textarea></td>
               </tr>
               <tr>
                <td><h3>Date:</h3> </td>   
                    <?php
                    @session_start();       
                    $datefromcal = $_POST['datefromcalend'];        
                    if($datefromcal != ""){
                    $_SESSION["session_datefromcal"] = $datefromcal;
                    $date =  $_SESSION["session_datefromcal"];
                    }
                    echo  "<td><input type='date' name='datetime' value='$date' class='input' readonly /></td>";
                    ?> 
               </tr>
               <tr>
                <td colspan="2" height="50"> <input type="submit" class="btn btn-success" name="r_send" value="Add" /></td>
                   <td colspan="2" height="50"> <input type="reset"  class="btn btn-warning" name="r_reset" value="Reset" /></td>
               </tr>
                 <tr>   
                   <td align = "center" colspan="4" height="50"><input type="button" class="btn btn-default"
                    onClick='location.href="calendar.php"' value="Back" /></td>
               </tr>
              </table>  
            </form>
        </div>    
    </body>
</html>