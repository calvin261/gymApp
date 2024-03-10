<!DOCTYPE html>
<html lang="en">

<head>
    <title>Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="px-2 py-8 max-w-xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center">
                <div class="text-gray-700 font-semibold text-3xl">PEPUDOS FIT | GYM</div>
            </div>
            <div class="text-gray-700">
                <div class="font-bold text-xl mb-2 uppercase">Factura</div>
                <div class="text-sm">Date: {{ $client->plan->updated_at }}</div>

            </div>
        </div>
        <div class="border-b-2 border-gray-300 pb-8 mb-8">
            <h2 class="text-2xl font-bold mb-4">Para:</h2>
            <div class="text-gray-700 mb-2"><strong>Nombre:</strong> {{ $client->nombre }}</div>
            <div class="text-gray-700 mb-2"><strong>Dirección:</strong> {{ $client->direccion }}</div>
            <div class="text-gray-700 mb-2">{{ $client->provincia }} {{ $client->ciudad }}</div>
            <div class="text-gray-700">{{ $client->correo }}</div>
        </div>
       <p><strong>Según su Membresía:</strong> {{ $client->plan->nombre }}</p>
        <div class="flex justify-end mb-8">
            <div class="text-gray-700 font-bold mr-2">Subtotal:</div>
            <div class="text-gray-700">{{ $client->plan->precio }}</div>
        </div>

        <div class="flex justify-end mb-8">
            <div class="text-gray-700 font-bold mr-2">Total:</div>
            <div class="text-gray-700 font-bold text-xl">{{ $client->plan->precio }}</div>
        </div>

    </div>

</body>

</html>
