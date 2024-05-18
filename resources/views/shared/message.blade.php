@if (session('success'))
   <div id="success-alert" class="fixed inset-0 flex items-center justify-center z-50">
       <div class="p-2 bg-green-100 text-green-800 p-4 text-sm rounded border border-green-300 my-3">
           <h4 class="text-lg font-semibold mb-2">Feito!</h4>
           <p>{{ session('success') }}</p>
       </div>
   </div>
   @endif

   @if (session('error'))
   <div id="error-alert" class="fixed inset-0 flex items-center justify-center z-50">
       <div class="p-2 bg-red-100 text-red-800 p-4 text-sm rounded border border-red-300 my-3">
           <h4 class="text-lg font-semibold mb-2">Ocorreu um erro!</h4>
           <p>{{ session('error') }}</p>
       </div>
   </div>
   @endif

@if (session('errorLogin'))
 <div id="error-alert" class="fixed inset-0 flex items-center justify-center z-50">
    <div class="p-2 bg-red-100 text-red-800 p-4 text-sm rounded border border-red-300 my-3">
        <h4 class="text-lg font-semibold mb-2">Ocorreu um erro!</h4>
        <p>{{ session('errorLogin') }}</p>
    </div>
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
