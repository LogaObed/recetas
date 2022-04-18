<h1>Recetas</h1>
@foreach ($recetas as $receta)
    <li>{{ $receta }}</li>
@endforeach
<h1>Categoria</h1>
@foreach ($categorias as $categoria)
    <li>{{ $categoria }}</li>
@endforeach
<h1>Postres</h1>
@foreach ($postres as $postre)
    <li>{{ $postre }}</li>
@endforeach