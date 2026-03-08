<?php


class UserManager extends AbstractManager 

{
    public function __construct() {
        parent::__construct();
    }
    
    public function create(User $user) : User {
        
        
        $query = $this->db->prepare("INSERT INTO users(email, first_name, last_name) VALUES (:email, :first_name, :last_name)");
    
        
        $parameters = [
            "email" => $user->getEmail(),
            "first_name" => $user->getFirstName(),
            "last_name" => $user->getLastName()
            ];
            
        $query->execute($parameters);
        
        $id = $this->db->lastInserId();
        $user->setId($id);
        
        return $user;
    } 
    
        
      public function update(User $user) : User {
        
        $query = $this->db->prepare("UPDATE users WHERE id = :id");
        
        $parameters = [
            "email" => $user->getEmail(),
            "first_name" => $user->getFirstName(),
            "last_name" => $user->getLastName()
            ];
            
        $query->execute($parameters);
        
        return $user;
    }
       

    
    public function delete(User $user) : void {
        
        $query = $this->db->prepare("DELETE users WHERE id = :id");
        
        $parameters = [
            "id" => $user->getId()
            ];
            
        $query->execute($parameters);
        
    }
    
    
    
    
    
    public function findOne(id $id) : User {
        
        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        
        $parameters = [
            "id" => $id
            ];
            
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        $user = new User(
            $result["email"],
            $result["first_name"],
            $result["last_name"]
            );
            
        return $user;
    
    }
    
    public function findAll(array $users) : array {
       
       
       $query = $this->db->prepare("SELECT * FROM users");
       
       $query->execute();
           
        $results = $query->FetchAll(PDO::FETCH_ASSOC);
        
        $users = [];
        
        foreach($results as $result) {
            $users[] = new User(
                $result["email"],
                $result["first_name"], 
                $result["last_name"]
                );
        }
        
        return $users;
    }
    
}