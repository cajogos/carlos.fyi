### Main Routes:
- `GET /`: `MainController::displayIndex` (index)
- `GET /contact`: `MainController::displayContact` (contact)
- `GET /skills`: `MainController::displaySkills` (skills)
- `GET /timeline`: `MainController::displayTimeline` (timeline)

### Other Routes:
- `GET /rubiks-cube`: `MainController::displayRubiksCube` (rubiks-cube)

### Blog Routes:
- `GET /blog`: `BlogController::displayBlogHome` (blog-home)
- `GET /blog/feed`: `BlogController::displayBlogFeed` (blog-feed)
- `GET /blog/author/[*:author_id]`: `BlogController::displayBlogAuthor` (blog-author)
- `GET /blog/category/[*:category_id]`: `BlogController::displayBlogCategory` (blog-category)
- `GET /blog/[*:post_id]`: `BlogController::displayBlogPost` (blog-post)

```php
<?php

$handler = SiteHandler::get();

// Main Routes
$handler->addRoute('GET', '/', 'MainController::displayIndex', 'index');
$handler->addRoute('GET', '/contact', 'MainController::displayContact', 'contact');
$handler->addRoute('GET', '/skills', 'MainController::displaySkills', 'skills');
$handler->addRoute('GET', '/timeline', 'MainController::displayTimeline', 'timeline');

// Other Routes
$handler->addRoute('GET', '/rubiks-cube', 'MainController::displayRubiksCube', 'rubiks-cube');

// Blog Routes
$handler->addRoute('GET', '/blog', 'BlogController::displayBlogHome', 'blog-home');
$handler->addRoute('GET', '/blog/feed', 'BlogController::displayBlogFeed', 'blog-feed');
$handler->addRoute('GET', '/blog/author/[*:author_id]', 'BlogController::displayBlogAuthor', 'blog-author');
$handler->addRoute('GET', '/blog/category/[*:category_id]', 'BlogController::displayBlogCategory', 'blog-category');
$handler->addRoute('GET', '/blog/[*:post_id]', 'BlogController::displayBlogPost', 'blog-post');

$handler->handleRouting();
```