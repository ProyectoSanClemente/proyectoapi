<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\NoticeRepository;
use App\Models\Notice;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class NoticeAPIController extends AppBaseController
{
	/** @var  NoticeRepository */
	private $noticeRepository;

	function __construct(NoticeRepository $noticeRepo)
	{
		$this->noticeRepository = $noticeRepo;
	}

	/**
	 * Display a listing of the Notice.
	 * GET|HEAD /notices
	 *
	 * @return Response
	 */
	public function index()
	{
		$notices = $this->noticeRepository->all();

		return $this->sendResponse($notices->toArray(), "Notices retrieved successfully");
	}

	/**
	 * Show the form for creating a new Notice.
	 * GET|HEAD /notices/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Notice in storage.
	 * POST /notices
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Notice::$rules) > 0)
			$this->validateRequestOrFail($request, Notice::$rules);

		$input = $request->all();

		$notices = $this->noticeRepository->create($input);

		return $this->sendResponse($notices->toArray(), "Notice saved successfully");
	}

	/**
	 * Display the specified Notice.
	 * GET|HEAD /notices/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$notice = $this->noticeRepository->apiFindOrFail($id);

		return $this->sendResponse($notice->toArray(), "Notice retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Notice.
	 * GET|HEAD /notices/{id}/edit
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		// maybe, you can return a template for JS
//		Errors::throwHttpExceptionWithCode(Errors::EDITION_FORM_NOT_EXISTS, ['id' => $id], static::getHATEOAS(['%id' => $id]));
	}

	/**
	 * Update the specified Notice in storage.
	 * PUT/PATCH /notices/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Notice $notice */
		$notice = $this->noticeRepository->apiFindOrFail($id);

		$result = $this->noticeRepository->updateRich($input, $id);

		$notice = $notice->fresh();

		return $this->sendResponse($notice->toArray(), "Notice updated successfully");
	}

	/**
	 * Remove the specified Notice from storage.
	 * DELETE /notices/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->noticeRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Notice deleted successfully");
	}
}
