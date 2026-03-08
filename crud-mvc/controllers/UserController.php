<?php


class UserController extends AbstractController 

{
    
    public function show() : void{
        $route = "show";
        require "./templates/users/show.phtml";
        //ou layout ? 
    }
    
    public function create() : void {
        $route = "create";
        require "./templates/users/create.phtml";
        //ou layout ? 
    }
    
    public function checkCreate() : void {
        $route = "check_create_user";
        
        $email = $_POST("email");
        $first_name = $_POST("first_name");
        $last_name = $_POST("last_name");
        
        $user = new User();
        
        $user->setEmail($email);
        $user->setFirstName($first_name);
        $user->setLastName($last_name);
        
        $manager = new UserManager();
        $manager->create($user);
        require "./list.phtml";
        
    }
    
    public function update() : void {
        $route = "update";
        require "./templates/users/update.phtml";
        //ou layout ? 
    }
    
    public function checkUpdate() : void {
        
        
        $route = "check_update_user";
        
    }
    
    public function delete() : void {
        $route = "delete";
    }
    
    public function list() : void {
        $route = "list";
        require "./templates/users/list.phtml";
        //ou layout ? 
    }
}