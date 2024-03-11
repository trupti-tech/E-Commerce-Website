<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>Welcome</title>
</head>
<body>
    
    <!-- header -->
    <header class="text-black bg-slate-100 body-font sticky w-full top-0">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-black mb-4 md:mb-0">
        <img class="w-11 h-11 rounded-full" id="logo" src="./uploads/logo.png" alt="Logo">
        <span class="ml-3 text-xl">Tailblocks</span>
        </a>
        <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
        <a class="mr-5 hover:underline uppercase cursor-pointer font-bold" href="#">Home</a>
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="mr-5 uppercase hover:underline text-black bg-slate-200 hover:bg-slate-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">Products 
            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </button>

        <div id="dropdown" class="z-10 hidden relative bg-white divide-y divide-gray-100 shadow w-full dark:bg-gray-700">
            <div class="z-100 grid grid-cols-4 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <div class="py-3 pt-5 px-3 border-r-2 border-b-2 border-solid border-gray-500 w-full">
                    <span class="ml-3 text-base uppercase font-bold">Clothing</span>
                    <div class="ml-6 mt-4 items flex flex-col">
                        <a class="dark:hover:text-white my-1" href="mfashion.php">Men's Fashion</a>
                        <a class="dark:hover:text-white my-1" href="wfashion.php">Women's Fashion</a>
                        <a class="dark:hover:text-white my-1" href="kfasion.php">Kid's Fasion</a>
                        <a class="dark:hover:text-white my-1" href="mitems.php">Men's Accessories</a>
                        <a class="dark:hover:text-white my-1" href="witems.php">Women's Accessories</a>
                        <a class="dark:hover:text-white my-1" href="kitems.php">Kid's Accessories</a>
                    </div>
                </div>
                <div class="py-3 pt-5 px-5 border-r-2 border-b-2 border-solid border-gray-500 w-full">
                    <span class="ml-3 text-base uppercase font-bold">Electronics</span>
                    <div class="ml-6 mt-4 items flex flex-col">
                        <a class="dark:hover:text-white my-1" href="appliances.php">General Appliances</a>
                        <a class="dark:hover:text-white my-1" href="smartdevices.php">Smart Devices</a>
                        <a class="dark:hover:text-white my-1" href="phones.php">Smart Phones</a>
                    </div>
                </div>
                <div class="py-3 pt-5 px-5 border-r-2 border-b-2 border-solid border-gray-500 w-full">
                    <span class="ml-3 text-base uppercase font-bold">Grocery</span>
                    <div class="ml-6 mt-4 items flex flex-col">
                        <a class="dark:hover:text-white my-1" href="food.php">Food Items</a>
                        <a class="dark:hover:text-white my-1" href="ingredients.php">Cooking Ingredients</a>
                        <a class="dark:hover:text-white my-1" href="beverages.php">Beverages</a>
                        <a class="dark:hover:text-white my-1" href="chocolates.php">Chocolates</a>
                    </div>
                </div>
                <div class="py-3 pt-5 px-5 border-r-2 border-b-2 border-solid border-gray-500 w-full">
                    <span class="ml-3 text-base uppercase font-bold">Gifts</span>
                    <div class="ml-6 mt-4 items flex flex-col">
                        <a class="dark:hover:text-white my-1" href="gift.php?c=items">Gift Items & Cards</a>
                        <a class="dark:hover:text-white my-1" href="gift.php?c=books">Books</a>
                        <a class="dark:hover:text-white my-1" href="gift.php?c=toys">Toys</a>
                        <a class="dark:hover:text-white my-1" href="gift.php?c=decoration">Decorations</a>
                    </div>    
                </div>
            </div>
        </div>
        <a class="mr-5 hover:underline uppercase cursor-pointer" href="#">Contact us</a>
        </nav>
        
        <?php
            
            if(isset($_SESSION['login'])){
                $username = $_SESSION['name'];
                $profileLetter = $username[0];
                echo '
                    <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer" src="https://dummyimage.com/40x40&text='.$profileLetter.'" alt="User dropdown">

                    <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-50 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div>'.$_SESSION['name'].'</div>
                            <div class="font-medium truncate">'.$_SESSION['email'].'</div>
                        </div>
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cart</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Orders</a>
                            </li>
                        </ul>
                        <div class="py-1">
                        <a href="signout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                        </div>
                    </div>
                ';
            }
            else{
                echo 
                '<button onclick="window.location.replace(\'./login.php\')" class="inline-flex items-center bg-gray-800 border-0 py-2 px-3 focus:outline-none hover:bg-gray-700 rounded text-white mt-4 md:mt-0">Register / Login
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
                </button>';
            }

        ?>
    </div>
    </header>


    <!-- Hero Section -->
    <section class="bg-center bg-no-repeat bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/conference.jpg')] bg-gray-700 bg-blend-multiply">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-40">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Trupti Mart</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Providing our valuable services to our valuable customers.</p>
            
        </div>
        <div class="categories text-white w-full h-28 flex flex-wrap justify-center content-center gap-20 text-3xl ">
            <div class="rounded-full" title="Men's Fashion">
                <a href="fashion.php?g=male"><i class="fa-solid fa-shirt"></i></a>
            </div>
            <div class="rounded-full" title="Women's Fashion">
                <a href="fashion.php?g=female"><i class="fa-solid fa-person-dress"></i></a>
            </div>
            <div class="rounded-full" title="Kid's Fashion">
                <a href="fashion.php?g=kids"><i class="fas fa-child"></i></a>
            </div>
            <div class="rounded-full" title="Food Items">
                <a href="food.php"><i class="fa-solid fa-utensils"></i></a>
            </div>
            <div class="rounded-full" title="Beverages">
                <a href="beverages.php"><i class="fas fa-coffee"></i></a>
            </div>
            <div class="rounded-full" title="Electronic Appliances">
                <a href="smartdevices.php"><i class="fas fa-laptop"></i></a>
            </div>
            <div class="rounded-full" title="Toys">
                <a href="gift.php?c=toys"><i class="fas fa-gamepad"></i></a>
            </div>
            <div class="rounded-full" title="Gift Items and cards">
                <a href="gift.php?c=items"><i class="fa-solid fa-gifts"></i></a>
            </div>
            <div class="rounded-full" title="Books">
                <a href="gift.php?c=books"><i class="fa-solid fa-book-open"></i></a>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>

