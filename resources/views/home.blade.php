<x-app-layout>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h5>Главная</h5>
                @if (Auth::check())
                <form method="POST" action="{{ route('store') }}">
                    @csrf
                    <div>
                        <label for="favorite_color">
                        <select name="favorite_color" id="favorite_color">
                            <option value="black">Black</option>
                            <option value="red">Red</option>
                            <option value="white">White</option>
                            <option value="green">Green</option>
                        </select>
                    </div>
    
                    <div class="mt-4">
                        <label for="date_birthday"/>
                        <input id="date_birthday" class="block mt-1 w-full" type="date" name="date_birthday" required />
                    </div>
    
                    <div class="mt-4">
                        <button type="submit">
                            Отправить
                        </button>
                    </div>
                   </form>
                @endif
               
            </div>
        </div>
    </div>
</div>
</x-app-layout>