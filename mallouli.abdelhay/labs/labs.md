# 🧪 LAB: Branch Roles & Pull Requests in GitHub

## 🎯 Objectif du Lab

Comprendre les **rôles des branches** dans GitHub et apprendre à les utiliser correctement avec les **Pull Requests** afin de travailler en équipe de manière professionnelle.

---

## 🧠 Concepts Clés

* Une **branch** permet de travailler sur une fonctionnalité sans casser le code principal.
* Une **Pull Request (PR)** permet de proposer des changements pour qu'ils soient **revus et validés** avant fusion.
* Les **branch rules** protègent les branches importantes comme `main`.

---

## 🔀 Rôles des Branches

| Branch      | Rôle                                |
| ----------- | ----------------------------------- |
| `main`      | 🔒 Code stable / production         |
| `develop`   | 🧪 Intégration et tests             |
| `feature/*` | 🛠 Développement de fonctionnalités |
| `bugfix/*`  | 🐛 Correction de bugs               |

---

## 🧩 Scénario du Lab

Vous travaillez sur un projet en équipe.

Règles :

* ❌ Interdiction de pousser directement sur `main`
* ✅ Toute modification passe par une **Pull Request**
* 👀 Les PR doivent être **revues et approuvées**

---

## 🧪 Partie 1 : Création d’une Feature Branch

```bash
git checkout -b feature/add-homepage
```

Modifier un fichier (ex: README.md).

```bash
git add .
git commit -m "Add homepage feature"
git push -u origin feature/add-homepage
```

---

## 🧪 Partie 2 : Créer une Pull Request

1. Aller sur GitHub
2. Cliquer sur **Compare & pull request**
3. Sélectionner :

   * Base: `develop`
   * Compare: `feature/add-homepage`
4. Cliquer sur **Create Pull Request**

---

## 🧪 Partie 3 : Rôles dans la Pull Request

| Rôle       | Description          |
| ---------- | -------------------- |
| Auteur     | Crée la Pull Request |
| Reviewer   | Vérifie et approuve  |
| Maintainer | Fusionne la PR       |

Actions :

* Ajouter au moins **1 reviewer**
* Le reviewer clique sur **Approve**

---

## 🧪 Partie 4 : Protection de la Branch `main`

### Étapes :

1. Settings → Branches
2. Add branch protection rule
3. Branch name pattern : `main`

### Options à activer :

* ✔ Require pull request before merging
* ✔ Require approvals (1 ou 2)
* ✔ Restrict who can push

➡ Résultat : personne ne peut pousser directement sur `main`.

---

## 🧪 Partie 5 : Pull Request vers `main`

Créer une PR :

* From: `develop`
* To: `main`

Conditions :

* Review obligatoire
* Approval obligatoire
* Fusion par le maintainer uniquement

---

## 🔁 Workflow Final

```text
feature/* → develop → main
```

---

## ❓ Questions du Lab

1. Pourquoi la branch `main` est-elle protégée ?
2. Quel est le rôle d’un reviewer ?
3. Pourquoi ne pas fusionner directement `feature` dans `main` ?

---

## ✅ Résultat Attendu

À la fin de ce lab, l’étudiant est capable de :

* Créer des branches avec des rôles clairs
* Utiliser les Pull Requests correctement
* Appliquer des règles de protection
* Travailler en équipe sur GitHub

---

📌 **Fichier à rendre :** README.md
📌 **Outil utilisé :** GitHub
📌 **Niveau :** Débutant / Intermédiaire
