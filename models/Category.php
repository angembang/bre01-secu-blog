<?php
/**
 * @author : angembang
 * @link : https://github.com/angembang
 */
class Category
 {
     private ?int $id;
     private string $title;
     private string $description;
     
     public function __construct(?int $id, string $title, string $description)
     {
         // initialisation de données (attributs)
         $this->id = $id;
         $this->title = $title;
         $this->description = $description;
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
     public function getDescription(): string
     {
         return $this->description;
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
     public function setDescription(string $description): void
     {
         $this->description = $description;
     }
 }