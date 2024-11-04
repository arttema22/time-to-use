<x-guest-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div
                    class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 p-6 lg:p-8">
                    @foreach ( $Articles as $Article )
                    <a href="{{ route('article-show', $Article->slug) }}">
                        <div class="border max-w-sm w-full lg:max-w-full lg:flex">
                            @empty(!$Article->thumbnail)
                            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover text-center overflow-hidden"
                                style="background-image: url('{{ config('app.url') . '/storage/' . $Article->thumbnail }}')"
                                title="{{ $Article->title }}">
                            </div>
                            @endempty
                            <div class=" bg-white p-4 flex flex-col justify-between leading-normal">
                                <div class="mb-8">
                                    <div class="text-gray-900 font-bold text-xl mb-2">
                                        {{ $Article->title }}
                                    </div>
                                    <p class="text-gray-700 text-base">
                                        {{ $Article->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h2 class="mt-8 text-2xl font-medium text-gray-900">
                        {{ __('Offers') }}
                    </h2>
                </div>
                <div
                    class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 p-6 lg:p-8">

                    <div x-data="todos()" x-init="fetchTodos()">
                        <style>
                            .completed {
                                text-decoration: line-through;
                            }

                            li {
                                cursor: pointer;
                            }
                        </style>
                        <h1 class="mb-8 text-2xl font-medium text-gray-900">План работ</h1>
                        <ul>
                            <template x-for="todo in todos" :key="todo.id">
                                <li @click="toggleTodo(todo.id)" :class="{'completed': todo.completed}">
                                    <span x-text="todo.title"></span>
                                    <span @click="deleteTodo(todo.id)">&times;</span>
                                </li>
                            </template>
                        </ul>
                        <div class="flex items-end justify-end mt-4">
                            <div>
                                <label>Добавить новую задачу:</label>
                                <input type="text" x-model="inputValue"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" />
                            </div>
                            <button @click="addTodo()"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150 ms-4">Добавить</button>
                        </div>
                    </div>
                    <script>
                        function todos() {
                            return {
                                todos: [
                                    // {id: 1, title: 'купить хлеб', completed: false},
                                    // {id: 2, title: 'продать телефон', completed: false},
                                ],
                                fetchTodos: function () {
                                    //fetch('https://jsonplaceholder.typicode.com/todos')
                                    fetch('/todos')
                                    .then((response) => response.json())
                                    .then((data) => {
                                        this.todos = data.slice(0, 10);
                                    });
                                },
                                toggleTodo: function (id) {
                                    var todo = this.todos.find((todo) => todo.id === id);
                                    todo.completed = !todo.completed;
                                },
                                inputValue: '',
                                addTodo: function () {
                                    if (!this.inputValue) {
                                        return;
                                    }
                                    this.todos.push({
                                        id: Date.now(),
                                        title: this.inputValue,
                                        completed: false,
                                    });
                                    this.inputValue = '';
                                },
                                deleteTodo: function (id) {
                                    this.todos = this.todos.filter( (todo) => todo.id !== id );
                                },
                            };
                        }
                    </script>
                </div>
            </div>
        </div>
    </div> --}}

</x-guest-layout>
