<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;

class MailController extends Controller
{
    public function mails(){
    	
		$imap = imap_open ("{sanclemente.cl:993/imap/ssl/novalidate-cert}INBOX", "mgonzalez", "maydelin16") or die("No Se Pudo Conectar Al Servidor:" . imap_last_error());
		$checar = imap_check($imap);
		//$lista = imap_getmailboxes($imap, "{imap.uci.cu:993/imap/ssl}", "*");

		// Detalles generales de todos los mensajes del usuario.
		$resultados = imap_fetch_overview($imap,"1:{$checar->Nmsgs}",0);
		// Ordenamos los mensajes arriba los más nuevos y abajo los más antiguos

		//Información del mailbox
		$check = imap_mailboxmsginfo($imap);

		krsort($resultados);

		return view('mail')
    		->with('check',$check)
    		->with('imap',$imap)
    		->with('resultados',$resultados);
    }


    public function cerrar()
    {
    	//
    }

}
