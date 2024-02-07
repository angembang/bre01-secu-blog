<?php
/**
 * @author : angembang
 * @link : https://github.com/angembang
 */


class PostManager extends AbstractManager
{
    // Fonction pour retourner les 4 derniers post
    public function findLatest()
    {
        // Préparation de la requête SQL
        $query = $this->db->prepare("SELECT * FROM posts ORDER BY created_at DESC LIMIT 4");
        
        // Exécuter la requête préparée
        $query->execute();
        
        // Initialisation d'un tableau vide pour stocker les objets posts par la suite
        $posts = [];
        
        // Récupération des données
        // Parcourir chaque ligne de résultats retournés par la requête
        while($postData = $query->fetch(PDO::FETCH_ASSOC))
        {
            // Création des objets posts + hydratation
            $post = new Post(
                $postData["id"],
                $postData["title"],
                $postData["excerpt"],
                $postData["content"],
                $postData["author"],
                $postData["created_at"]
                );
            // Ajout des objets post au tableau
            $posts[] = $post;
            
        }
        // Retour du tableau de 4 derniers posts
        return $posts;
    }
    
    // Fonction qui retourne le post qui a l'id passé en paramètre, null si il n'existe pas 
    public function findOne(int $id)
    {
        // Préparation de la requête SQL
        $query = $this->db->prepare("SELECT * FROM posts WHERE id = :id");
        
        // Définition des paramètres
        $parameters = [
            "id"=>$id
            ];
        
        // Exécuter la requête préparée
        $query->execute($parameters);
        
        // Récupérer les données et les stocker dans la variable $postData
        $postData = $query->fetch(PDO::FETCH_ASSOC);
        
        // Vérifier s'il y a des données récupérées
        if($postData)
        {
            // Création de l'objet post
            $post = new Post(
                $postData["id"],
                $postData["title"],
                $postData["excerpt"],
                $postData["content"],
                $postData["author"],
                $postData["created_at"]
                );
                
            // Retour du post
            return $post;
        } else
        {
            // Retourner null (aucune post trouvée)
            return null;
        }
        
    }
    
    // Fonction qui retourne les posts ayant la catégorie dont l'id est passé en paramètre
    public function findByCategory(int $categoryId): array
    {
        // Préparation de la requête SQL 
        $query = $this->db->prepare("SELECT * FROM posts 
        JOIN posts_categories ON posts.id = posts_categories.post_id 
        WHERE posts_categories.category_id = :category_id");
        
         // Définition des paramètres
        $parameters = [
            "category_id" => $categoryId
            ];
            
        // Exécuter la requête préparée
        $query->execute($parameters);
        
        // Initialisation d'un tableau vide pour stocker les objets posts récupérés à partir de l'id de la catégorie par la suite
        $posts = [];
        
        // Récupération des données
        // Parcourir chaque ligne de résultats retournés par la requête
        while($postData = $query->fetch(PDO::FETCH_ASSOC))
        {
            // Création des objets posts + hydratation
            $post = new Post(
                $postData["id"],
                $postData["title"],
                $postData["excerpt"],
                $postData["content"],
                $postData["author"],
                $postData["created_at"]
                );
            // Ajout des objets post au tableau
            $posts[] = $post;
                
            
        }
        // Retour du post
        return $posts;
    }
}