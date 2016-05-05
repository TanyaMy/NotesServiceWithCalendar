<!doctype html>   
<html>   
<head> 
    <meta charset="UTF-8" /> 
    <link rel="stylesheet" type="text/css" href="tabl_cal.css" />
    <title>May</title>   
</head>   
<body> 
    <?php
        @session_start();
        echo "<h2>Hello, ".$_SESSION["session_login"]."!</h2><br/>";
    ?>
    
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

    <table>
        <tr><td colspan="7" id = "may">May</td></tr>    
        <tr>
            <td id = "days">Mon</td>
            <td id = "days">Tue</td>
            <td id = "days">Wen</td>
            <td id = "days">Thur</td>
            <td id = "days">Fri</td>
            <td id = "days">Sat</td>
            <td id = "days">Sun</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><table><tr><td class="hover"><form action="newNote.php" method="post">
                <input  hidden name="datefromcalend" value="2016-05-01"</input><input type="image" img src="images/plus.png"></form></td>
                <td>1</td>
                <td  class="hover"><form action="calendar.php" method="post">
                <input  hidden name="datefromcal" value="2016-05-01"</input><input type="image" img src="images/look.png"></form>
                </td></tr></table></td>
        </tr>
        <?php
            for($i = 2; $i <= 31; $i++)
            {
                if(($i-1)%7 == 0 && i > 2) echo "<tr>";
                if($i < 10)
                    echo "<td><table><tr><td class='hover'><form action='newNote.php' method = 'post'>
                        <input  hidden name='datefromcalend' value='2016-05-0$i'></input><input type='image' img src='images/plus.png' >
                        </form></td>
                        <td>$i</td>
                        <td class='hover'><form action='calendar.php' method='post'>
                        <input hidden name='datefromcal' value='2016-05-0$i'></input><input type='image' img src='images/look.png'>
                        </form></td></tr>
                        </table></td>";
                if($i >= 10)
                    echo "<td><table><tr><td class='hover'><form action='newNote.php' method='post'>
                        <input  hidden name='datefromcalend' value='2016-05-$i'></input><input type='image' img src='images/plus.png'></form>
                        </td><td>$i</td>
                        <td class='hover'><form action='calendar.php' method = 'post'>
                        <input hidden name='datefromcal' value='2016-05-$i'></input><input type='image' img src='images/look.png'>
                        </form></td></tr>
                        </table></td>";
                if(($i-1)%7 == 0) echo "</tr>";        
            }
        ?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <input type="button" id="button" value="Log out" onClick='location.href="form.html"'>
</body>
</html>