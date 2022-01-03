<x-app-layout>
    <x-slot name="header">
        {{ __('TODO List') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        @if (session()->has('message'))
        <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
            <div class="flex justify-center items-center w-12 bg-green-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                </svg>
            </div>

            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-green-500">Todo</span>
                    <p class="text-sm text-gray-600">{{  session('message') }}</p>
                </div>
            </div>
        </div>

        @endif

        <div class="px-4 py-2 mb-4 -mx-3 flex ">
            <x-a href="{{ route('todos.create')}}" >
                <i class="mr-2">
                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        >
                        <path
                            d="M12 6C12.5523 6 13 6.44772 13 7V11H17C17.5523 11 18 11.4477 18 12C18 12.5523 17.5523 13 17 13H13V17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17V13H7C6.44772 13 6 12.5523 6 12C6 11.4477 6.44772 11 7 11H11V7C11 6.44772 11.4477 6 12 6Z"
                            fill="currentColor"
                        />
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M5 22C3.34315 22 2 20.6569 2 19V5C2 3.34315 3.34315 2 5 2H19C20.6569 2 22 3.34315 22 5V19C22 20.6569 20.6569 22 19 22H5ZM4 19C4 19.5523 4.44772 20 5 20H19C19.5523 20 20 19.5523 20 19V5C20 4.44772 19.5523 4 19 4H5C4.44772 4 4 4.44772 4 5V19Z"
                            fill="currentColor"
                        />
                    </svg>
                </i>
                Add TODO
            </x-a>
        </div>

        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                        <th class="px-6 py-3">Name</th>
                        <th class="px-4 py-3">Description</th>
                        <th class="px-4 py-3">Create at</th>
                        <th class="px-4 py-3  text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($todos as $todo)
                        <tr class="text-gray-700">

                            <td class="px-4 py-3 text-sm">
                                {{ $todo->name }}
                            </td>

                            <td class="px-4 py-3 text-sm @if($todo->isDone) line-through @endif">
                                {{ $todo->description }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $todo->created_at->toFormatedDate() }}
                            </td>

                            <td class="px-4 py-3 flex item-center justify-center whitespace-nowrap  text-center text-sm font-medium">

                                @if ($todo->isDone)
                                    <a href="{{ route('todos.done', $todo) }}" class="mr-5 text-green-600 hover:text-green-900">Redo</a>
                                @else
                                    <a href="{{ route('todos.done', $todo) }}" class="mr-5 text-green-600 hover:text-green-900">Done</a>
                                @endif

                                <a href="{{ route('todos.edit', $todo) }}" class="mr-5 text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="mr-5 text-red-600 cursor-pointer hover:text-red-900" type="submit" onclick="return confirm('Are you sure?')">
                                       Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
                {{ $todos->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
