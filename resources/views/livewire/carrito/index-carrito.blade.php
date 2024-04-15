<div>
    <div class="flex flex-col md:flex-row max-w-screen-xl mx-auto">

        <div class="p-4">

            @if (count(Cart::Content()))
                <div class="bg-white px-4 py-8 md:p-8">
                    <div class="flex flex-col md:flex-row md:items-end md:justify-between">
                        <div class="flex items-end">
                            <img src="{{ asset('img/car.png') }}" alt="Compras" title="Compras" width="32px">
                            <p class="mt-2 md:mt-0 sm:text-2xl text-xl lg:text-3xl font-medium ml-2">Carrito</p>
                        </div>
                        @if (session('info'))
                            <div class="mensaje text-gray-700 text-xs mt-1 md:mt-0 px-2 md:text-right font-bold">
                                Producto Agregado con éxito!
                            </div>
                        @endif
                        @if (session('eliminado'))
                            <div class="mensaje text-red-700 text-xs mt-1 md:mt-0 px-2 md:text-right font-bold">
                                Producto Eliminado con éxito!
                            </div>
                        @endif
                        @if (session('actualizado'))
                            <div class="mensaje text-green-700 text-xs mt-1 md:mt-0 px-2 md:text-right font-bold">
                                Cantidad actualizada satisfactoriamente!
                            </div>
                        @endif
                    </div>
                    <div class="w-full flex justify-between text-sm border-b px-2 py-1">
                        @if (count(Cart::Content()) == 1)
                            <p class="text-gray-800">{{ count(Cart::Content()) }} Item agregado al
                                carrito</p>
                        @else
                            <p class="text-gray-800">{{ count(Cart::Content()) }} Items agregados al
                                carrito</p>
                        @endif
                        <p class="hidden md:block">Precio</p>
                    </div>

                    <div class="">

                        @foreach (Cart::Content() as $item)
                            <div class="flex items-center mt-4 border-b pb-4 px-2">
                                <div>
                                    <img src="{{ asset('/storage/cursos/' . $item->attributes->imagen) }}"
                                        width="96px" class="rounded mr-4">
                                </div>
                                <div class="w-full flex items-start justify-between">
                                    <div class="ml-4">
                                        <p class="text-lg lg:text-2xl text-left font-normal">{{ $item->name }}</p>

                                        <div class="md:hidden mb-2">
                                            <p class="text-base lg:text-lg font-medium">US$
                                                {{ number_format($item->price, 2) }}
                                            </p>
                                        </div>

                                        <div class="flex text-xs">
                                            <span>Cant.: </span>
                                            <form action="" method="post">
                                                @csrf
                                                <select name="cant" id="cant" onchange="this.form.submit()"
                                                    class="text-xs font-medium border-none focus:ring-0 focus:outline-none hover:cursor-pointer px-2 py-0 ml-1 text-black">
                                                    @if ($item->quantity == 1)
                                                        <option value="{{ $item->quantity }}" class="">
                                                            {{ $item->quantity }} Unidad
                                                        </option>
                                                    @else
                                                        <option value="{{ $item->quantity }}" class="">
                                                            {{ $item->quantity }} Unidades
                                                        </option>
                                                    @endif
                                                    <option value="0" class="">
                                                        0
                                                    </option>
                                                    @for ($i = 1; $i < 1000; $i++)
                                                        <option value="{{ $i }}" class="">
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                                <input type="hidden" name="rowId" value="{{ $item->id }}">
                                            </form>
                                        </div>
                                        <div class="mt-1">
                                            <form action="" method="post">
                                                @csrf
                                                <input type="hidden" name="rowId" value="{{ $item->id }}">
                                                <input type="submit" value="Eliminar"
                                                    class="block text-xs text-left text-orange-600 hover:underline cursor-pointer">
                                            </form>
                                        </div>

                                    </div>
                                    <div class="hidden md:block">
                                        <p class="text-base lg:text-lg text-right font-medium">US$
                                            {{ number_format($item->price, 2) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex items-start justify-between mt-2 px-2">

                        <div class="text-right text-xs text-orange-600 hover:underline">
                            <a href="">Vaciar carrito</a>
                        </div>
                        <div class="text-base lg:text-lg text-right">
                            <span class="font-normal">Subtotal:</span>
                            <span class="font-medium"> US$
                                {{ number_format(\Cart::getSubtotal(), 2, '.', '.') }}</span>
                            <p class="text-sm text-gray-800">( por {{ \Cart::getTotalQuantity() }} unidades)</p>
                        </div>

                    </div>

                    <div class="mt-10 text-center md:text-right px-2">
                        <a href=""
                            class="cursor-pointer text-sm font-medium px-14 py-2 border rounded-md bg-yellow-300 hover:bg-yellow-200">
                            Comprar ahora
                        </a>
                    </div>

                </div>
            @else
                <div class="bg-white md:px-4 py-8 md:p-8">
                    <div class="flex flex-col md:flex-row md:items-end items-center justify-center">
                        <img src="{{ asset('img/carg.png') }}" alt="Compras" title="Compras" width="32px">
                        <p class="mt-2 md:mt-0 sm:text-2xl text-xl lg:text-3xl font-medium md:ml-2">Tu carrito está vacío</p>
                    </div>
                    <div class="mt-2 pb-2 text-center border-b md:text-base lg:text-lg ">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Exercitationem sed voluptatibus natus voluptates minima 
                            qui temporibus perspiciatis iure nostrum at cum, minus, magnam odio aliquid ipsum quod saepe repellat debitis!
                        </p>
                    </div>
                    <div class="mt-8 text-base font-medium text-center ">
                        <a href="#1" class="bg-lime-600 hover:bg-lime-700 text-white rounded-full px-6 py-2">Compra
                            las ofertas del día
                        </a>
                    </div>
                </div>
            @endif
            
            <div class="mt-4 text-xs font-semibold text-gray-700">
                <p>El precio y la disponibilidad de los cursos están sujetos a cambio.
                    En el carrito de compras puedes dejar temporalmente los cursos que quieras.
                    Aparecerá el precio más reciente de cada curso.
                </p>
            </div>
        </div>

        <div class="p-4 text-sm">
            <div class="rounded-lg border border-gray-200 w-72 p-4 bg-white">
                <div class="mb-4">
                    <p class="text-lg font-semibold">Cursos recomendados</p>
                </div>
                @if ($cursos->count())
                    @foreach ($cursos as $curso)
                        <div class="flex items-center mt-6">
                            <a href="">
                                <div class="min-w-[96px] mr-4">
                                    <img src="{{ asset('/storage/cursos/' . $curso->imagen) }}" alt=""
                                        title="" width="96px" class="rounded ">
                                </div>
                            </a>

                            <div class="w-full">
                                <a href="">
                                    <div>
                                        <p class="text text-red-700">{{ $curso->nombre }}</p>
                                        
                                        <span class="text-base font-semibold"> US${{ $curso->costo }}</span>
                                    </div>
                                </a>

                                <div class="my-2">
                                    <a href="" wire:click="add({{ $curso }})"
                                    class="cursor-pointer block text-xs font-medium px-4 py-2 border rounded-full bg-yellow-300 hover:bg-yellow-200">
                                        Agregar al carrito
                                    </a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

    </div>

    <!-- MOSTRAR MENSAJE POR 3 SEGUNDOS -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".mensaje").fadeOut(1500);
            }, 2000);
        });
    </script>

</div>
