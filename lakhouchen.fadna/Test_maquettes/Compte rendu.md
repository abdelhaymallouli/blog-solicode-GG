# Compte rendu – Améliorations apportées 

## 1. Partie Administration – Gestion des Articles

- Le champ **Statut** dans le formulaire d’ajout d’article doit être remplacé par un **menu déroulant (select)** au lieu d’un  radio bouton.  
- Les **données des articles** doivent être réelles et correctement renseignées.  
- La colonne **content** doit être supprimée de l’affichage du tableau.  
- L’administrateur doit disposer du **même rôle que le modérateur**, c’est-à-dire qu’il peut agir comme modérateur ou ajouter d’autres modérateurs selon les besoins.  
- Le terme **Éditeur** doit être remplacé par **Auteur**.  

---

## 2. Tableau de Bord du Modérateur – Articles

- Les boutons **Valider** et **Rejeter** dans la colonne Action doivent être retirés.   

---

## 3. Use Case – Administrateur

- L’administrateur doit pouvoir **ajouter des remarques** à destination de l’auteur.  
- Une fonctionnalité **“Voir l’article”** doit être ajoutée pour permettre à l’auteur d’afficher l’article avant modification.  

---

## 5. Use Case – Partie Publique

Suite à la révision du modèle fonctionnel, la partie publique du système ne doit plus reposer sur deux acteurs distincts (Visiteur et Utilisateur connecté).  
Désormais, **un seul acteur principal est retenu : l’Auteur**. 

 ## 6.  Ajustement de la Maquette – Partie Publique

Dans la **page d’accueil de la partie publique**, une modification doit être appliquée :

- **À la place de la zone “Les Articles”, une image doit être ajoutée.** 