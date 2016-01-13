@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
			<section class="panel panel-default mail-container">
				<div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Vista correo</strong></div>
				<div class="panel-body">
                    <div class="mail-header row">
						<div class="col-md-4 col-md-offset-8">
							<div class="pull-right">
								<a href="#/mail/compose" class="btn btn-sm btn-default">Responder <i class="fa fa-mail-reply"></i></a>
								<a href="javascript:;" class="btn btn-sm btn-default"><i class="fa fa-print"></i></a>
								<a href="javascript:;" class="btn btn-sm btn-default"><i class="fa fa-trash-o"></i></a>
							</div>
						</div>
					</div>
                
					<div class="mail-header row">
						<div class="col-md-12">
							<h3>{{$mail->subject}}</h3>
						</div>
					</div>
                    
					<div class="mail-info">
						<div class="row">
							<div class="col-md-12">
                                <ul class="list-unstyled list-inline">
                                    <li><i class="fa fa-calendar-o"></i>{{$mail->date}}</li>
                                    <li><i class="fa fa-user"></i>{{$mail->fromName}}</li>
                                    @foreach ($mail->to as $element)
                                    	{{$element}}
                                    @endforeach             	
                                    <li><i class="glyphicon glyphicon-bookmark"></i><a href="http://localhost:8080/Utilities/xmlKnowledgeBase23/index.asp?displayCategory=yes&id=Gateway">Gateway</a></li>
                                    <li><i class="fa fa-star"></i>33 views </li>
                                </ul>
							</div>
						</div>
					</div>
                    
					<div class="mail-content">
						<p>{{$mail->textPlain}}</p>
						{{-- <p>{{$mail->textHtml}}</p> --}}
					</div>
					
					{{-- <div class="mail-attachments">

						<p><i class="fa fa-paperclip"></i> 2 attachements | <a href="javascript:;">Download all attachements</a></p>
						<ul class="list-unstyled">
							<li><a>iniformation.pdf</a></li>
							<li>drivername.ini</a></li>

						</ul>
						 
					</div> --}}
					<div class="mail-actions">
                    
						<a href="#/mail/compose" class="btn btn-sm btn-default">Responder <i class="fa fa-mail-reply"></i></a>
					
                    	<ul class="list-unstyled list-inline">
							<li><a href="#"><span class="label label-default">Technology</span></a></li>
							<li><a href="#"><span class="label label-default">Technology</span></a></li>
							<li><a href="#"><span class="label label-default">Technology</span></a></li>
							<li><a href="#"><span class="label label-default">Technology</span></a></li>
						</ul>
                    </div>			
				</div>
			</section>
		</div>
	</div>
</div>
			




@endsection


	
		
	</div>
	</section>
    