<?php

    $dir = 'D:\HRIS';

    $file = $dir . 'filename.pdf'; 
    $filename = $dir . 'filename.pdf'; 
    
    // Header content type 
    header('Content-type: application/pdf'); 
    
    header('Content-Disposition: inline; filename="' . $filename . '"'); 
    
    header('Content-Transfer-Encoding: binary'); 
    
    header('Accept-Ranges: bytes'); 
    
    // Read the file 
    @readfile($file); 

?>