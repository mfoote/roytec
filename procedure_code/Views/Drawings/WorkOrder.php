<?php
    include('../../Database/dbconnect.php');
    include('../../Templates/Header.php');

    $partnumber = $_GET['WorkOrder'];

    $dbh = new PDO('odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};DBQ=\\\\RTCFS01\Common\Access Databases\Production\Even faster WO printing\Workorders.mdb; Uid=; Pwd=;');
    $stmt = $dbh->prepare("SELECT Btest.FPath, Btest.FName, Right([FPath],Len([FPath])-3) AS test, 'file:\\RTCFS01\Common\' AS test2, [test2] & [test] & [FName] AS Finished
    FROM Btest
    WHERE (((Btest.[DRWG]) Like '$partnumber%') AND ((Right([Fname],3))='pdf') AND ((Left([FPath],4))='S:\o'));");
    $stmt->execute();


?>
    <table>
    <tr>
        <td>Drawings</td>
    </tr>
    <?php foreach($stmt as $row): ?>
        <tr>
            <td><a href="<?=$row['Finished']?>"><?=$row['FName']?></a></td>
        </tr>
    <?php endforeach; ?>
    </table>
    <iframe src="../Drawings/PartNumbers/<?$partnumber?>" width="100%" height="100%" ></iframe>



