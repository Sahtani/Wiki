<?php
$role = $this->view_data["role"];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    Saira: ["Saira Condensed", "sans-serif"],
                },
                extend: {
                    colors: {
                        text: "#0F0F0F ",
                        maron: "#2d2522",
                        moinmaron: " #5a4d44",
                        moinbeige: "#ac947c",
                        baigebeige: "#e3dbc8",
                        yellow: "#f4ea79",
                        mr: "#583E26",
                        mrbg: "#A78B71",
                        gr: " #9C4A1A",
                        or: "#EC9704",
                        morebeige: "# F2F2EF ",
                        beige: "#DED3A6",
                        verblanc: "#E7EAEF",
                    },
                },
            },
        };
    </script>
    <style>
        @layer components {
            .sidebar {
                transition: all .4s ease-in-out;
            }
        }

        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.363);
        }
    </style>
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

<body class="bg-gray-100">

    <nav class="bg-verblanc border-gray-200 ">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 shadow-b-2xl">
            <a href="<?= BASE_URL ?>/wiki/">
                <h1 class="font-extrabold font-serif text-3xl text-mr text-shadow cursor-pointer">Wiki&trade;</h1>
            </a>
            <!-- search  -->
            <div class="flex md:order-1">
                <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none  rounded-lg text-sm p-2.5 me-1">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
                <div class="relative hidden md:block">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search icon</span>
                    </div>
                    <div class="w-80">
                        <form class="search-form">
                            <input type="text" id="search-field" class="block w-full py-3 px-10 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50  dark:placeholder-gray-400 text-mr focus:!outline-none focus:!border-none focus:!ring-0 focus:!shadow-none " placeholder="Search...">
                        </form>
                    </div>

                </div>


                <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
                <div class="relative mt-3 md:hidden">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="search-navbar" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  " placeholder="Search...">
                </div>
                <?php if ($role === "author") {

                    echo
                    ' <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border   md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
     <li>
                        <a href="' . BASE_URL . '/wiki/" type="button" class="text-mr font-bold  hover:bg-mr hover:text-white font-serif from-moinbeige to-beige focus:outline-none   rounded-lg text-sm px-6 py-2.5 text-center">Home</a>

                    </li>
     <li>
                        <a href="' . BASE_URL . '/wiki/displayLastCategory" type="button" class="text-mr font-bold  hover:bg-mr hover:text-white font-serif from-moinbeige to-beige focus:outline-none   rounded-lg text-sm px-6 py-2.5 text-center">Categories</a>

                    </li>
                    <li>
                        <a href="' . BASE_URL . '/wiki/Mywikis" type="button" class="text-mr font-bold  hover:bg-mr hover:text-white font-serif from-moinbeige to-beige focus:outline-none   rounded-lg text-sm px-6 py-2.5 text-center">My wikis</a>

                    </li>
                    <li>
                       <a href="' . BASE_URL . '/user/logout" type="button" class="text-mr md:bg-moinbeige font-serif hover:text-white hover:bg-mr from-moinbeige to-beige focus:outline-none  font-bold rounded-lg text-sm px-5 py-2.5 text-center">Log Out</a>
                    </li>
                </ul>';
                } else {
                    echo '
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border   md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                      <li>
                        <a href="' . BASE_URL . '/wiki/" type="button" class="text-mr font-bold  hover:bg-mr hover:text-white font-serif from-moinbeige to-beige focus:outline-none   rounded-lg text-sm px-6 py-2.5 text-center">Home</a>

                    </li>
                      <li>
                        <a href="' . BASE_URL . '/wiki/displayLastCategory" type="button" class="text-mr font-bold  hover:bg-mr hover:text-white font-serif from-moinbeige to-beige focus:outline-none   rounded-lg text-sm px-6 py-2.5 text-center">Categories</a>

                    </li>
                        <a href="' . BASE_URL . '/user/log_in" type="button" class="text-mr font-bold  hover:bg-mr hover:text-white font-serif from-moinbeige to-beige focus:outline-none   rounded-lg text-sm px-6 py-2.5 text-center">Log In</a>

                    </li>
                    <li>
                       <a href="' . BASE_URL . '/user/" type="button" class="text-mr md:bg-moinbeige font-serif hover:text-white hover:bg-mr from-moinbeige to-beige focus:outline-none  font-bold rounded-lg text-sm px-5 py-2.5 text-center">Sign Up</a>
                    </li>
                </ul>
                ';
                }

                ?>
            </div>

        </div>

    </nav>