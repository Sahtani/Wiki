<?php require_once 'includes/header.php';
$wiki = $this->view_data['wiki'];

$wikitags = $wiki["wikitags"];

?>
<div class="bg-white mx-auto  sm:py-10 m-auto border-2 border-gray-100 rounded-lg">



    <div class="relative mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-0">
        <p><?= $wiki['lastname'] ?></p>
        <!-- Content area -->
        <div class="pt-12 sm:pt-16 lg:pt-20">
            <div class="flex flex-items-center justify-center gap-4 ">
                <h3 class="undeline">Categorie</h3>
                <h2 class="text-3xl text-gray-900 font-bold font-serif tracking-tight sm:text-4xl"><?= $wiki['name'] ?></h2>
            </div>
            <h2><?= $wiki['title'] ?></h2>
            <div class="mt-6 text-gray-500 space-y-6">
                <p class="text-lg text-wrap"><?= $wiki['content'] ?></p>
            </div>
        </div>

        <!-- Stats section -->
        <div class="mt-10">
            <dl class="grid grid-cols-2 gap-x-4 gap-y-8">
                <?php
                foreach ($wiki['wikitags'] as $tag) :
                ?>
                    <div class="border-t-2 border-gray-100 pt-6">
                        <dt class="text-base font-medium text-gray-500"><?= $tag["name"]; ?></dt>
                        <dd class="text-3xl font-extrabold tracking-tight text-gray-900">2021</dd>
                    </div>
                <?php endforeach; ?>

                <div class="border-t-2 border-gray-100 pt-6">
                    <dt class="text-base font-medium text-gray-500">Employees</dt>
                    <dd class="text-3xl font-extrabold tracking-tight text-gray-900">5</dd>
                </div>

                <div class="border-t-2 border-gray-100 pt-6">
                    <dt class="text-base font-medium text-gray-500">Beta Users</dt>
                    <dd class="text-3xl font-extrabold tracking-tight text-gray-900">521</dd>
                </div>

                <div class="border-t-2 border-gray-100 pt-6">
                    <dt class="text-base font-medium text-gray-500">Raised</dt>
                    <dd class="text-3xl font-extrabold tracking-tight text-gray-900">$25M</dd>
                </div>
            </dl>
            <div class="mt-10">
                <a href="#" class="text-base font-medium text-indigo-600"> Learn more about how we're changing the world <span aria-hidden="true">&rarr;</span> </a>
            </div>
        </div>
    </div>
</div>
</div>