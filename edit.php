<html>
    <head>
        <link href="styles.css" rel="stylesheet" type="text/css">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <title>Edit Note</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div id = "all">
           <?php 
                @session_start();
                $id = $_POST['noteToEdit'];
                $con = new MongoClient();
                $collection = $con->notes->data;
                $note = $collection->findOne(array('_id' => new MongoId($id)));

                echo "<form action='editNotes.php' method='post' >
                <table align='center'  cellpadding='3' class ='table'>   
                   <tr align='center'><td><h1>Edit note</h1></td></tr>
                   <tr>
                    <td><h3>Title:</h3> </td>
                    <td> <input type='text' class='input' name='title' value=".$note['title']."></input></td>
                   </tr>
                   <tr>
                    <td><h3>Text:</h3> </td>
                    <td> <textarea name='text' class='input' >".$note['text']."</textarea></td>
                   </tr>
                     <tr>
                    <td><h3>Date:</h3> </td>
                    <td><input type='date' name='datetime' value=".$note['datetime']." class='input' readonly /> </td>
                   </tr>
                   <tr>
                    <td colspan='2' height='50'><input type='button' class='btn btn-default' onClick='location.href=`calendar.php`' value='Back'/>
                    </td>
                      <input hidden name='noteToedit' value=".$note['_id']."></input>
                       <td colspan='2' height='50'> <input type='submit'  class='btn btn-success' name='r_save' value='Save' /> </td>
                   </tr>
                  </table>
                  </form>
                 </body>";
                $con -> close();
            ?>
        </div>    
</html>