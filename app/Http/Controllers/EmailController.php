<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;
use Flash;


class EmailController extends Controller
{

	public function index()
    {

    	$hostname="{sanclemente.cl:993/imap/ssl/novalidate-cert}INBOX";
	   	$username="mgonzalez";
     	$password="maydelin16";
    	$mailbox = new ImapMailbox($hostname, $username,$password);
		
		$mailboxmsginfo = $mailbox->getMailboxInfo();

		return view('emails.index')
			->with('mailboxmsginfo',$mailboxmsginfo);		
    }

    public function mails(){
    	$hostname="{sanclemente.cl:993/imap/ssl/novalidate-cert}INBOX";
	   	$username="mgonzalez";
     	$password="maydelin16";
    	$mailbox = new ImapMailbox($hostname, $username,$password);
		
		$mailboxmsginfo = $mailbox->getMailboxInfo();

		$mailsIds = $mailbox->searchMailbox('ALL');

		if(!$mailsIds) {
		    die('La bandeja de entrada esta vacia');
		}
		else{
			$mailsinfo = $mailbox->getMailsInfo($mailsIds);

			return view('emails.mails')
	    			->with('mailboxmsginfo',$mailboxmsginfo)
	    			->with('mailsinfo',$mailsinfo);
		}
	}

	public function unseen()
	{
    	$hostname="{sanclemente.cl:993/imap/ssl/novalidate-cert}INBOX";
	   	$username="mgonzalez";
     	$password="maydelin16";
    	$mailbox = new ImapMailbox($hostname, $username,$password);
				
		$mailsIds = $mailbox->searchMailbox('UNSEEN');
		
		if(!$mailsIds) {
			Flash::error('No hay mensajes sin leer!.');
			return redirect()->route('emails/index');
		    //die('No hay mensajes sin ver');
		}
		else{
			$mailsinfo = $mailbox->getMailsInfo($mailsIds);

			return view('emails.unseen')
	    			->with('mailsinfo',$mailsinfo);
		}


	}
    

}
