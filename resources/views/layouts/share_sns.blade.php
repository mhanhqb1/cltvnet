<div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 my-4 rounded col-sm-12 no-popunder" style="margin-top: 15px;">
    <p class="font-bold text-lg">🎬 ¿Te gustó esta película?</p>
    <p>¡Compártela con tus amigos en las redes sociales!</p>

    <div class="mt-3 flex gap-3 flex-wrap text-sm">
        <!-- Facebook -->
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
           target="_blank"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            📘 Compartir en Facebook
        </a>

        <!-- Twitter / X -->
        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($movie->title . ' - ¡Mira esta gran película en VPOnline.net!') }}"
           target="_blank"
           class="bg-blue-400 hover:bg-blue-500 text-white px-4 py-2 rounded shadow">
            🐦 Compartir en Twitter
        </a>

        <!-- WhatsApp -->
        <a href="https://api.whatsapp.com/send?text={{ urlencode($movie->title . ' - Mírala ahora: ' . request()->fullUrl()) }}"
           target="_blank"
           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow">
            📱 Compartir por WhatsApp
        </a>
    </div>
</div>
