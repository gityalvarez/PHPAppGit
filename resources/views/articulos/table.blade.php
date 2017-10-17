<table class="table table-responsive" id="articulos-table">
    <thead>
        <tr>
            <th>Precio</th>
        <th>Stock</th>
        <th>Created At</th>
        <th>Updated At</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($articulos as $articulo)
        <tr>
            <td>{!! $articulo->precio !!}</td>
            <td>{!! $articulo->stock !!}</td>
            <td>{!! $articulo->created_at !!}</td>
            <td>{!! $articulo->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['articulos.destroy', $articulo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('articulos.show', [$articulo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('articulos.edit', [$articulo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>