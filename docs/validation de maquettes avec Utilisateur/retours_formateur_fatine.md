## Compte rendu – Améliorations apportées 
## Formateur : Fatine Chehab

## Contexte
Ce document résume les remarques et recommandations formulées par la formateur Fatine lors de la validation des maquettes du blog d’articles Solicode, avant le passage au développement avec Laravel.
## 1. Partie Administration – Gestion des Articles

- Le champ **Statut** dans le formulaire d’ajout d’article doit être remplacé par un **menu déroulant (select)** au lieu d’un  radio bouton.  
- Les **données des articles** doivent être réelles et correctement renseignées.  
- La colonne **content** doit être supprimée de l’affichage du tableau.  
- L’administrateur doit disposer du **même rôle que le modérateur**, c’est-à-dire qu’il peut agir comme modérateur 

---


## 2. Use Case – Administrateur

- Une fonctionnalité **“Voir l’article”** doit être ajoutée pour permettre à l’auteur d’afficher l’article avant modification.  

---

## 3. Use Case – Partie Publique

Suite à la révision du modèle fonctionnel, la partie publique du système ne doit plus reposer sur deux acteurs distincts (Visiteur et Utilisateur connecté).  
Désormais, **un seul acteur principal est retenu : l’Auteur**. 

 ## 4.  Ajustement de la Maquette – Partie Publique

Dans la **page d’accueil de la partie publique**, une modification doit être appliquée :

- **À la place de la zone “Les Articles”, une image doit être ajoutée.** 
