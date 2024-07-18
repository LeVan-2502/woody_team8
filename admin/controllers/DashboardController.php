<?php
class DashboardController{
    function dashboard() {
        $view = 'dashboard';
        $script = 'dashboard';
        require_once  PATH_VIEW_ADMIN . 'layouts/master.php';
    }
}