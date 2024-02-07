<?php
class User
 {
     private ?int $id;
     private string $username;
     private string $email;
     private string $password;
     private string $role;
     private string $created_at;
     
     public function __construct(?int $id, string $username, string $email, string $password, string $role, string $created_at)
     {
         // initialisation de données (attributs)
         $this->id = $id;
         $this->username = $username;
         $this->email = $email;
         $this->password = $password;
         $this->role = $role;
         $this->created_at = $created_at;
     }
     
     // Méthodes getters pour obtenir les données (attributs)
     public function getId(): int
     {
         return $this->id;
     }
     public function getUsername(): string
     {
         return $this->username;
     }
     public function getEmail(): string
     {
         return $this->email;
     }
     public function getPassword(): string
     {
         return $this->password;
     }
     public function getRole(): string
     {
         return $this->role;
     }
     public function getCreated_at(): string
     {
         return $this->created_at;
     }
     
     //Méthodes setters pour *définir* les données
     public function setId(?int $id): void
     {
         $this->id = $id;
     }
     public function setUsername(string $username): void
     {
         $this->username = $username;
     }
     public function setEmail(string $email): void
     {
         $this->email = $email;
     }
     public function setPassword(string $password): void
     {
         $this->password = $password;
     }
     public function setRole(string $role): void
     {
         $this->role = $role;
     }
     public function setCreated_at(string $created_at): void
     {
         $this->created_at = $created_at;
     }
 }