<?php
session_start();
class Unset_session{

    function unset_session(){

        /*TODO: clear all the session when open this page*/
        session_unset();
    }

    function destroy_session(){

        if(session_destroy())
        {
            header("Location: index.php"); // Redirecting To default (login page)
        }
    }
}
$unset_all_session = new Unset_session(); /*Creating an object*/
$unset_all_session -> unset_session();
$unset_all_session -> destroy_session();
?>