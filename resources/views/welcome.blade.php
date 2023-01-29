<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen text-slate-700 flex flex-col items-center bg-gray-100 px-20 py-10">           
            <header class="max-w-[500px] mb-10">
                <h1 class="font-bold text-center text-2xl text-primary my-3">My TODO List</h1>
                <form action={{route('item.store')}} class="flex gap-4" method="post">
                    @csrf
                    <input class="focus:ring-2 focus:ring-blue-500 focus:outline-none appearance-none w-full text-sm leading-6 text-slate-900 placeholder-slate-400 rounded-md py-2 pl-10 ring-slate-200 shadow-sm" type="text" aria-label="Filter projects" placeholder="Add new list..."
                name="item" value=""> <button type="submit" class="btn btn-primary text-white">Add</button>
                </form>
            </header>
            <!-- Page Content -->
            <main>
               <table class="table-auto">
                <thead>
                    <tr class="flex gap-4">
                        <th>#</th>
                        <th>Todo Item</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="flex gap-4 my-5">
                        <td>1</td>
                        <td><input class='focus:ring-0 rounded-sm mx-2 peer'
                            type="checkbox" name="" id=""/><span class="peer-checked:line-through peer-checked:opacity-80 transition-all">I want to build a laravel app</span></td>
                        <td>2:55pm </td>
                        <td>
                            <a href="" class="bg-primary text-white py-2 px-3 rounded-md ml-3">
                            View</a>
                        </td>
                    </tr>
                  
                </tbody>

               </table>
            </main>
        </div>
    </body>
</html>
