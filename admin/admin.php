<?php require_once('./menu.php'); ?>

<div class="group w-full text-gray-800 dark:text-gray-100 border-b border-black/10 dark:border-gray-900/50 dark:bg-gray-800">
<div class="text-base gap-4 md:gap-6 md:max-w-2xl lg:max-w-xl xl:max-w-3xl p-4 md:py-6 flex lg:px-0 m-auto">
    <div class="w-[30px] flex flex-col relative items-end">
        <div class="relative flex">
        </div>
    </div>
    <div class="relative flex w-[calc(100%-50px)] flex-col gap-1 md:gap-3 lg:w-[calc(100%-115px)]">
        <h3>Bienvenue <u><?php echo $_SESSION['user']['email']; ?></u></h3>
    </div>
</div>

</div>

<?php require_once('./footer.php'); ?>