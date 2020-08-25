<!-- Id Product Field -->
<div class="form-group">
    {!! Form::label('id_product', 'Id Product:') !!}
    <p>{{ $orderDetail->id_product }}</p>
</div>

<!-- Id Order Field -->
<div class="form-group">
    {!! Form::label('id_order', 'Id Order:') !!}
    <p>{{ $orderDetail->id_order }}</p>
</div>

<!-- Quantity Field -->
<div class="form-group">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{{ $orderDetail->quantity }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $orderDetail->price }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $orderDetail->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $orderDetail->updated_at }}</p>
</div>

