# Services Overview for Article Search Page

## I. Displaying Articles

### Service 1: `getAllArticles()`
- **Description:** Retrieves all available articles from the database.
- **Inputs:** None.
- **Outputs:** A list of [`Article`](blog/app/Models/Article.php) objects, each containing details such as title, content, author, categories, and tags.

## II. Searching Articles

### Service 2: `searchArticles(query: string)`
- **Description:** Filters articles based on a search query. The query can match article titles or content.
- **Inputs:**
    - `query` (string): The search term provided by the user.
- **Outputs:** A list of [`Article`](blog/app/Models/Article.php) objects that match the search query.

## III. Filtering by Categories

### Service 3: `filterArticlesByCategory(categoryId: number)`
- **Description:** Filters articles to display only those belonging to a specific category.
- **Inputs:**
    - `categoryId` (number): The unique identifier of the category to filter by.
- **Outputs:** A list of [`Article`](blog/app/Models/Article.php) objects associated with the specified category.

### Service 4: `getAllCategories()`
- **Description:** Retrieves all available categories to populate the filter options.
- **Inputs:** None.
- **Outputs:** A list of [`Category`](blog/app/Models/Category.php) objects, each with an ID and name.

## IV. Combined Functionality

The search page will integrate these services to provide a comprehensive user experience:
1. Initially, `getAllArticles()` will be called to display all articles.
2. Users can then use a search bar, which will trigger `searchArticles(query)` to refine the displayed list.
3. Users can also select one or more categories from a dropdown (populated by `getAllCategories()`) to further filter the results using `filterArticlesByCategory(categoryId)`.