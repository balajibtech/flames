<?php
ini_set("display_errors",1);

//Declare the varibles
$_Smessage = '';
$_SfirstName = '';
$_SsecondName = '';

//After form submitting below code will start execute
if(isset($_POST['flames'])) {

    //Register the autoload function
    spl_autoload_register(function ($_SclassName) {
        require_once $_SclassName . '.php';
    });
    
    //Assign the variables
    $_SfirstName = $_POST['firstName'];
    $_SsecondName = $_POST['secondName'];

    //Call the class to run the flames
    $_Oflames = new flames($_SfirstName, $_SsecondName);
    if($_Oflames->_run())
        $_Smessage = "You guys are now, <b>".$_Oflames->_Srelationship."</b>";
    else
        $_Smessage = $_Oflames->_Srelationship;
}
?>

<form method="post" action="" autocomplete="off">
    <table align='center' cellspacing='5' cellpadding='5'>
        <thead>
            <tr>
                <th colspan='2'>FLAMES Calculation</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th align='left'><label>First Name</label></th>
                <td><input type="text" name="firstName" value="<?php echo $_SfirstName; ?>" /></td>
            </tr>
            <tr>
                <th align='left'><label>Second Name</label></th>
                <td><input type="text" name="secondName" value="<?php echo $_SsecondName; ?>" /></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td align='center' colspan='2'><input type="submit" name="flames" value="FLAMES" /></td>
            </tr>
            <tr>
                <td align='center' colspan='2'><i><?php echo $_Smessage; ?></i></td>
            </tr>
        </tfoot>
    </table>
</form>