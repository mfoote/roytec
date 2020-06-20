<?php
        //setting up a connection to use for the database
        date_default_timezone_set('America/New_York'); 
        $dbh = new PDO('odbc:Driver={SQL Server};Server=192.168.1.15;Database=CI; Uid=chammack;Pwd=chammack1234');

        //Gets Work Center data for leads. This is the main View
        function workcenter($table,$machine) 
        {
                global $stmt; 
                global $dbh;
                global $results;

                if(!empty($machine))
                {
                        $stmt = $dbh->prepare("select * from $table where PPH <> 'CLO'"); 
                        $stmt->execute(); 
                        $results = $stmt->fetchAll();
                }
                else
                {
                        $stmt = $dbh->prepare("select * from $table where PPH <> 'CLO' Machine like '$machine%' or Machine like 'SCH%' OR Machine like 'HARN%' or Machine like 'MSA%' Or Machine Like 'FOCUS%' ORDER BY Ship_Date ASC"); 
                        $stmt->execute();
                        $results = $stmt->fetchAll(); 

                }
        }
        
        function Hoistway_Table($table)
        {
                global $stmt; 
                global $dbh;
                global $results;
                

                $stmt = $dbh->prepare("SELECT OHW_Schedule.[CONTRACT#],count(OHW_Schedule.Item) as [Count],[ORDER] FROM OHW_Schedule
                INNER JOIN Hoistway_Item_List
                on OHW_Schedule.Item = Hoistway_Item_List.Item 
                WHERE [Table] = '$table' AND OHW_Schedule.Grabbed IS NULL
                GROUP BY OHW_Schedule.[CONTRACT#],[ORDER]
                ORDER BY [ORDER]
                "); 
                
                $stmt->execute(); 
                $results = $stmt->fetchAll();
        }

        function Hoistway_Select_Parts($area,$contract)
        {
                global $stmt; 
                global $dbh;
                global $results;


                $split = explode('_', $area,2);
                
                if(is_int(substr($split[1],0,2)) == true){
                        $area = substr($split[1],0,2);
                }
                else
                {
                        $area = substr($split[1],0,1);
                }

                $stmt = $dbh->prepare("SELECT [CONTRACT#],OHW_Schedule.[Item],Qty,[RTIME],Grabbed,[ORDER]
                FROM [CI].[dbo].[OHW_Schedule]
                INNER JOIN Hoistway_Item_List on OHW_Schedule.[Item] = Hoistway_Item_List.Item
                WHERE Grabbed IS NULL AND [Table] = '$area'  AND [CONTRACT#] = '$contract'
                ORDER BY [ORDER]
                "); 
                $stmt->execute(); 
                $results = $stmt->fetchAll();
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
                elseif($table == 'assy' || $table == 'Assy' || $table == 'hline' || $table == 'Hline')
                {
                        $stmt = $dbh->query("UPDATE Schedule_Assy set [Status] = '$status'  Where id = '$id'"); 
                        $stmt->execute();
                }
                elseif($table == 'Elevated' || $table == 'elevated')
                {
                        $stmt = $dbh->query("UPDATE Schedule_Elevated set [Status] = '$status'  Where id = '$id'"); 
                        $stmt->execute();
                }
        }

        //updates notes of the table using ajax functionality
        function updateNotes($table,$notes,$id)
        {
                global $dbh;
                global $stmt;
                
                if($table == 'cs')
                {
                        $stmt = $dbh->query("UPDATE Schedule set Notes = '$notes'  Where id = '$id'"); 
                        $stmt->execute();
                }
                elseif($table == 'assy' || $table == 'Assy' || $table == 'hline' || $table == 'Hline')
                {
                        $stmt = $dbh->query("UPDATE Schedule_Assy set Notes = '$notes'  Where id = '$id'"); 
                        $stmt->execute();
                }
                elseif($table == 'Elevated' || $table == 'elevated')
                {
                        $stmt = $dbh->query("UPDATE Schedule_Elevated set Notes = '$notes'  Where id = '$id'"); 
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
                elseif($table == 'assy' || $table == 'Assy' || $table == 'hline' || $table == 'Hline')
                {
                        $stmt = $dbh->query("UPDATE Schedule_Assy set [Table#] = '$tableNumber'  Where id = '$id'"); 
                        $stmt->execute();
                }
                elseif($table == 'Elevated' || $table == 'elevated')
                {
                        $stmt = $dbh->query("UPDATE Schedule_Elevated set [Table#] = '$tableNumber'  Where id = '$id'"); 
                        $stmt->execute();
                }
        }

        //gets table views 
        function getAssyTableView($table,$tableNumber)
        {
                global $dbh;
                global $stmt;
                
                $stmt = $dbh->query("SELECT * FROM $table WHERE [Table#] = '$tableNumber' AND PPH <> 'CLO' AND [Status] <> '1' "); 
                $stmt->execute();
        }
        //records timelaps 
        function updateWorkOrder($employee,$workorder,$timelap,$partnumber,$count,$area)
        {
                global $dbh;
                global $stmt;

                $stmt = $dbh->prepare("INSERT INTO Schedule_Lap_Times(WorkOrder,PartNumber,Timelaps,EmpID,Partcount,Area) values('$workorder','$partnumber',$timelap,$employee,$count,'$area')"); 
                $stmt->execute();

        }
        //sets users to work order 
        function updateEmployee($employee,$workorder,$area)
        {
                global $dbh;
                global $stmt;

                if($area == 'Assy' || $area == 'assy')
                {
                        $stmt = $dbh->prepare("UPDATE Schedule_Assy SET employee = $employee WHERE WorkOrder = '$workorder';"); 
                        $stmt->execute();
                }
                elseif($area == 'Elevated' || $area == 'elevated')
                {
                        $stmt = $dbh->prepare("UPDATE Schedule_Elevated SET employee = $employee WHERE WorkOrder = '$workorder';");
                        $stmt->execute();
                }
        }
        //get the most recent timelap
        function getTableData($workorder,$area)
        {
                global $dbh;
                global $stmt;
                global $results;
                if($area == 'Assy' || $area == 'assy')
                {
                        $stmt = $dbh->prepare("SELECT MAX(A.Partcount) as Partcount,MIN(A.Timelaps) as Timelaps,MAX(B.Quoted_Time) as Quoted_Time,MaterialVerified as verified
                                                FROM Schedule_Lap_Times A
                                                INNER JOIN Schedule_Assy B ON B.WorkOrder   = A.WorkOrder
                                                WHERE A.WorkOrder = '$workorder' AND A.Area = '$area'
						GROUP BY MaterialVerified");
                        $stmt->execute();

                        $results = $stmt->fetchAll();
                }
                elseif($area == 'Elevated' || $area == 'elevated')
                {
                        $stmt = $dbh->prepare("SELECT MAX(A.Partcount) as Partcount,MIN(A.Timelaps) as Timelaps,MAX(B.Quoted_Time) as Quoted_Time
                                                FROM Schedule_Lap_Times A
                                                INNER JOIN Schedule_Elevated B ON B.WorkOrder   = A.WorkOrder
                                                WHERE A.WorkOrder = '$workorder' AND A.Area = '$area'");
                        $stmt->execute();
                        $results = $stmt->fetchAll(); 
                }
        }
        //updates how many users are working on part on main schedule
        function updateTime($workorder,$partnumber,$area,$people,$time, $started,$quantity)
        {
                global $dbh;
                global $stmt;

                $stmt= $dbh->prepare("INSERT INTO Schedule_part VALUES('$workorder','$partnumber','$time','$people','$area',$started,$quantity)");
                $stmt->execute();
        }
        //updates the current part with the most recent timelap
        function updateStopTime($workorder,$time,$partcount,$area)
        {
                global $dbh;
                global $stmt;

                $stmt= $dbh->prepare("UPDATE Schedule_Lap_Times SET Timelaps = '$time' WHERE Partcount = '$partcount' AND WorkOrder = '$workorder' AND Area = '$area'");
                $stmt->execute();
        }
        //updates the status of the work order
        function updateStatusUser($workorder, $status,$area)
        {
                global $dbh;
                global $stmt;

                if($area == 'Assy' || $area == 'assy')
                {
                        $stmt = $dbh->prepare("UPDATE Schedule_Assy SET Status = '$status' WHERE WorkOrder ='$workorder'");
                        $stmt->execute();
                }
                elseif($area == 'Elevated' || $area == 'elevated')
                {
                        $stmt = $dbh->prepare("UPDATE Schedule_Elevated SET Status = '$status' WHERE WorkOrder ='$workorder'");
                        $stmt->execute();
                }

        }

        function insertDowntime($workorder,$partnumber,$downtime,$area,$reason)
        {
            global $dbh;
            global $stmt;
            
            $stmt = $dbh->prepare("INSERT into Assy_downtime VALUES('$workorder','$partnumber','$downtime','$area','$reason')"); 
            $stmt->execute();
        }

        
        function insertDowntimeHoistway($contract,$partnumber,$downtime)
        {
            global $dbh;
            global $stmt;
            
            $stmt = $dbh->prepare("INSERT into Hoistway_downtime VALUES('$contract','$partnumber','$downtime')"); 
            $stmt->execute();
        }

        function updateMaterialVerification($workorder,$partnumber,$verified,$area)
        {
            global $dbh;
            global $stmt;
            if($area == "Assy" || $area == 'assy')
            {
                $stmt = $dbh->prepare("UPDATE Schedule_Assy Set MaterialVerified = $verified WHERE WorkOrder = '$workorder' AND PN = '$partnumber'"); 
                $stmt->execute();
            }
            elseif($area == "Elevated" || $area == 'elevated')
            {
                $stmt = $dbh->prepare("UPDATE Schedule_Elevated Set MaterialVerified = $verified WHERE WorkOrder = '$workorder' AND PN = '$partnumber'"); 
                $stmt->execute();  
            }
        }

        function getQualityView()
        {
                global $dbh;
                global $stmt;
                global $results;

                $dbh = new PDO('odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};DBQ=\\\\RTCFS01\Common\Access Databases\Personal\Chris\Chris.mdb; Uid=; Pwd=;');
                $stmt = $dbh->prepare("SELECT * FROM OPEN_WCs_MOs WHERE Expr1 = 'COME-IN-GO-OUT'");
                $stmt->execute();

        }

        function getAdminView()
        {
                global $dbh;
                global $stmt;
                global $results;
            
                $stmt = $dbh->prepare("SELECT DISTINCT AdminDashboard.PN,MIN(Timelaps) as latestTime,MAX(Partcount) as PartsCompleted,MAX(AdminDashboard.Quoted_Time) as QuotedTime,MAX([Qty]) as Quantity
                FROM [CI].[dbo].[AdminDashboard] 
                inner join Schedule_Lap_Times ON AdminDashboard.WorkOrder = Schedule_Lap_Times.WorkOrder
                WHERE [Status] = 3
                GROUP BY AdminDashboard.PN"); 
                $stmt->execute();
                $results = $stmt->fetchAll(); 
        }

        function updateGrabbed($contract,$partnumber)
        {
                global $dbh;
                global $stmt;

                $stmt= $dbh->prepare("UPDATE OHW_Schedule SET Grabbed = '1' WHERE Item = '$partnumber' AND [CONTRACT#] = '$contract'");
                $stmt->execute();
        }

        function insertFinishedpart($partnumber,$contract,$Run_Start_Time,$quoted_time,$employee,$area)
        {
                global $dbh;
                global $stmt;   
                $currentDate = date('Y/m/d');  
                $currentTime = date('h:i:s', time());                                                                                                                                                                    
                
                $stmt = $dbh->prepare("INSERT INTO Hoistway(PN,WorkOrder,WorkCenter,Machine,Run_Start_Time,Quoted_Time,Finished_Date,Finished_Time,Employee) VALUES('$partnumber','$contract','Hoistway','$area',$Run_Start_Time,$quoted_time,'$currentDate','$currentTime','$employee')"); 
                $stmt->execute();
        }  
        
        function updateFinished($contract,$partnumber)
        {
                global $dbh;
                global $stmt;

                $stmt= $dbh->prepare("UPDATE Hoistway_Part_Status SET [status] = 'finished' WHERE PartNumber = '$partnumber' AND [Contract] = '$contract'");
                $stmt->execute();
        }

        function insertStatus($workorder,$partnumber,$area,$employee)
        {
                global $dbh;
                global $stmt;

                $stmt= $dbh->prepare("INSERT INTO Hoistway_Part_Status VALUES('$workorder','$partnumber','Started','$area','$employee')");
                $stmt->execute();

        }

        function Hoistway_Part_List(){
                global $dbh;
                global $stmt;
                global $results;

                $stmt = $dbh->prepare("SELECT [Item],RIGHT([table],1) as [table], Notes FROM Hoistway_Item_List"); 
                $stmt->execute();
                $results = $stmt->fetchAll(); 
        }

        function changeTable($partnumber,$table) {
                global $dbh;
                global $stmt;
                
                $stmt = $dbh->prepare("UPDATE Hoistway_Item_List set [table] = '$table' WHERE Item = '$partnumber'");
                $stmt->execute();

                echo $partnumber;
                echo $table;
        }

?>