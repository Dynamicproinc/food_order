<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modal + URL Change Demo</title>
    {{-- @vite(['resources/css/app.css','resources/js/app.js']) --}}
    @livewireStyles
</head>
<body class="p-8 bg-gray-100 text-center">

    <h1 class="text-2xl font-bold mb-6">Modal with URL change example</h1>

    <div 
        x-data 
        @open-product.window="openProduct($event.detail.id)"
        class="space-x-4"
    >
        <a href="/product/1" 
           @click.prevent="$dispatch('open-product', {id: 1})"
           class="bg-blue-600 text-white px-4 py-2 rounded">Product 1</a>

        <a href="/product/2" 
           @click.prevent="$dispatch('open-product', {id: 2})"
           class="bg-green-600 text-white px-4 py-2 rounded">Product 2</a>

        <livewire:product-modal />
    </div>

    <script>
    function openProduct(id) {
        Livewire.dispatch('loadProduct', { id });
        history.pushState({ modal: true, id }, '', `/product/${id}`);
    }

    // Handle browser back/forward buttons
    window.addEventListener('popstate', (e) => {
        const state = e.state;
        if (state && state.modal) {
            Livewire.dispatch('loadProduct', { id: state.id });
        } else {
            Livewire.dispatch('closeProduct');
        }
    });

    // Open modal automatically if URL is /product/{id}
    document.addEventListener('DOMContentLoaded', () => {
        const match = location.pathname.match(/^\/product\/(\d+)$/);
        if (match) {
            Livewire.dispatch('loadProduct', { id: match[1] });
            history.replaceState({ modal: true, id: match[1] }, '', location.pathname);
        }
    });
    </script>

    @livewireScripts
</body>
</html>
