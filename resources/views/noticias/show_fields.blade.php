<style type="text/css">
@media screen and (min-width: 675px) {
    #myModal .modal-dialog  {width:670px;}

}
</style>
<!-- Titulo Field -->
<div class="form-group">
    {!! Form::label('titulo', 'Titulo:') !!}
        <p>{!! $notice->titulo !!}</p>
</div>

<!-- Contenido Field -->
<div class="form-group">
    {!! Form::label('contenido', 'Contenido:') !!}
    <p>{!! $notice->contenido !!}</p>
</div>
<!-- Imagen Field -->
<div class="form-group">
  {!! HTML::image($notice->imagen)!!}
</div>


