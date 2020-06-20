<?php
        //setting up a connection to use for the database
        $dbh = new PDO('odbc:Driver={SQL Server};Server=192.168.1.15;Database=CI; Uid=chammack;Pwd=chammack1234');

        //Gets Work Center data for leads. This is the main View
        function workcenter($table,$machine) 
        {
                global $stmt; 
                global $dbh;

                if(!empty($machine))
                {
                        $stmt = $dbh->prepare("select * from $table where PPH <> 'CLO' AND Machine like '$machine%' or Machine like 'SCH%' or Machine like 'HARN%' Or Machine like 'MSA%' Or Machine Like 'FOCUS%' ORDER BY Ship_Date ASC "); 
                        $stmt->execute(); 
                        $results = $stmt->execute();
                }
                else
                {
                        $stmt = $dbh->prepare("select * from $table where PPH <> 'CLO' Machine like '$machine%' or Machine like 'SCH%' OR Machine like 'HARN%' or Machine like 'MSA%' Or Machine Like 'FOCUS%' ORDER BY Ship_Date ASC"); 
                        $stmt->execute(); 
                        $results = $stmt->execute();

                }
        } 
        
        //updates the status of the table using ajax functionality
        function updateStatus($table,$status,$id)
        {
                
                global $dbh;
                if($table == 'cs')
                {
                        $stmt = $dbh->query("UPDATE Schedule set [Status] = '$status'  Where id = '$id'"); 
                        $stmt->execute();
                }
                elseif($table == 'assy' || $table = 'hline')
                {
                        $stmt = $dbh->query("UPDATE Schedule_Assy set [Status] = '$status'  Where id = '$id'"); 
                        $stmt->execute();
                }
        }

        //updates notes of the table using ajax functionality
        function updateNotes($table,$notes,$id)
        {
                global $dbh;
                
                if($table == 'cs')
                {
                        $stmt = $dbh->query("UPDATE Schedule set Notes = '$notes'  Where id = '$id'"); 
                        $stmt->execute();
                }
                elseif($table == 'assy' || $table = 'hline')
                {
                        $stmt = $dbh->query("UPDATE Schedule_Assy set Notes = '$notes'  Where id = '$id'"); 
                        $stmt->execute();
                }
        }

        //assigns the table using ajax functionality
        function updateTable($table,$id,$tableNumber)
        {
                global $dbh;
                
                if($table == 'cs')
                {
                        $stmt = $dbh->query("UPDATE Schedule set [Table#] = '$tableNumber'  Where id = '$id'"); 
                        $stmt->execute();
                }
                elseif($table == 'assy' || $table = 'hline')
                {
                        $stmt = $dbh->query("UPDATE Schedule_Assy set [Table#] = '$tableNumber'  Where id = '$id'"); 
                        $stmt->execute();
                }
        }

        //gets table views 
        function getAssyTableView($table,$tableNumber)
        {
                global $dbh;
                global $stmt;
                
                $stmt = $dbh->query("SELECT * FROM $table WHERE [Table#] = '$tableNumber' AND PPH <> 'CLO'"); 
                $stmt->execute();
        }

        function updateWorkOrder($employee,$workorder,$timelap,$partnumber,$count)
        {
                global $dbh;
                global $stmt;

                echo $count;

                $stmt = $dbh->query("INSERT INTO Schedule_part (Workorder,PartNumber,Timelap,Employee,[count]) values('$workorder','$partnumber',$timelap,$employee,'$count');"); 
        }

        function updateEmployee($employee,$workorder)
        {
                global $dbh;
                global $stmt;

                $stmt = $dbh->query("UPDATE Schedule_Assy set employee = '$employee' WHERE WorkOrder = '$workorder';"); 
        }

        function getTableData($workorder)
        {
                global $dbh;
                global $stmt;

                $stmt = $dbh->query("SELECT Schedule_part.WorkOrder, CONVERT(DECIMAL(10,2),MIN(Timelap)) as finishedTime,MAX(Qty) as qty, MAX([count]) as partcount,MAX(Quoted_Time) as quotedTime
                                     FROM Schedule_part
                                     INNER JOIN Schedule_Assy ON Schedule_part.Workorder = Schedule_Assy.WorkOrder
                                     WHERE [count] <> 'start' AND [count] <> 'NaN' And Schedule_part.Workorder = '$workorder'
                                     GROUP BY Schedule_part.Workorder");
        }

?>