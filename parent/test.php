<?php
require_once "../connection.php";
$id_sql = "SELECT * FROM test WHERE sn= 1";
$data = $conn->query($id_sql);
$rows = $data->fetchALL(PDO::FETCH_ASSOC);

if (isset($_POST['btn']))
{
    if (isset($_POST['name'])) {
        $sql="UPDATE test SET name = :name, position = :position WHERE sn= '1' ";
        $data=$conn->prepare($sql);
        $data->execute(array(
            ':name'=>htmlentities($_POST['name']),
            ':position'=>htmlentities($_POST['position'])
        ));
    }

else
    {
        echo "Error";
    }
}

?>

<html>
<title>test</title>
<body>
<form method="post">
    <label id="name">Name:</label>
    <input name="name" value="<?php echo $rows[0]['name']?>" type="text" id="name">
    <label id="position">Position:</label>
    <input name="position" value="<?php echo $rows[0]['position']?>" type="text" id="position">
    <button name="btn"> Submit </button>
</form>
</body>
</html>
