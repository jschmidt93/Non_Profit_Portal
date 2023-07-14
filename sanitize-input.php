<?php
    function sanitize_input ($data) {
        //if (isset($data) == false) {
        //    Throw new Exception($data . ' Cannot process null data');
        //}
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data; 
    }
?>