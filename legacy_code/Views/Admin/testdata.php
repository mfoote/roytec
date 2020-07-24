<?php
            $dbh = new PDO('odbc:Driver={SQL Server};Server=192.168.1.15;Database=CI; Uid=chammack;Pwd=chammack1234');
            $stmt = $dbh->prepare("SELECT MAX(A.Partcount) as Partcount,PartNumber
                                   FROM Schedule_Lap_Times A
                                   INNER JOIN Schedule_Elevated B ON B.WorkOrder   = A.WorkOrder
			                       GROUP BY PartNumber");
            $stmt->execute();
            $results = $stmt->fetchAll(); 
            
            $data = array();
            
            foreach($results as $row)
            {
                $data[] = array('count' => $row['Partcount'], 'PartNumber' => $row['PartNumber']);
            }
            
            $data = array_values(array_unique($data, SORT_REGULAR));
        
            print_r(json_encode($data));

?>