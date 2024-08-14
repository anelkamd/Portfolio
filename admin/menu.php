<?php require_once('./../bd/conbd.php'); ?>
<?php 
ob_start();
session_start();
if(!isset($_SESSION['user'])) {
header('location: ./admn/admin.php'); 
exit; 
}
?>

<!DOCTYPE html>
<html class="light" style="color-scheme: light;"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title>Page Admin</title>
<meta name="next-head-count" content="3">
<link rel="apple-touch-icon" sizes="180x180" href="icon.png">


<link rel="stylesheet" href="./../css/tp1.css" data-n-g="">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>

</head>
<body>
<div id="__next">

<div class="overflow-hidden w-full h-full relative flex">
<div class="dark hidden bg-gray-900 md:flex md:w-[260px] md:flex-col"><div class="flex h-full min-h-0 flex-col ">
<div class="scrollbar-trigger flex h-full w-full flex-1 items-start border-white/20">

<nav class="flex h-full flex-1 flex-col space-y-1 p-2">
<a href="index.php" class="flex py-3 px-3 items-center gap-3 rounded-md hover:bg-gray-500/10 transition-colors duration-200 text-white cursor-pointer text-sm mb-1 flex-shrink-0 border border-white/20"><svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>Welcome</a>

<div>
<a href="adduser.php" class="flex py-3 px-3 items-center gap-3 rounded-md hover:bg-gray-500/10 transition-colors duration-200 text-white cursor-pointer text-sm mb-1 flex-shrink-0 border border-white/20"><svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg><div class="flex-1 text-ellipsis max-h-5 overflow-hidden break-all relative">Ajout Utilisateur</div></a>
</div>

</div>


<a href="logout.php" class="flex py-3 px-3 items-center gap-3 rounded-md hover:bg-gray-500/10 transition-colors duration-200 text-white cursor-pointer text-sm"><svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>Déconnexion</a>

</nav></div></div>
<div class="flex h-full max-w-full flex-1 flex-col">
<main class="relative h-full w-full transition-width flex flex-col overflow-hidden items-stretch flex-1">
