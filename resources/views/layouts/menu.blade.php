<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{!! route('categorias.index') !!}"><i class="fa fa-edit"></i><span>Categorias</span></a>
</li>

<li class="{{ Request::is('comercios*') ? 'active' : '' }}">
    <a href="{!! route('comercios.index') !!}"><i class="fa fa-edit"></i><span>Comercios</span></a>
</li>

<li class="{{ Request::is('productos*') ? 'active' : '' }}">
    <a href="{!! route('productos.index') !!}"><i class="fa fa-edit"></i><span>Productos</span></a>
</li>

<li class="{{ Request::is('articulos*') ? 'active' : '' }}">
    <a href="{!! route('articulos.index') !!}"><i class="fa fa-edit"></i><span>Articulos</span></a>
</li>

<li class="{{ Request::is('pedidos*') ? 'active' : '' }}">
    <a href="{!! route('pedidos.index') !!}"><i class="fa fa-edit"></i><span>Pedidos</span></a>
</li>

<li class="{{ Request::is('personas*') ? 'active' : '' }}">
    <a href="{!! route('personas.index') !!}"><i class="fa fa-edit"></i><span>Personas</span></a>
</li>

