<?php
    class  Session {

        function init() {
            session_start();
        }

        function setCurrentUser($data) {
            $_SESSION['usuario'] = $data;
        }

        function setCurrentEmail($data) {
            $_SESSION['email'] = $data;
        }

        function setCurrentRol($data) {
            $_SESSION['rol'] = $data;
        }

        function getCurrentUser() {
            return $_SESSION['usuario'];
        }

        function getCurrentEmail() {
            return $_SESSION['email'];
        }

        function getCurrentRol() {
            return $_SESSION['rol'];
        }

        function getAll() {
            return $_SESSION;
        }

        function getStatus() {
            return session_status();
        }

        function closeSession() {
            session_unset();
            session_destroy();
            $url = constant('URL') . 'login';
            header('location: '.$url.'');
        }

    }
