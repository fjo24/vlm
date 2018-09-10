<ul class="collapsible" style="margin-top: 0!important;padding-bottom: 4%;border-bottom: 1px solid #C9C9C9!important;
">
    <li>
        <div class="collapsible-header" style="text-transform: uppercase;">
            <span class="filtro">
                FILTROS
            </span>
        </div>
    </li>
</ul>
<ul class="collapsible">
    <li>
    @if(isset($todos))
        <div class="activado collapsible-header" style="text-transform: uppercase;">
        @else
        <div class="collapsible-header" style="text-transform: uppercase;">
        @endif
            <a href="{{ route('productos', $categoria->id) }}">
                TODOS LOS PRODUCTOS
            </a>
        </div>
    </li>
</ul>
@foreach($productos as $producto)
<ul class="collapsible">
    <li>
        @if(empty($todos))
            @if($producto->id==$p->id)
                <div class="activado collapsible-header" style="text-transform: uppercase;">
            @else
                <div class="collapsible-header" style="text-transform: uppercase;">
            @endif
                <a href="{{ route('productoinfo', $producto->id)}}">
                    {!! $producto->nombre !!}
                </a>
            </div>
        @else
            <div class="collapsible-header" style="text-transform: uppercase;">
                <a href="{{ route('productoinfo', $producto->id)}}">
                    {!! $producto->nombre !!}
                </a>
            </div>
        @endif
    </li>
</ul>
@endforeach
