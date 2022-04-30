<a href="{{ route('recetas.create') }}" class="d-block d-sm-block d-md-inline mb-2 btn btn-outline-primary mr-2 text-uppercase font-weight-bold">
    <i>
        <svg class="icono" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
    </i>
    Crear Receta</a>
<a href="{{ route('perfiles.edit', auth()->user()->id) }}"
    class="d-block d-sm-block d-md-inline mb-2 btn btn-outline-success mr-2 text-uppercase font-weight-bold">
    <i>
        <svg class="icono" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
        </svg>
    </i>
    Editar Perfil</a>
<a href="{{ route('perfiles.show', auth()->user()->id) }}"
    class="d-block d-sm-block d-md-inline mb-2 btn btn-outline-info mr-2 text-uppercase font-weight-bold">
    <i><svg class="icono" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg></i>
    Ver Perfil</a>
    <div class="d-block d-sm-block d-md-none">Este texto solo visible para smartphone</div>