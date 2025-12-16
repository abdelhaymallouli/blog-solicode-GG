## Travail à faire

---

### Labs
- Ajax

---

### Les fonctionnalités
- Articles avec commentaires (Comments)

---

### Maquettes
- Page détail article avec commentaires

---

### Test maquettes
- M. Hamouda (admin)

---

### Réalisation

1. **Créer les fichiers CSV de test** dans `database/seeders/data/` :
   - `users_test.csv`
   - `roles_test.csv`
   - `categories_test.csv`
   - `tags_test.csv`
   - `articles_test.csv`
   - `articles_invalid_test.csv`
   - `comments_test.csv`
   - `comments_invalid_test.csv`
   - `article_tag_test.csv`

2. **Créer les Seeders avec Artisan** :
   ```bash
   php artisan make:seeder RoleSeeder
   php artisan make:seeder CategorySeeder
   php artisan make:seeder TagSeeder
   php artisan make:seeder ArticleSeeder
   php artisan make:seeder CommentSeeder
   php artisan make:seeder PivotSeeder
````
