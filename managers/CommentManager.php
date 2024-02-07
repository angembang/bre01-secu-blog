<?php
/**
 * @author : angembang
 * @link : https://github.com/angembang
 */


class CommentManager extends AbstractManager
{
    // Fonction qui retourne les commentaires ayant le post dont l'id est passé en paramètre
    public function findByPost(int $postId)
    {
        // Préparation de la requête SQL
        $query = $this->db->prepare("SELECT * FROM comments WHERE post_id = :post_id");
        
        // Définir les paramètres
        $parameters = [
            "post_id" => $postId
            ];
            
        // Exécuter la requête préparée
        $query->execute($parameters);
        
        // Initialisation d'un tableau vide pour stocker les commentaires par la suite
        $comments = [];
        
        // Récupération des données
        // Parcourir chaque ligne de résultats retournés par la requête
        while($commentData = $query->fetch(PDO::FETCH_ASSOC))
        {
            $comment = new Comment(
                $commentData["id"],
                $commentData["content"],
                $commentData["user_id"],
                $commentData["post_id"]
                );
                
            // Ajout des objets comment au tableau
            $comments[] = $comment;
        }
        // Retour du tableau des commentaires du post dont l'id est passé en paramètre
        return $comments;
    }
    
    // Fonction qui insère le commentaire passé en paramètres dans la base de données
    public function create(Comment $comment)
    {
        // Préparation de la requête SQL
        $query = $this->db->prepare("INSERT INTO comments(content, user_id, post_id) 
        VALUES(:content, :user_id, :post_id)");
        
        // Définir les paramètres
        $parameters = [
            "content" => $comment->getContent(),
            "user_id" => $comment->getUser_id(),
            "post_id" => $comment->getPost_id()
            ];
            
        // Exécuter la requête préparée
        $query->execute($parameters);
        
        
    }
}