<?php
class Comment
 {
     private ?int $id;
     private string $content;
     private int $user_id;
     private int $post_id;
     
     public function __construct(?int $id, string $content, int $user_id, int $post_id)
     {
         // initialisation de données (attributs)
         $this->id = $id;
         $this->content = $content;
         $this->user_id = $user_id;
         $this->post_id = $post_id;
     }
     
     // Méthodes getters pour obtenir les données (attributs)
     public function getId(): int
     {
         return $this->id;
     }
     
     public function getContent(): string
     {
         return $this->content;
     }
     public function getUser_id(): string
     {
         return $this->user_id;
     }
     public function getPost_id(): string
     {
         return $this->post_id;
     }
     
     //Méthodes setters pour *définir* les données
     public function setId(?int $id): void
     {
         $this->id = $id;
     }
     public function setContent(string $content): void
     {
         $this->content = $content;
     }
     public function setUser_id(int $user_id): void
     {
         $this->user_id = $user_id;
     }
     public function setPost_id(int $post_id): void
     {
         $this->post_id = $post_id;
     }
 }