<style type="text/css">
@media screen and (min-width: 675px) {
         .modal-dialog  {width:673px;}

}
</style>

@foreach($notices as $notice)
        <div class="row">
            <div class="col-md-7">
                <center>{!! HTML::image($notice->imagen,null,array('width' => 250, 'height' => 200,'class' => 'img-responsive', 'data-toggle'=>'modal','data-target'=>'#myModal'))!!}</center>
            </div>
            <div class="col-md-5">
                <h3>{!! $notice->titulo !!}</h3>
                
                <p>
                @if (strlen($notice->contenido) > 140)
                    {!! substr($notice->contenido, 0, 140)."...";!!}
                    @else
                                   {!! $notice->contenido !!}
                    
                @endif
                </p>
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#myModal{{$notice->id}}">Leer más <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
                <a href="{!! route('noticias.edit', [$notice->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('noticias.delete', [$notice->id]) !!}" onclick="return confirm('Are you sure wants to delete this Notice?')"><i class="glyphicon glyphicon-remove"></i></a>
                @include('noticias.show')
            </div>
        </div>
        <hr>
@endforeach