<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Flash;

class EmailController extends Controller
{
    public function mails(){
    		$hostname="{sanclemente.cl:993/imap/ssl/novalidate-cert}INBOX";
	    	$username="mgonzalez";
	    	$password="maydelin16";
			$inbox = imap_open ($hostname,$username,$password) or die("can't connect: " . imap_last_error());
			  	
	    	$checar = imap_check($inbox);
			//$lista = imap_getmailboxes($inbox, "{imap.uci.cu:993/imap/ssl}", "*");

			// Detalles generales de todos los mensajes del usuario.
			$resultados = imap_fetch_overview($inbox,"1:{$checar->Nmsgs}",0);
			// Ordenamos los mensajes arriba los más nuevos y abajo los más antiguos

			//Información del mailbox
			$check = imap_mailboxmsginfo($inbox);

			krsort($resultados);		
			Flash::success('Bien!.');
			return view('emails.mails')
		    		->with('check',$check)
		    		->with('inbox',$inbox)
		    		->with('resultados',$resultados);

	}

    public function index()
    {
    	return view('emails.index');
    }

}
