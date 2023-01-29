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
    <body class="font-sans antialiased flex bg-gray-100 justify-center">
        <div class="min-h-screen w-[500px] text-slate-700 flex flex-col items-center  px-20 py-10">           
            <header class="w-full mb-10">
                <div class="font-bold text-center text-2xl text-primary my-3">
                    <a href="/">My TODO List</a>
                </div>
                <form action={{route('item.store')}} method="post" class="w-full">
                    @csrf
                    <div class="flex gap-4" >
                        <input class="input shadow-lg w-full" type="text" name="item" id="" placeholder="Try adding something" value=""> 
                        <button type="submit" class="btn btn-primary text-white">Add</button>
                    </div>
                </form>
            </header>
            <!-- Page Content -->
            <main>
               <table class="table table-normal table-zebra">
                <thead>
                    <tr >
                        <th>#</th>
                        <th>Todo Item</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($activeLists)===0)
                        <tr>
                            <td colspan="4" class="text-center">No records found</td>
                        </tr>
                        
                    @else
                    @foreach ($activeLists as $key=>$list)
                    <tr>
                        
                        <td>{{++$key}}</td>
                        <td>
                           <div class="flex items-center gap-x-3">
                                <form action={{route('item.toggle', $list->id)}}       method='POST'>
                                    @csrf
                                    <button type="submit" class="checkbox checkbox-xs rounded-sm">
                                        @if ($list->status === 0)
                                        <svg class="h3 w3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                          </svg>
                                        @endif
                                          
                                    </button>
                                </form>
                                <div class="">{{$list->item}}</div>
                            </div>
                        </td>

                        <td class="">{{$list->created_at}}</td>
                        <td class="">
                            <div class="flex gap-3 items-center">
                                <form action={{route('item.edit', $list->id)}} method="POST">
                                    @csrf
                                    <button type="submit">
                                        <svg class="w-5 h-5 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                          </svg>
                                    </button>
                                      
                                  </form>
                                <form action={{route('item.destroy', $list->id)}} method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <svg class="text-primary w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                          </svg>
                                    </button>
                                      
                                  </form>
                            </div>
                                 
                        </td>
                    </tr>
                    @endforeach 
                    @endif
                    
                  
                </tbody>

               </table>
               
               <div tabindex="0" class="group bg-slate-200 rounded-lg mt-10 p-3 cursor-pointer">
                <div class="flex justify-between items-center">
                    <span class="cursor-pointer">Completed Items</span> <span class=''><svg class="w-4 h-4 text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z" clip-rule="evenodd" />
                  </svg>
                  </span>
                </div>
                <div class="hidden group-focus-within:block mt-5">
                    <table class="table table-normal table-zebra">
                        <tbody>
                            @if (count($inactiveLists)===0)
                                <tr>
                                    <td colspan="4" class="text-center bg-slate-200">Nothing completed yet</td>
                                </tr>
                            
                            @else
                                @foreach ($inactiveLists as $key=>$list)
                                    <tr>
                                        
                                        <td>{{++$key}}</td>
                                        <td>
                                        <div class="flex items-center gap-x-3">
                                                <form action={{route('item.toggle', $list->id)}}       method='POST'>
                                                    @csrf
                                                    <button type="submit" class="checkbox checkbox-xs rounded-sm bg-primary">
                                                        <svg class="h3 w3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                                        </svg>
                                                    
                                                    </button>
                                                </form>
                                                <div class="">{{$list->item}}</div>
                                            </div>
                                        </td>
                
                                        <td class="">{{$list->created_at}}</td>
                                        <td class="">
                                            <div class="flex gap-3 items-center">
                                                <a>
                                                    <svg class="w-5 h-5 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                    </svg>
                                                </a>
                                                <form action={{route('item.destroy', $list->id)}} method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">
                                                        <svg class="text-primary w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                    </button>
                                                    
                                                </form>
                                            </div>
                                                
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <p class="mt-5 font-mono font-thin">*Click outside of the box to collapse</p>
                </div>
                
               </div>
            </main>
        </div>
    </body>
</html>
