<?php 
    function messageBox($message, $type="notice") {
        if ($type === "success") {
            $type = "showSuccessToast";
        } elseif ($type === "error") {
            $type = "showErrorToast";
        } else {
            $type = "showNoticeToast";
        }   
        echo "<script>$(document).ready(function () { $().toastmessage('$type', '$message'); });</script>";
    }
?>