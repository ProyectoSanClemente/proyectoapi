<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;
use Flash;
use HTML;


class EmailController extends Controller
{


    private function conect(){
    	$hostname="{sanclemente.cl:993/imap/ssl/novalidate-cert}INBOX";
	   	$username="prueba";
     	$password="Prueba2015";
    	$mailbox = new ImapMailbox($hostname, $username,$password);			
    	return $mailbox;
    }

	public function index()
    {
		$mailbox = $this->conect();
		$mailboxmsginfo = $mailbox->getMailboxInfo();

		return view('emails.index')
			->with('mailboxmsginfo',$mailboxmsginfo);		
    }

    public function mails(){
		$mailbox = $this->conect();
		$mailboxmsginfo = $mailbox->getMailboxInfo();
		$mailsIds = $mailbox->searchMailbox('ALL');

		if(!$mailsIds) {
		    die('La bandeja de entrada esta vacia');
		}
		else{
			$mailsinfo = $mailbox->getMailsInfo($mailsIds);
			$mailsinfo=array_reverse($mailsinfo);
			return view('emails.mails')
	    			->with('mailboxmsginfo',$mailboxmsginfo)
	    			->with('mailsinfo',$mailsinfo);
		}
	}

	public function unseen()
	{
		$mailbox = $this->conect();

		$mailsIds = $mailbox->searchMailbox('UNSEEN');
		
		if(!$mailsIds) {
			Flash::error('No hay mensajes sin leer!.');
			return redirect()->route('emails.index');
		    //die('No hay mensajes sin ver');
		}
		else{
			$mailsinfo = $mailbox->getMailsInfo($mailsIds);
			$mailsinfo=array_reverse($mailsinfo);
			return view('emails.unseen')
	    			->with('mailsinfo',$mailsinfo);
		}
	}

	public function show($mailId)
	{
		$mailbox = $this->conect();
		$mail = $mailbox->getMail($mailId);

		return view('emails.show')
				->with('mailId',$mailId)
				->with('mail',$mail);
	}

	public function markMailAsUnread($mailId)
	{
		$mailbox = $this->conect();
		$leido=$mailbox->markMailAsUnread($mailId);
		if($leido)
			Flash::success('Correo Marcado como no leido');
		else
			Flash::error('El correo no se pudo marcar como no leido');
		
		return redirect()->back();

	}

}
