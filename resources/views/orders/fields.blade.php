<!-- Id Customer Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_customer', 'Id Customer:') !!}
    {!! Form::select('id_customer', $customerItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Dateorder Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dateOrder', 'Dateorder:') !!}
    {!! Form::text('dateOrder', null, ['class' => 'form-control','id'=>'dateOrder']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#dateOrder').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::number('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Promotion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_promotion', 'Id Promotion:') !!}
    {!! Form::select('id_promotion', $promotionItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
</div>
