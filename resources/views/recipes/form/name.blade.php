
    <div class="form-group text-center py-4">
        {!! Form::text('recipeName', '', ['class' => 'form-control col-lg-6 mx-auto ', 'placeholder' => 'Nazwa przepisu']) !!}
        {!! Form::select('categories[]', $categories, null, ['multiple', 'class' => 'selectpicker form-control col-lg-6 mx-auto py-4', 'id' => 'select']) !!}
    </div>