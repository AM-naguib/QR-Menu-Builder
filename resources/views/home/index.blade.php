<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QR Menu Builder</title>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Include Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;500;600;700&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&display=swap">
    <!-- Your Custom Styles -->
</head>

<body>
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-between ">
                    <div class="flex flex-shrink-0 items-center">
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                            alt="Your Company">
                    </div>

                    <div class="buttons">
                        <button style="background-color: #0000002b;color:white"
                            class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            Sign in</button>
                        <button style="background-color: #0000002b;color:white"
                            class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            Sign up</button>
                    </div>
                </div>

            </div>
        </div>
    </nav>
    <style>h1, h2, h3, h4, h5, h6 { font-family: 'Libre Franklin', sans-serif; --font-sans: 'Libre Franklin'; }
    </style>
    <style>body { font-family: 'Chivo', sans-serif; --font-sans: 'Chivo'; }
    </style>
    <div class="isolate overflow-hidden bg-gray-950" style="height:100vh">
        <section class="w-full py-12 md:py-24 lg:py-32 xl:py-48 mx-auto">
            <div class="container grid items-center gap-6 px-4 md:px-6 lg:grid-cols-2 lg:gap-10">
              <div class="space-y-2">
                <h1 class="text-3xl font-bold tracking-tighter text-gray-50 sm:text-5xl xl:text-6xl/none">
                  The complete platform for building custom menus
                </h1>
                <p class="max-w-[600px] text-gray-400 md:text-xl/relaxed lg:text-base/relaxed xl:text-xl/relaxed">
                    Revolutionize your dining experience with QR Menu Builder. Create custom menus for your restaurant or café effortlessly and share them instantly with our QR code technology.
                </p>
                <div class="flex flex-col gap-2 min-[400px]:flex-row">
                  <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 bg-gray-50 text-gray-950 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-50 dark:hover:bg-gray-700">
                    Get Started
                  </button>
                  <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border bg-background hover:bg-accent h-10 px-4 py-2 border-gray-400 text-gray-400 hover:border-gray-300 hover:text-gray-300 dark:border-gray-600 dark:text-gray-600 dark:hover:border-gray-500 dark:hover:text-gray-500">
                    Contact Sales
                  </button>
                </div>
              </div>
              <div class="imgg" >
                <img style="width: 100%"
                src="{{ asset('assets') }}/img/MENU.jpg"
                alt="Hero"
                {{-- class="mx-auto aspect-video overflow-hidden rounded-xl object-cover sm:w-full lg:order-last lg:aspect-square" --}}
              />
              </div>
            </div>
          </section>
    </div>

</body>

</html>
