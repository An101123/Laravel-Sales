<!-- Id Customer Field -->
<div class="form-group">
    {!! Form::label('id_customer', 'Id Customer:') !!}
    <p>{{ $order->id_customer }}</p>
</div>

<!-- Dateorder Field -->
<div class="form-group">
    {!! Form::label('dateOrder', 'Dateorder:') !!}
    <p>{{ $order->dateOrder }}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('amount', 'Amount:') !!}
    <p>{{ $order->amount }}</p>
</div>

<!-- Id Promotion Field -->
<div class="form-group">
    {!! Form::label('id_promotion', 'Id Promotion:') !!}
    <p>{{ $order->id_promotion }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $order->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $order->updated_at }}</p>
</div>

