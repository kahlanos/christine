<?php
function control() {   
    if (isset($_SESSION["user"])) {
        return true;
    } else {
        return false;
    }
}
