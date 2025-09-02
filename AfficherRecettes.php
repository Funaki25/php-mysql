<?php
// Declaration du tableau des recettes
/*
$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => 'Etape 1 : des flageolets !',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => 'Etape 1 : de la semoule',
        'author' => 'mickael.andrieu@example.com',
        'is_enabled' => false,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => 'Etape 1 : prenez une belle escalope',
        'author' => 'mathieu.nebra@example.com',
        'is_enabled' => true,
    ],
]; */

$users = [
    [
        'full_name' => 'Mickaël Andrieu',
        'email' => 'mickael.andrieu@exemple.com',
        'age' => 34,
    ],
    [
        'full_name' => 'Mathieu Nebra',
        'email' => 'mathieu.nebra@exemple.com',
        'age' => 34,
    ],
    [
        'full_name' => 'Laurène Castor',
        'email' => 'laurene.castor@exemple.com',
        'age' => 28,
    ],
];

$recipes = [
    [
        'title' => 'Cassoulet',
        'recipe' => '',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Couscous',
        'recipe' => '',
        'author' => 'mickael.andrieu@exemple.com',
        'is_enabled' => false,
    ],
    [
        'title' => 'Escalope milanaise',
        'recipe' => '',
        'author' => 'mathieu.nebra@exemple.com',
        'is_enabled' => true,
    ],
    [
        'title' => 'Salade Romaine',
        'recipe' => '',
        'author' => 'laurene.castor@exemple.com',
        'is_enabled' => false,
    ],
];

// Fonction pour vérifier si une recette est valide
function isValidRecipe(array $recipe) : bool {
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } else {
        $isEnabled = false;
    }
    return $isEnabled;
}

// Fonction pour récupérer les recettes valides
function getRecipes(array $recipes) : array {
    $validRecipes = [];
    foreach($recipes as $recipe) {
        if (isValidRecipe($recipe)) {
            $validRecipes[] = $recipe;
        }
    }
    return $validRecipes;
}

// Fonction pour afficher l'auteur d'une recette
function displayAuthor(string $authorEmail, array $users) : string {
    for ($i = 0; $i < count($users); $i++) {
        $author = $users[$i];
        if ($authorEmail === $author['email']) {
            return $author['full_name'] . ' (' . $author['age'] . ' ans)';
        }
    }
    return 'Auteur inconnu';
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Affichage des recettes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            color: #333;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }
        h2 {
            color: #2c3e50;
            margin-bottom: 5px;
        }
        .recipe {
            background-color: white;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .author {
            font-style: italic;
            color: #7f8c8d;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <!-- <h1>Affichage des recettes</h1> -->
    
    <?php foreach($recipes as $recipe): ?>
        <?php //if ($recipe['is_enabled']): ?>
            <!-- <div class="recipe">
                <h2> <?php //echo $recipe['title']; ?></h2>
                <p><?php //echo $recipe['recipe']; ?></p>
                <p class="author"><?php //echo $recipe['author']; ?></p>
            </div> -->
        <?php //endif; ?>
    <?php endforeach; ?>


    <h1>Liste des recettes de cuisine</h1>
    
    <?php foreach(getRecipes($recipes) as $recipe): ?>
        <div class="recipe">
            <div class="recipe-title"><?php echo $recipe['title']; ?></div>
            <div class="author"><?php echo displayAuthor($recipe['author'], $users); ?></div>
        </div>
    <?php endforeach; ?>
</body>
</html>