

<div class="form-group">
    {!! form::label('title', 'Callout Box Title') !!}
    {!! Form::input('text', 'title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! form::label('short_description', 'Short Description') !!}
    {!! Form::textarea('short_description', null, ['class' => 'textarea form-control', 'maxlength' => '109']) !!}
    <div class="counting"></div>

</div>

<div class="form-group">
    {!! Form::submit($submit, ['class' => 'btn btn-default']) !!}
</div>