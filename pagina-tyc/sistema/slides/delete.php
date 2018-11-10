<?php
    if(!empty($_POST)){
        foreach ($_POST as $deler) {
            unlink('../../img/slides/'.$deler);
        }
    }

    header("Location: ../slides",TRUE,303);
?>