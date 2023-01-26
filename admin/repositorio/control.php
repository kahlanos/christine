<?php
function control() {
    session_start();
    if (isset($_SESSION["user"])) {
        return true;
    } else {
        return false;
    }
}
