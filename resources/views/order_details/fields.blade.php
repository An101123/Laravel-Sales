<!-- Id Product Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_product', 'Id Product:') !!}
    {!! Form::select('id_product', $productItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Id Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_order', 'Id Order:') !!}
    {!! Form::select('id_order', $orderItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('orderDetails.index') }}" class="btn btn-secondary">Cancel</a>
</div>
