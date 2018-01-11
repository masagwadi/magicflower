<?php
    if(isset($_POST['submit'])){
        echo $_POST['yoo'][0]."<br>";
        echo $_POST['yoo'][1];
        
    }

?>



<form method="post" action="">
    <input type="text" value="TESTING" name="yoo[]" />
    <input type="text" value="TESTING" name="yoo[]" placeholder="hold me down" />
    <input type="submit" value="SEND" name="submit" />
</form>