<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;
use App\Libraries\Repositories\NoticeRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class NoticeController extends AppBaseController
{

	/** @var  NoticeRepository */
	private $noticeRepository;

	function __construct(NoticeRepository $noticeRepo)
	{
		$this->noticeRepository = $noticeRepo;
	}

	/**
	 * Display a listing of the Notice.
	 *
	 * @return Response
	 */
	public function index()
	{
		$notices = $this->noticeRepository->paginate(10);

		return view('noticias.index')
			->with('notices', $notices);
	}

	/**
	 * Show the form for creating a new Notice.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('noticias.create');
	}

	/**
	 * Store a newly created Notice in storage.
	 *
	 * @param CreateNoticeRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateNoticeRequest $request)
	{
		$input = $request->all();

		$notice = $this->noticeRepository->create($input);

		Flash::success('Notice saved successfully.');

		return redirect(route('noticias.index'));
	}

	/**
	 * Display the specified Notice.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$notice = $this->noticeRepository->find($id);

		if(empty($notice))
		{
			Flash::error('Notice not found');

			return redirect(route('noticias.index'));
		}

		return view('noticias.show')->with('notice', $notice);
	}

	/**
	 * Show the form for editing the specified Notice.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$notice = $this->noticeRepository->find($id);

		if(empty($notice))
		{
			Flash::error('Notice not found');

			return redirect(route('noticias.index'));
		}

		return view('noticias.edit')->with('notice', $notice);
	}

	/**
	 * Update the specified Notice in storage.
	 *
	 * @param  int              $id
	 * @param UpdateNoticeRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateNoticeRequest $request)
	{
		$notice = $this->noticeRepository->find($id);

		if(empty($notice))
		{
			Flash::error('Notice not found');

			return redirect(route('noticias.index'));
		}

		$this->noticeRepository->updateRich($request->all(), $id);

		Flash::success('Notice updated successfully.');

		return redirect(route('noticias.index'));
	}

	/**
	 * Remove the specified Notice from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$notice = $this->noticeRepository->find($id);

		if(empty($notice))
		{
			Flash::error('Notice not found');

			return redirect(route('noticias.index'));
		}

		$this->noticeRepository->delete($id);

		Flash::success('Notice deleted successfully.');

		return redirect(route('noticias.index'));
	}
}
