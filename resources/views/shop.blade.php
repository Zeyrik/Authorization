<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h5>Магазин</h5>
                    <div class="grid grid-cols-4 gap-5">
                        @foreach ($products as $product)
                        <div class="border-2 border-black mb-3">
                            <p>Категория: {{ $product->name}}</p>
                            @foreach ($product->items as $item)
                            <div class="border-2 border-black">
                                <p class="text-xl">Товар: {{ $item->name }}</p>
                                <div>
                                    @foreach ($item->itemstats as $stats)
                                    <div class="mb-3">
                                        <p>Свойство: {{ $stats->name }}</p>
                                        <p>Значение: {{ $stats->value }}</p>
                                    </div>
                                @endforeach
                                </div>
                            </div>
     
           
                            @endforeach
                        </div>
     
                        @endforeach
                    </div>

                   
                </div>
            </div>
        </div>
    </div>


</x-app-layout>