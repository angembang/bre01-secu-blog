<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class CategoryManager extends AbstractManager
{
    // Fonction qui retourne toutes les catégories
    public function findAll()
    {
        // Préparation de la requête SQL 
        $query = $this->db->prepare("SELECT * FROM categories");
        // Exécution de la requête préparée
        $query->execute();
        
        // Initialisation d'un tableau vide pour pour stocker les objets category par la suite
        $categories = [];
        
        // Récupération des données
        // Parcourir chaque ligne de résultats retournés par la requête
        while($categoryData = $query->fetch(PDO::FETCH_ASSOC))
        {
           // Création des objets Category (hydratation)
           $category = new Category(
               $categoryData["id"],
               $categoryData["title"],
               $categoryData["description"]
               );
            
            // Ajout des objets Category au tableau
            $categories[] = $category;
            
        }
        // Retour du tableau de catégories
        return $categories;
        
    }
    
    // Fonction qui retourne une catégorie en fonction de l'id passé en paramètre
    public function findOne(?int $id)
    {
        // Préparation de la requête SQL 
        $query=$this->db->prepare("SELECT * FROM categories WHERE id = :id");
        
        // Définir les paramètres
        $parameters = [
            "id"=>$id
            ];
        
        // Exécuter de la requête préparée
        $query->execute($parameters);
        
        //Récupération des données
        $categoryData = $query->fetch(PDO::FETCH_ASSOC);
        
        // Vérifier s'il ya les données récupérées
        if($categoryData)
        {
            // Création de l'objet Category   
            $category = new Category(
            $categoryData["id"],
            $categoryData["title"],
            $categoryData["description"]
            );
                
            // Retour de la catégorie 
            return $category;
        } else
        {
            // Retourner null (aucune catégorie trouvée)
            return null;
        }
        
    }
}