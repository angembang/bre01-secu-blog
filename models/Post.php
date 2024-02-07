<?php
class Post
 {
     private ?int $id;
     private string $title;
     private string $excerpt;
     private string $content;
     private int $author;
     private string $created_at;
     
     public function __construct(?int $id, string $title, string $excerpt, string $content, int $author, string $created_at)
     {
         // initialisation de données (attributs)
         $this->id = $id;
         $this->title = $title;
         $this->excerpt = $excerpt;
         $this->content = $content;
         $this->author = $author;
         $this->created_at = $created_at;
     }
     
     // Méthodes getters pour obtenir les données (attributs)
     public function getId(): int
     {
         return $this->id;
     }
     public function getTitle(): string
     {
         return $this->title;
     }
     public function getExcerpt(): string
     {
         return $this->excerpt;
     }
     public function getContent(): string
     {
         return $this->content;
     }
     public function getAuthor(): string
     {
         return $this->author;
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
     public function setTitle(string $title): void
     {
         $this->title = $title;
     }
     public function setExcerpt(string $excerpt): void
     {
         $this->excerpt = $excerpt;
     }
     public function setContent(string $content): void
     {
         $this->content = $content;
     }
     public function setAuthor(string $author): void
     {
         $this->author = $author;
     }
     public function setCreated_at(string $created_at): void
     {
         $this->created_at = $created_at;
     }
 }