<?php

class Router {
    
    public function __construct() {
        
    }
    
    public function handleRequest(array $get) : void {
        
        if(isset($_GET["route"])) {
            
            if($_GET["route"] === "show_user") {
                $ctrl = new UserController();
                $ctrl-> show();
            } else if ($_GET["route"] === "create_user") {
                $ctrl = new UserController();
                $ctrl -> create();
                var_dump($ctrl);
            } else if($_GET["route"] === "check_create_user") {
                $ctrl = new UserController();
                $ctrl->checkCreate();
                var_dump("test");
            } else if($_GET["route"] === "update_user") {
                $ctrl = new UserController();
                $ctrl->update();
            } else if($_GET["route"] === "check_update_user") {
                $ctrl = new UserController();
                $ctrl = checkUpdate();
            } else if($_GET["route"] === "delete_user") {
                $ctrl = new UserController();
                $ctrl -> delete();
            } else {
                $ctrl = new UserController();
                $ctrl -> list();
        }
    }
}
}