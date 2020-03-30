<?php
if($position>$dernierePosition){
    echo "<h1>Document valider</h1>";
}else{
    $temp=$position-1;
    echo"<h1>Document en cour de validation, étape ".$temp." sur ".$dernierePosition;
}