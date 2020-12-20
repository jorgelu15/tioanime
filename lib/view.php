<?php 
    class View {
        function __construct() {
            
        }
        
        function render($nombre) {
            require "view/" . $nombre . ".php";
        }
    }

?>