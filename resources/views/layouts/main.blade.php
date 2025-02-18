<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Document</title>


</head>

<body class="h-screen bg-gray-100">
    <div class="grid grid-cols-12 grid-rows-[auto_1fr] h-full">

        <!--header-->
        <header class="bg-[#394053] col-span-12 flex relative p-4 justify-between shadow-md ">
            <a href="/">
                <img src="{{ asset('img/logoti3.png') }}" class="w-[50px] h-[50px]" alt="logo">
            </a>



            <div>
                <button id="profileButton" class="flex items-center text-white   ">
                    <!-- Foto Profil -->
                    <img src="" alt="Profile Picture" class="w-10 h-10 rounded-full mr-2 text-white">
                    <div>
                        <h2 class="text-sm   font-semibold">John Doe</h2>
                        <p class="text-xs ">Software Engineer</p>
                    </div>
                    <span id="arrow" class="transform rotate-180 ">&#9662;</span> <!-- Panah dropdown -->


                </button>

                <div id="dropdownMenu"
                    class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden  opacity-0 invisible transition-opacity duration-200">
                    <a href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Profile</a>
                    <a href="/logout" class="block px-4 py-2 text-red-600 hover:bg-red-100">Logout</a>
                </div>
            </div>


        </header>

        <!--Sidebar-->

        <aside class="  bg-[#394053] text-white p-4 shadow-xl flex flex-col justify-between h-full col-span-2 ">


            <nav class="text-white font-inter flex flex-col sidebar-nav ">

                <a href="/"
                    class="flex items-center active-nav-link text-white py-4 pl-6 nav-item hover:scale-90 sidebar-link">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    <span class=" w-full">Dashboard</span>
                </a>


                <button class="dropdown-toggle flex items-center text-white py-4 pl-6 hover:scale-90 sidebar-link">
                    <i class="fas fa-user mr-3"></i>
                    <span>User</span>
                    <span id="arrowSelect" class="ml-2 transform rotate-270">&#9662;</span>
                </button>

                <div  class="  mt-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden  hidden transition-opacity duration-200 text-black">
                    <a href="/user" class="block px-4 py-2  hover:bg-gray-200"> <i class="fas fa-user mr-3"></i> User</a>
                    <a href="/profile" class="block px-4 py-2  hover:bg-red-100">  <i class="fas fa-user-cog mr-3"></i>Profile</a>
                    <a href="/role" class="block px-4 py-2  hover:bg-red-100">  <i class="fas fa-users mr-3"></i>Role</a>
                </div>




                <a href="tables.html"
                    class="flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item hover:scale-90">
                    <i class="fas fa-table mr-3"></i>
                    Tables
                </a>
                <a href="forms.html"
                    class="flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item hover:scale-90">
                    <i class="fas fa-align-left mr-3"></i>
                    Forms
                </a>
                <a href="tabs.html"
                    class="flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item hover:scale-90">
                    <i class="fas fa-tablet-alt mr-3"></i>
                    Tabbed Content
                </a>
                <a href="calendar.html"
                    class="flex items-center text-white hover:opacity-100 py-4 pl-6 nav-item hover:scale-90">
                    <i class="fas fa-calendar mr-3"></i>
                    Calendar
                </a>

            </nav>

            <div class="text-center text-sm text-gray-400 ">
                &copy; 2025 MyWebsite. All rights reserved.
            </div>



        </aside>


        <!--Main-->
        <main class="bg-gray-200 col-span-10  ">
            @yield('container')

        </main>





    </div>


    <script>
        // firut pop up akun
        const profileButton = document.getElementById("profileButton");
        const dropdownMenu = document.getElementById("dropdownMenu");
        const arrow= document.getElementById("arrow")


        profileButton.addEventListener("click", () => {
            dropdownMenu.classList.toggle("opacity-0")
            dropdownMenu.classList.toggle("invisible")
            arrow.classList.toggle("rotate-180");
        })


        profileButton.addEventListener('click', (e) => {
            if (!profileButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add("opacity-0", "invisible");
                arrow.classList.remove("rotate-180");;
            }
        })

        //fitur select user

        document.querySelectorAll(".dropdown-toggle").forEach(toggle => {
    toggle.addEventListener("click", function (event) {
        event.preventDefault(); // Mencegah link dari berpindah halaman atau refresh
        let menu = this.nextElementSibling; // Ambil dropdown-menu setelahnya
        let arrow = this.querySelector("#arrowSelect"); // Ambil panah di dalam dropdown-toggle

        menu.classList.toggle("hidden");
        arrow.classList.toggle("rotate-270");
    });
});


console.log(dropdown)


        //fitur active page
        let currentPage = window.location.pathname;

        let links = document.querySelectorAll(".sidebar-link");

        links.forEach(link => {
            if (link.pathname === currentPage) {
                link.classList.add("text-blue-600", "font-bold", "relative", "-top-2", "left-2")
            } else {
                link.classList.remove("text-blue-600", "font-bold", "relative", "-top-1", "bg-blue-500");
            }
        });



      



    </script>


</body>

</html>
