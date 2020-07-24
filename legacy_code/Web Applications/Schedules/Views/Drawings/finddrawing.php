<?php
        $partnumber=$_GET['partnumber'];
        $file= glob("\\\\RTCFS01\\Common\\output\\*\\*$partnumber*.pdf", GLOB_BRACE);
        header("Content-type: application/pdf");
        if($file == NULL)
        {
            $file = glob("\\\\RTCFS01\\Common\\output\\*$partnumber*.{pdf}", GLOB_BRACE);
            readfile($file[0]);
        }
        else
        {
            readfile($file[0]);
        }
?>
