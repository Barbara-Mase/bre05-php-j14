<?php

class User {
    
    private DateTime $created_at;
    private ? int $id = null;
    
    
    
    public function __construct(
        private string $firstName, 
        private string $lastName, 
        private string $email, 
        private string $password) {
        
    }
    
    public function getId() : ?int {
        return $this->id;
    }
    
    public function setId(?int $id) : void {
        $this->id = $id;
    }
    
    public function getFirstName() : string {
        return $this->firstName;
    }
    
    public function setFirstName(string $firstName) : void {
        $this->firstName = $firstName;
    }
    
    public function getLastName() : string {
        return $this->lastName;
    }
    
    public function setLastName(string $lastName) : void {
        $this->lastName = $lastName;
    }
    
    public function getEmail() : string {
        return $this->email;
    }
    
    public function setEmail(string $email) : void {
        $this->email = $email;
    }
    
    public function getPassword() : string {
        return $this->password;
    }
    
    public function setPassword(string $password) : void {
        $this->password = $password;
    }
    
    public function getCreatedAt() : DateTime {
        return $this->created_at;
    }
    
    public function setCreatedAt(DateTime $created_at) : void {
        $this->created_at = $created_at;
    }
}