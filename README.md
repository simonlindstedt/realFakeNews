<img src="https://media.giphy.com/media/RgplmMbj7q4Vy/giphy.gif" width=100%/>

# Hello you!

To install and try it out, you need to do the following:

-   First of all, clone this repo from

```sh
git clone https://github.com/simonlindstedt/realFakeNews.git
```

-   Have PHP installed (https://www.php.net/)

-   Also SQLite for the version of the site with a database

-   Navigate to the root of this directory in your terminal of choice

-   Launch a php server from either /dataBaseVersion or /dataBaseFreeVersion with the following command

```sh
php -S localhost:8000
```

-   (I would recommend the /dataBaseVersion, the /dataBaseFreeVersion is more of a backup in case of trouble with the sqlite-drivers)

-   Then open up your web browser och choice and enter localhost:8000 as the URL

-   Approach the rest just like a normal website!

## About this project

This is the result of our first assignment at YRGO. This list might be changed later if i decide to keep adding to this project.

## Current feature list

-   Dynamic routing for viewing content based on author name or full article

-   Articles and authors fetched from a sqlite database

-   A humble responsive layout

## Would like to add list

-   A working like button

-   Some categories for a more fleshed out nav-bar

## Tested by

-   Rickard Segerkvist

-   Agnes Binett

## Code Review

by Lucas Jirkhem Nordeborg

1. Perhaps move the first php code-block from index.php to another location, eg database.php?
2. Maybe increase the grid gap to make the box-shadow more highlighted
3. Hovered elements (articles) can sometimes be framed over the fixed banner, adress z-index for the banner in css could do it!
4. Add type declaration in article.php, author.php and index.php
5. In functions.php the sortByDate-function is returning void , but should it not be an int?

Overall a great project written in clear and easy-to-read code. Impressive design, great use of grid and mediaqueries. Everything works flawlessly with and
without the database activated. Great job!
