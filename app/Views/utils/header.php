<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php if (!empty($page_title)) echo $page_title;?></title>
    <link   href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap"   rel="stylesheet" /> 
    <link   rel="stylesheet"   href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" /> 
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/assets/js/filter.js"></script>
    <script>   
    tailwind.config = {     
        darkMode: "class",
        theme: {       
        fontFamily: {         
                sans: ["Roboto", "sans-serif"],
                body: ["Roboto", "sans-serif"],
                mono: ["ui-monospace", "monospace"],
                },     
        },     
        corePlugins: {       preflight: false,     },   
    }; 
    </script>
</head>
<body  style="display: flex; flex-direction: column; min-height: 100vh;">

    <nav class="bg-violet-500 border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <div class="justify-between items-center w-full lg:flex lg:w-auto lg:order-1">
                    <?php 
                        if (session()->get('isLoggedIn')) : ?>
                <a href="/" class="flex items-center font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none transition duration-150 ease-in-out hover:bg-violet-700">
                    <svg class="w-[25px] h-[25px] fill-[#ffffff]" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"></path>
                    </svg>
                    <p class="ml-6 text-xl block py-2 pr-4 pl-3 text-white rounded lg:bg-transparent lg:p-0 dark:text-white" aria-current="page">
                                <?php
                                $isdir = session()->get('isDirecteur');
                                if ($isdir == "t") : ?>
                                    Directeur des études
                                <?php else : ?>
                                    Enseignant <?php echo session()->get('nom'); ?>
                                <?php endif; ?>
                        <?php endif; ?>
                    </p>
                </a>
            </div>
            <a href="/" class="lg:order-1">
                <div class="flex items-center justify-center">
                    <span class="self-center text-xl font-semibold whitespace-nowrap text-white dark:text-white">SGRDS</span>
                </div>
                <span class="self-center text-sm font-semibold whitespace-nowrap text-white dark:text-white">Système de Gestion de Rattrapage de Devoir Surveillé</span>
            </a>
            <div class="flex items-center lg:order-2">
                <?php 
                    $isdir = session()->get('isDirecteur');

                    if ($isdir == "t") : ?>
                    <a href="/ajoutEnseignant" class="font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none transition duration-150 ease-in-out hover:bg-violet-700">
                        <svg class="w-[25px] h-[25px] fill-[#ffffff]" viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"></path>
                        </svg>
                    </a>
                <?php endif; ?>
                <?php
                    $isLogin = session()->get('isLoggedIn');
                    if ($isLogin) : ?>
                <a href="/logout" class="font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 focus:outline-none transition duration-150 ease-in-out hover:bg-violet-700">
                    <svg class="w-[25px] h-[25px] fill-[#ffffff]" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                    </svg>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div style="flex:1;">