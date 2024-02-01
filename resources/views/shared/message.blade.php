@if (session('success'))
<div id="success-alert" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
    <p class="font-bold">{{ session('success') }}</p>
</div>
@endif

@if (session('error'))
<div id="error-alert" class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4" role="alert">
    <p class="font-bold">{{ session('error') }}</p>
</div>
@endif

<script>
    // Adiciona um atraso de 3 segundos para ocultar o alerta
    setTimeout(function() {
        document.getElementById('success-alert').style.display = 'none';
    }, 2000);

    setTimeout(function() {
        document.getElementById('error-alert').style.display = 'none';
    }, 2000);
</script>
