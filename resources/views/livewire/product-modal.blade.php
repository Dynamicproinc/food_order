<div 
    x-data="{ open: @entangle('show') }" 
    x-show="open"
    x-transition.opacity
    x-cloak
    class="fixed inset-0 flex items-center justify-center bg-black/60 z-50"
    @keydown.escape.window="$wire.closeProduct(); history.replaceState({}, '', '/');"
>
    <div class="bg-white p-6 rounded-2xl shadow-xl relative max-w-md w-full">
        <button 
            class="absolute top-2 right-3 text-gray-600 text-xl"
            @click="$wire.closeProduct(); history.replaceState({}, '', '/');"
        >×</button>

        <h2 class="text-xl font-semibold mb-3">Product {{ $productId }}</h2>
        <p>This is a fake product description for Product {{ $productId }}.</p>
    </div>
</div>

