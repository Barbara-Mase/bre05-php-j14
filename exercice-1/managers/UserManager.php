<?php

class UserManager extends AbstractManager

{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function create(User $user) : User {
    
    $query = $this->db->prepare("INSERT INTO users (firstname, lastname, email, password, created_at)
    VALUES (:firstname, :lastname, :email, :password, :created_at)");
    
    $parameters = [
        "firstname" => $user->getFirstName(),
        "lastname" => $user->getLastName(),
        "email" => $user->getEmail(),
        "password" => $user->getPassword(),
        //Transformation du format de la date déclaré dans defaultcontroller
        "created_at" => $user->getCreatedAt()->format('Y-m-d H:i:s')
        ];
        
    
    $query->execute($parameters);
    
    
    
    $id = $this->db->lastInsertId();
    $user->setId($id);
    
    
    
    return $user;
    
    }
    
    public function update(User $user) : User {
    
    // $user->setFirstName();
    // $user->setLastName();
    // $user->setEmail();
    // $user->setPassword();
    
    
    $query = $this->db->prepare("UPDATE users 
    SET firstname = :firstname, lastname = :lastname, email = :email, password = :password 
    WHERE id =:id");
    
    
    $parameters = [
        "id" => $user->getId(),
        "firstname" => $user->getFirstName(),
        "lastname" => $user->getLastName(),
        "email" => $user->getEmail(),
        "password" => $user->getPassword()
        ];
        
    $query->execute($parameters);
    
    return $user;
    
    }
        
    
    public function delete(User $user) : void {
         
    $query = $this->db->prepare("DELETE FROM users WHERE id = :id");
    
    $parameters = [
        "id" => $user->getId()
        ];
    
    $query->execute($parameters);
    
    }
    
    public function findOne(int $id) : User {
        
        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        
        $parameters = [
            "id" => $id
        ];
        
        $query->execute($parameters);
        $results = $query->fetch(PDO::FETCH_ASSOC);
        
        $user = new User(
            $results["firstName"], 
            $results["lastName"], 
            $results['email'], 
            $results["password"], 
            $results["created_at"]);
            
        return $user;
        
    }
    
    public function findAll() : array {
        
        
        $query = $this->db->prepare("SELECT * FROM users");
        
        $parameters = [
        
        ];
        
        $query->execute($parameters);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $users = [];
        
        foreach($results as $result) {
            $users[] = new User(
                $result["firstName"], 
                $result["lastName"], 
                $result["email"], 
                $result["password"], 
                $result["created_at"]);
        };
        
        
        return $users;
    }
    
    
}