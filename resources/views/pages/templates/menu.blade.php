<div class="menu-titulo">
    PRODUCTOS
</div>
<div class="activado menu-todos">
    <a href="">
        TODOS LOS PRODUCTOS
    </a>
</div>
@foreach($productos as $producto)
<ul class="collapsible">
    <li>
        <div class="collapsible-header" style="text-transform: uppercase;">
            <a href="">
                {!! $producto->nombre !!}
            </a>
        </div>
    </li>
</ul>
@endforeach
