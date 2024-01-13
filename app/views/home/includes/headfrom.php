<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>



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
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" /> -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" /> -->

<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">