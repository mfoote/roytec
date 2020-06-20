<?php

$workorder = $_GET['WorkOrder'];
$area = $_GET['area'];


            global $dbhERP;
            global $stmt;
            if($area == 'Assy' || $area == 'assy')
            {
                $dbhERP = $dbh = new PDO('odbc:Driver={SQL Server};Server=192.168.1.15;Database=FSDB08; Uid=chammack;Pwd=chammack1234');

                $stmt = $dbhERP->prepare("SELECT DISTINCT SEQN, COMP_WC1,COMP_DESC1,RQ_ORD_QTY, ORDER_QTY ISSUED_QTY, UM1 AS UM, MO_NUMBER, ORDER_QTY/RQ_ORD_QTY AS LN_QTY
                                          FROM V_MO_CONFIG
                                          WHERE COM_TYP = 'N' AND MO_NUMBER = '$workorder' AND PT_USE <> 'SCRAP' AND PT_USE <> '1SCP' AND PT_USE Like '%ASSY%'
                                          ORDER BY SEQN ASC
                                          ;");

            }
            elseif($area == 'Elevated' || $area == 'elevated')
            {
                $dbhERP = $dbh = new PDO('odbc:Driver={SQL Server};Server=192.168.1.15;Database=FSDB08; Uid=chammack;Pwd=chammack1234');

                $stmt = $dbhERP->prepare("SELECT DISTINCT SEQN, COMP_WC1,COMP_DESC1,RQ_ORD_QTY, ORDER_QTY ISSUED_QTY, UM1 AS UM, MO_NUMBER, ORDER_QTY/RQ_ORD_QTY AS LN_QTY,left([COMP_WC1],2) as material
                                            FROM V_MO_CONFIG
                                            WHERE COM_TYP = 'N' AND MO_NUMBER = '$workorder' AND PT_USE <> 'SCRAP' AND PT_USE <> '1SCP' AND PT_USE Like '%OTIS%' AND left([COMP_WC1],2) <> '01' AND left([COMP_WC1],2) <> 51 AND left([COMP_WC1],2) <> 21 AND left([COMP_WC1],2) <> 04 AND left([COMP_WC1],2) <> 28 AND left([COMP_WC1],2) <> 80 AND left([COMP_WC1],2) <> 13 AND left([COMP_WC1],2) <> 23 AND left([COMP_WC1],2) <> 52 AND left([COMP_WC1],2) <> 57
                                            ORDER BY SEQN ASC;");

            }
            $stmt->execute();

            $data = array();
            foreach($stmt as $row)
            {
                $data[] = array('Raw_Material' => $row['COMP_WC1'], 'Description' => $row['COMP_DESC1'], 'Amount' => $row['RQ_ORD_QTY']);
            }
            
            $data = array_values(array_unique($data, SORT_REGULAR));
        
            print_r(json_encode($data));

?>