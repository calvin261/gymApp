<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1" />
    <meta name="theme-color"
        content="#000000" />
    <link rel="shortcut icon"
        href="./assets/img/favicon.png" />

    <link rel="stylesheet"
        href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.css') }}" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
        integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w=="
        crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
    <title>GymSite | Tailwind </title>

</head>

<body class="text-gray-800 antialiased">

    <!-- Nav bar -->
    <nav class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg">
        <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">

            <div class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start">
                <a class="text-lg font-bold leading-relaxed inline-block mr-4 py-2 whitespace-no-wrap uppercase text-white"
                    href="https://www.imridul.com">GymSite
                </a>
                <button
                    class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                    type="button"
                    onclick="toggleNavbar('example-collapse-navbar')">
                    <i class="text-white fas fa-bars"></i>
                </button>
            </div>
            <div class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
                id="example-collapse-navbar">

                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                    <!-- Facebook Icon -->
                    <li class="flex items-center">
                        <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="#pablo">
                            <i class="text-blue-700 fab fa-facebook text-lg leading-lg "></i>
                            <span class="lg:hidden inline-block ml-2">Share</span>
                        </a>
                    </li>
                    <!-- Insta Icon -->
                    <li class="flex items-center">
                        <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="#pablo">
                            <i class="text-red-500 fab fa-instagram text-lg leading-lg "></i>
                            <span class="lg:hidden inline-block ml-2">Follow</span>
                        </a>
                    </li>

                    <!-- Twitter Icon -->
                    <li class="flex items-center">
                        <a class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            href="#pablo">
                            <i class="text-blue-400 fab fa-twitter text-lg leading-lg "></i>
                            <span class="lg:hidden inline-block ml-2">Tweet</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <main>
        <!-- Hero -->
        <div class="relative pt-16 pb-32 flex content-center items-center justify-center"
            style="min-height: 95vh;">
            <div class="absolute top-0 w-full h-full bg-top bg-cover"
                style="background-image: url('{{ asset('assets/img/landing.webp') }}');">
                <span id="blackOverlay"
                    class="w-full h-full absolute opacity-75 bg-black"></span>
            </div>
            <div class="container relative mx-auto"
                data-aos="fade-in">
                <div class="items-center flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
                        <div>
                            <h1 class="text-white font-semibold text-5xl">
                                Siente El
                                <span class="text-orange-500">
                                    Poder
                                </span>
                            </h1>
                            <p class="mt-4 text-lg text-gray-300">
                                Bienvenidos a GYMSITE. Somos un centro Fitness y de Entrenamiento
                                enfocado en llevarte hasta tu mejor limite.
                                Animate al cambio y empieza desde hoy!
                            </p>
                            <div class="flex space-x-5 justify-center w-60">
                                <a href="{{ route('login') }}"
                                    class="bg-transparent hover:bg-orange-500 text-orange-500
                                     font-semibold hover:text-white p-4 border border-orange-500
                                      hover:border-transparent rounded inline-block mt-5 cursor-pointer">
                                    Ingresar
                                </a>
                                <a href="{{ route('clients.create') }}"
                                    class="bg-transparent hover:bg-orange-500 text-orange-500
                                     font-semibold hover:text-white p-4 border border-orange-500
                                      hover:border-transparent rounded inline-block mt-5 cursor-pointer">
                                    Registrarse
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
                style="height: 70px; transform: translateZ(0px);">
                <svg class="absolute bottom-0 overflow-hidden"
                    xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none"
                    version="1.1"
                    viewBox="0 0 2560 100"
                    x="0"
                    y="0">
                    <polygon class="text-gray-300 fill-current"
                        points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <!-- Features Card-->
        <section class="pb-20 bg-gray-300 pt-12">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap">
                    <!-- Features Card 1-->

                    <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                                    <i class="fas fa-award"></i>
                                </div>
                                <h6 class="text-xl font-semibold">Rutinas Personalizadas</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Encuentra rutinas que se adapten a ti.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Features Card 1-->

                    <div class="w-full md:w-4/12 px-4 text-center">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400">
                                    <i class="fas fa-retweet"></i>
                                </div>
                                <h6 class="text-xl font-semibold">Planes</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Contamos con planes al alcance de tu bolsillo.
                                    Promociones increíbles, no te lo pierdas!!!
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Features Card 1-->

                    <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400">
                                    <i class="fas fa-fingerprint"></i>
                                </div>
                                <h6 class="text-xl font-semibold">Entrenadores</h6>
                                <p class="mt-2 mb-4 text-gray-600">
                                    Contamos con los mejores y mas preparados entrenadores.
                                    Buscando darte la mejor experiencia.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  Customers -->
                <div class="flex flex-wrap items-center mt-24">

                    <!--  Customers FeedBack -->

                    <div class="w-full md:w-5/12 px-4 mr-auto ml-auto"
                        data-aos="zoom-in-right">
                        <div
                            class="text-gray-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-gray-100">
                            <i class="fas fa-user-friends text-xl"></i>
                        </div>
                        <h3 class="text-3xl mb-2 font-semibold leading-normal">
                            Entrenar con nosotros es un placer.
                        </h3>
                        <p class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700">
                        Amamos a los apasionados del deporte, lo que nos hace querer darles el apoyo y la energía 
                        necesaria para que en cada uno de sus entrenamientos potencien su poder al límite.
                        </p>
                        <p class="text-lg font-light leading-relaxed mt-0 mb-4 text-gray-700">
                        Nuestra experiencia con grandes personas y profesionales, 
                        nos ayudan a lograr lo mejor para nuestros clientes.
                        </p>
                        <a href="https://www.imridul.com"
                            class="font-bold text-gray-800 mt-8">Tu decides cuando empezar!!!</a>
                    </div>

                    <!--  Customer image -->

                    <div class="w-full md:w-4/12 px-4 mr-auto ml-auto"
                        data-aos="zoom-in-left">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-orange-500 w-full mb-6 shadow-lg rounded-lg ">
                            <img alt="..."
                                src="{{ asset('assets/img/customers.webp') }}" />
                            <blockquote class="relative p-8 mb-4">
                                <svg preserveAspectRatio="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 583 95"
                                    class="absolute left-0 w-full block"
                                    style="height: 95px; top: -94px;">
                                    <polygon points="-30,95 583,95 583,65"
                                        class="text-orange-500 fill-current"></polygon>
                                </svg>
                                <h4 class="text-xl font-bold text-white">
                                    Mejores equipamentos de Gimnasio.
                                </h4>
                                <p class="text-md font-light mt-2 text-white">
                                    Nuestos equipos de la mejor calidad, te aseguran una experiencia,
                                    genial y satisfactoria.
                                </p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about"
            class="relative py-20 bg-black text-white">
            <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
                style="height: 80px; transform: translateZ(0px);">
                <svg class="absolute bottom-0 overflow-hidden"
                    xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none"
                    version="1.1"
                    viewBox="0 0 2560 100"
                    x="0"
                    y="0">
                    <polygon class="text-white"
                        points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>

            <div class="container mx-auto px-4">
                <div class="items-center flex flex-wrap">
                    <div class="w-full md:w-4/12 ml-auto mr-auto px-4"
                        data-aos="fade-right">
                        <img alt="..."
                            class="max-w-full rounded-lg shadow-lg"
                            src="{{ asset('assets/img/about.webp') }}" />
                    </div>
                    <div class="w-full md:w-5/12 ml-auto mr-auto px-4"
                        data-aos="fade-left">
                        <div class="md:pr-12">

                            <small class="text-orange-500">
                                Acerca de Nosotros
                            </small>
                            <h3 class="text-4xl uppercase font-bold">
                                Cambios Asegurados
                            </h3>
                            <p class="mt-4 text-lg leading-relaxed">
                                Con la ayuda de nuestro equipo y profesionales,
                                te aseguramos no solo cambios físicos sino también
                                en buenas prácticas para cuidar tu salud, !!!Porque nos importas!!!
                            </p>
                            <ul class="list-none mt-6">
                                <li class="py-2">
                                    <div class="flex items-center">
                                        <div>
                                            <span
                                                class="font-semibold text-orange-500 inline-block mr-3 py-3 uppercase "><i
                                                    class="fas fa-dumbbell fa-2x"></i></span>
                                        </div>
                                        <div>
                                            <h4 class="text-xl">
                                                Los últimos y mejores equipos de gimnasio.
                                            </h4>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="flex items-center">
                                        <div>
                                            <span
                                                class="font-semibold text-orange-500 inline-block mr-3 py-3 uppercase "><i
                                                    class="fas fa-hard-hat fa-2x"></i></span>
                                        </div>
                                        <div>
                                            <h4 class="text-xl">
                                                El mejor equipo de trabajo.
                                            </h4>
                                        </div>
                                    </div>
                                </li>
                                <li class="py-2">
                                    <div class="flex items-center">
                                        <div>
                                            <span
                                                class="font-semibold text-orange-500 inline-block mr-3 py-3 uppercase "><i
                                                    class="fas fa-users fa-2x"></i></span>
                                        </div>
                                        <div>
                                            <h4 class="text-xl">
                                                Buen ambiente de entrenamiento.
                                            </h4>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Trainer Section -->
        <section class="py-24 ">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-center text-center mb-24">
                    <div class="w-full lg:w-6/12 px-4">
                        <h2 class="text-4xl font-semibold uppercase">CONOCE A NUESTROS ENTRENADORES</h2>
                        <p class="text-lg leading-relaxed m-4 ">
                            Lo mejor de lo mejor, para nuestros clientes que son lo mejor de lo mejor.
                        </p>
                    </div>
                </div>

                <!-- Trainer Card Wrapper -->
                <div class="flex flex-wrap">
                    <!-- Card 1 -->
                    <div class="w-full md:w-4/12 lg:mb-0 mb-12 px-4"
                        data-aos="flip-right">
                        <div class="px-6">
                            <img alt="..."
                                src="{{ asset('assets/img/trainer-1.webp') }}"
                                class="shadow-lg rounded max-w-full mx-auto"
                                style="max-width: 200px;" />
                            <div class="pt-6 text-center">
                                <h5 class="text-xl font-bold">Ronald McDonald</h5>
                                <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
                                    Trabajando para un mejor tú
                                </p>
                                <div class="mt-6">

                                    <button
                                        class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>
                                    <button
                                        class="bg-red-500 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button">
                                        <i class="fab fa-instagram"></i>
                                    </button>

                                    <button
                                        class="bg-blue-400 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button">
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="w-full md:w-4/12 lg:mb-0 mb-12 px-4"
                        data-aos="flip-up">
                        <div class="px-6">
                            <img alt="..."
                                src="assets/img/trainer-2.webp"
                                class="shadow-lg rounded max-w-full mx-auto"
                                style="max-width: 200px;" />
                            <div class="pt-6 text-center">
                                <h5 class="text-xl font-bold">Strawberry Shortcake</h5>
                                <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
                                    Fuerte en cuerpo y alma
                                </p>
                                <div class="mt-6">

                                    <button
                                        class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>
                                    <button
                                        class="bg-red-500 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button">
                                        <i class="fab fa-instagram"></i>
                                    </button>

                                    <button
                                        class="bg-blue-500 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button">
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="w-full md:w-4/12 lg:mb-0 mb-12 px-4"
                        data-aos="flip-left">
                        <div class="px-6">
                            <img alt="..."
                                src="{{ asset('assets/img/trainer-3.webp') }}"
                                class="shadow-lg rounded max-w-full mx-auto"
                                style="max-width: 200px;" />
                            <div class="pt-6 text-center">
                                <h5 class="text-xl font-bold ">Nicholas Rogers</h5>
                                <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
                                    Deja ya tus antiguos hábitos
                                </p>
                                <div class="mt-6">
                                    <button
                                        class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>
                                    <button
                                        class="bg-red-500 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button">
                                        <i class="fab fa-instagram"></i>
                                    </button>
                                    <button
                                        class="bg-blue-500 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button">
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Header -->
        <section class="pb-20 relative block bg-gray-900">
            <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
                style="height: 80px; transform: translateZ(0px);">
                <svg class="absolute bottom-0 overflow-hidden"
                    xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none"
                    version="1.1"
                    viewBox="0 0 2560 100"
                    x="0"
                    y="0">
                    <polygon class="text-gray-900 fill-current"
                        points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
            <div class="container mx-auto px-4 pb-32 lg:pb-64 py-20 ">
                <div class="flex flex-wrap text-center justify-center"
                    data-aos="fade-down">
                    <div class="w-full lg:w-6/12 px-4">
                        <h2 class="text-4xl font-semibold text-white">Contactanos</h2>
                        <p class="text-lg leading-relaxed mt-4 mb-4 text-gray-500">
                        Realiza tus preguntas, que para nosotros es importante saber tus necesidades.
                        </p>
                    </div>
                </div>
                <div class="flex flex-wrap mt-12 justify-center"
                    data-aos="zoom-in-up">
                    <!-- Service 1 -->
                    <div class="w-full lg:w-3/12 px-4 text-center">
                        <div
                            class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                            <i class="fas fa-medal text-xl"></i>
                        </div>
                        <h6 class="text-xl mt-5 font-semibold text-white">
                            Servicios Excelentes
                        </h6>
                        <p class="mt-2 mb-4 text-gray-500">
                            Cualquier duda acerca de nosotros sera una prioridad
                        </p>
                    </div>
                    <!-- Service 2 -->
                    <div class="w-full lg:w-3/12 px-4 text-center">
                        <div
                            class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                            <i class="fas fa-poll text-xl"></i>
                        </div>
                        <h5 class="text-xl mt-5 font-semibold text-white">
                            Mejora tu cuerpo
                        </h5>
                        <p class="mt-2 mb-4 text-gray-500">
                            Como lograr cambios físicos significativos
                        </p>
                    </div>
                    <!-- Service 3 -->
                    <div class="w-full lg:w-3/12 px-4 text-center">
                        <div
                            class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center">
                            <i class="fas fa-lightbulb text-xl"></i>
                        </div>
                        <h5 class="text-xl mt-5 font-semibold text-white">Optimización de Tiempo</h5>
                        <p class="mt-2 mb-4 text-gray-500">
                            Porque para nosotros tu tiempo es importante
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form -->
      
    </main>

    <!-- Footer -->
    <footer class="relative bg-gray-300 pt-8 pb-6">
        <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
            style="height: 80px; transform: translateZ(0px);">
            <svg class="absolute bottom-0 overflow-hidden"
                xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none"
                version="1.1"
                viewBox="0 0 2560 100"
                x="0"
                y="0">
                <polygon class="text-gray-300 fill-current"
                    points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
                <div class="w-full lg:w-6/12 px-4 mb-12">
                    <h4 class="text-3xl font-semibold">Siguenos en Redes Sociales</h4>
                    <h5 class="text-lg mt-0 mb-2 text-gray-700">
                        Encuentranos en todas nuestras plataformas.
                    </h5>
                    <div class="mt-6">

                        <button
                            class="bg-white text-blue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                            type="button">
                            <i class="flex fab fa-facebook-square"></i>
                        </button>
                        <button
                            class="bg-white text-red-500 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                            type="button">
                            <i class="flex fab fa-instagram"></i>
                        </button>
                        <button
                            class="bg-white text-blue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3"
                            type="button">
                            <i class="flex fab fa-twitter"></i>
                        </button>
                    </div>
                </div>
                <div class="w-full lg:w-6/12 px-4">
                    <div class="flex flex-wrap items-top mb-6">
                        <div class="w-full lg:w-4/12 px-4 ml-auto">
                            <span class="block uppercase text-orange-500 text-sm font-semibold mb-2">Links Relacionados
                    
                            </span>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                        href="#">Acerca de Nosotros</a>
                                </li>
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                        href="#">Blog</a>
                                </li>
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                        href="#">Linked In</a>
                                </li>
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                        href="#">Productoss</a>
                                </li>
                            </ul>
                        </div>
                        <div class="w-full lg:w-4/12 px-4">
                            <span class="block uppercase text-orange-500 text-sm font-semibold mb-2">Otros
                                Recursos</span>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                        href="#">Entrenamientos</a>
                                </li>
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                        href="#">Terminos &amp; Condiciones</a>
                                </li>
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                        href="#">Politica de Privacidad</a>
                                </li>
                                <li>
                                    <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm"
                                        href="#">Contactanos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-400" />
            <div class="flex flex-wrap items-center md:justify-between justify-center">
                <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                    <div class="text-sm text-gray-600 font-semibold py-1">
                        Copyright © <span id="year"></span> Gymsite
                        <a href="#"
                            class="text-gray-600 hover:text-gray-900">Fitness</a>.
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
    integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw=="
    crossorigin="anonymous"></script>

<script src="assets/js/script.js"></script>

</html>
