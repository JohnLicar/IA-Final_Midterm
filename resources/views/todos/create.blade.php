<x-app-layout>
    <x-slot name="header">
        {{ __('Create TODO') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
               <div class="p-6">
                <form method="POST" action="{{ route('todos.store') }}">
                    @csrf
                        <div class="mt-4">
                            <x-label :value="__('Todo Name')"/>
                            <x-input type="text"
                                     id="name"
                                     name="name"
                                     value="{{ old('name') }}"
                                     class="block w-full"
                                     required
                                     autofocus/>
                        </div>

                        <div class="mt-4">
                            <x-label :value="__('Todo Description')"/>
                            <x-textarea type="text"
                                     id="description"
                                     name="description"
                                     value="{{ old('description') }}"
                                     class="block w-full"
                                     required
                                     autofocus>
                            </x-textarea>
                        </div>

                      <div class="flex items-center justify-end mt-4">

                        <x-back-button href="{{ route('todos.index') }}"  class="mx-3">
                            {{ __('Back') }}
                        </x-back-button>

                        <x-button>
                            {{ __('Create') }}
                        </x-button>

                    </div>

                  </form>
               </div>
            </div>
        </div>

    </div>
</x-app-layout>
