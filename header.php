<?php

    session_start();

?>

<header class="z-50 text-black bg-slate-100 body-font sticky w-full top-0">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-black mb-4 md:mb-0">
        <img class="drop-shadow-2xl w-11 h-11 rounded-full" id="logo" src="./uploads/logo.png" alt="Logo">
        <span class="ml-3 text-xl">Trupti Mart</span>
        </a>
        <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
        <a class="mr-5 hover:underline uppercase cursor-pointer" href="index.php">Home</a>
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="mr-5 uppercase hover:underline text-black bg-slate-200 hover:bg-slate-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">Products 
            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </button>

        <div id="dropdown" class="hidden relative bg-white divide-y divide-gray-100 shadow w-full dark:bg-gray-700">
            <div class="grid grid-cols-4 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <div class="py-3 pt-5 px-3 border-r-2 border-b-2 border-solid border-gray-500 w-full">
                    <span class="ml-3 text-base uppercase font-bold">Clothing</span>
                    <div class="ml-6 mt-4 items flex flex-col">
                        <a class="dark:hover:text-white my-1" href="fashion.php?cg=M&c=1">Men's Fashion</a>
                        <a class="dark:hover:text-white my-1" href="fashion.php?cg=F&c=1">Women's Fashion</a>
                        <a class="dark:hover:text-white my-1" href="fashion.php?cg=K&c=1">Kid's Fasion</a>
                        <a class="dark:hover:text-white my-1" href="items.php?cg=M&c=">Men's Accessories</a>
                        <a class="dark:hover:text-white my-1" href="witems.php">Women's Accessories</a>
                    </div>
                </div>
                <div class="py-3 pt-5 px-5 border-r-2 border-b-2 border-solid border-gray-500 w-full">
                    <span class="ml-3 text-base uppercase font-bold">Electronics</span>
                    <div class="ml-6 mt-4 items flex flex-col">
                        <a class="dark:hover:text-white my-1" href="devices.php?type=gen">General Appliances</a>
                        <a class="dark:hover:text-white my-1" href="devices.php?type=smartd">Smart Devices</a>
                        <a class="dark:hover:text-white my-1" href="devices.php?type=Laptop">Laptops</a>
                    </div>
                </div>
                <div class="py-3 pt-5 px-5 border-r-2 border-b-2 border-solid border-gray-500 w-full">
                    <span class="ml-3 text-base uppercase font-bold">Grocery</span>
                    <div class="ml-6 mt-4 items flex flex-col">
                        <a class="dark:hover:text-white my-1" href="groceries.php?type=Food">Food Items</a>
                        <a class="dark:hover:text-white my-1" href="groceries.php?type=BG">Beverages</a>
                        <a class="dark:hover:text-white my-1" href="groceries.php?type=Sweets">Chocolates</a>
                    </div>
                </div>
                <div class="py-3 pt-5 px-5 border-r-2 border-b-2 border-solid border-gray-500 w-full">
                    <span class="ml-3 text-base uppercase font-bold">Gifts</span>
                    <div class="ml-6 mt-4 items flex flex-col">
                        <a class="dark:hover:text-white my-1" href="gift.php?c=items">Gift Items & Cards</a>
                        <a class="dark:hover:text-white my-1" href="gift.php?c=books">Books</a>
                    </div>    
                </div>
            </div>
        </div>
        <a class="mr-5 hover:underline uppercase cursor-pointer" href="contact.php">Contact us</a>
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
                                <a href="./cart.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cart</a>
                            </li>
                            <li>
                                <a href="./orders.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Orders</a>
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