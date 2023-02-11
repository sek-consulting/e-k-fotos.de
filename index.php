<?php

require_once "env.php";
require_once "php/includes.php";

$base_url = "https://www.e-k-fotos.de/";

if (Env::ENVIRONMENT === "development") {
    $base_url = "http://localhost/fotos2/";

    ini_set("display_errors", 1);
    ini_set("display_startup_errors", 1);
    error_reporting(E_ALL);
}

// ROUTER

$q    = isset($_GET["q"]) ? $_GET["q"]  : "main";
$call = rtrim($q, "/");

$php_file = false;
$js_file  = false;

$router = new Router();
if ($router->parse($call)) {
    $php_file = $router->php_file;
    $js_file  = $router->js_file;
} else {
    $php_file = "pages/404.php";
}

// DATA

$title       = "E-K Fotos";
$description = "Leidenschaftlich, facettenreich, atmosphärisch. Fotografie ist mehr als nur ein einfaches Foto.";

$links = [
    ["text" => "Peoplefotografie", "href" => "people"],
    ["text" => "Werbefotografie",  "href" => "products"]
];

?>

<!DOCTYPE html>
<html lang="de">
<head>

    <title><?= $title ?></title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="title" content="<?= $title ?>">
    <meta name="description" content="<?= $description ?>"> 

    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= $base_url ?>">
    <meta property="og:title" content="<?= $title ?>">
    <meta property="og:description" content="<?= $description ?>">
    <meta property="og:image" content="<?= $base_url ?>screen.webp">
   
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@stefan_e_k">
    <meta name="twitter:title" content="<?= $title ?>">
    <meta name="twitter:description" content="<?= $description ?>">
    <meta name="twitter:image" content="<?= $base_url ?>android-chrome-192x192.png"> 
   
    <base href="<?= $base_url ?>">  
    
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">

    <link rel="stylesheet" href="css/main.css" />

</head>
<body>

    <header class="absolute top-0 w-full bg-zinc-800/70 text-white z-20">

        <nav class="container mx-auto py-4 px-6 md:p-2 md:flex md:items-cemter md:justify-between">
            
            <div class="flex items-center justify-between">
                <a href="" class="hover:text-teal-500">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 752 500" class="w-16 fill-current" >
                        <path d="M.3.3h311.535v108.24H.3V.3Zm0 392.055v107.641h311.535V392.355H.3Zm135.47-87.75V196.381h221.613L553.425.3h150.982L399.431 304.605H135.77Zm328.098 60.976 76.997-75.731 211.132 210.146H598.698l-134.83-134.415Z" />
                    </svg>   
                </a>
                <button class="flex md:hidden" onclick="showMenu()">
                    <svg viewBox="0 0 100 80" class="w-6 h-6 fill-current">
                        <rect y="0" width="100" height="14" rx="7"></rect>
                        <rect y="33" width="100" height="14" rx="7"></rect>
                        <rect y="66" width="100" height="14" rx="7"></rect>
                    </svg>    
                </button>
            </div>

            <ul id="nav-links" class="hidden flex-col items-center mt-8 space-y-4 md:flex md:flex-row md:mt-0 md:space-y-0 md:space-x-10 text-lg">
                <?php foreach ($links as $link) { ?>
                    <li>
                        <a href="<?= $link["href"] ?>" class="hover:text-teal-500"><?= $link["text"] ?></a>
                    </li>
                <?php } ?>

                <li>
                    <a href="https://www.instagram.com/e.k_fotos" target="_blank" class="hover:text-teal-500">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3Z" />
                        </svg>
                    </a>
                </li>

            </ul>

        </nav>

    </header>

    <main>

        <?php include($php_file); ?>

    </main>

    <footer class="bg-teal-700/90 text-white">

        <div class="container mx-auto p-2 flex justify-center">
            COPYRIGHT &copy; <?= date("Y") ?>
            <span class="mx-1">&#149;</span>
            <a href="impressum" class="underline hover:text-teal-900">Impressum / Datenschutz</a>
        </div>
        
    </footer>

    <script src="js/fldGrd-min.js"></script>
    <script src="js/fslightbox.js"></script>
    <script src="js/main.js"></script>
    
    <?php if($js_file) { ?> 
        <script src="<?= $js_file ?>"></script>
    <?php } ?>

</body>
</html>