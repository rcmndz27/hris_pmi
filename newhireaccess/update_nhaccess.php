<?php 

    function UpdateEmployeeLevel($emplevel,$rowid)
    {
            global $connL;

            $cmd = $connL->prepare("UPDATE dbo.employee_profile SET ranking = :emplevel  where rowid = :rowid ");
            $cmd->bindValue('emplevel',$emplevel);
            $cmd->bindValue('rowid', $rowid);
            $cmd->execute();
    }


?>
