<x-app-layout>
    <x-slot name="header">
        {{ __('Update TODO') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
               <div class="p-6">
                <form method="POST" action="{{ route('todos.update', $todo) }}">
                    @method('PUT')
                    @csrf
                        <div class="mt-4">
                            <x-label :value="__('Todo Name')"/>
                            <x-input type="text"
                                     id="name"
                                     name="name"
                                     value="{{ $todo->name }}"
                                     class="block w-full"
                                     required
                                     autofocus/>
                        </div>

                        <div class="mt-4">
                            <x-label :value="__('Todo Description')"/>
                            <textarea class="mt-1 border-gray-300 rounded-md shadow-sm block w-full focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 focus-within:text-primary-600" rows="3" cols="3" id="description" name="description" required>{{ $todo->description }}</textarea>
                        </div>

                      <div class="flex items-center justify-end mt-4">

                        <x-back-button href="{{ route('todos.index') }}"  class="mx-3">
                            {{ __('Back') }}
                        </x-back-button>

                        <x-button>
                            {{ __('Update') }}
                        </x-button>

                    </div>

                  </form>
               </div>
            </div>
        </div>

    </div>
</x-app-layout>
