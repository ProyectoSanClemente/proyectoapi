<?php namespace App\Http\Controllers\API;

use App\Http\Requests;
use App\Libraries\Repositories\UsuarioRepository;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class UsuarioAPIController extends AppBaseController
{
	/** @var  UsuarioRepository */
	private $usuarioRepository;

	function __construct(UsuarioRepository $usuarioRepo)
	{
		$this->usuarioRepository = $usuarioRepo;
	}

	/**
	 * Display a listing of the Usuario.
	 * GET|HEAD /usuarios
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuarios = $this->usuarioRepository->all();

		return $this->sendResponse($usuarios->toArray(), "Usuarios retrieved successfully");
	}

	/**
	 * Show the form for creating a new Usuario.
	 * GET|HEAD /usuarios/create
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created Usuario in storage.
	 * POST /usuarios
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(sizeof(Usuario::$rules) > 0)
			$this->validateRequestOrFail($request, Usuario::$rules);

		$input = $request->all();

		$usuarios = $this->usuarioRepository->create($input);

		return $this->sendResponse($usuarios->toArray(), "Usuario saved successfully");
	}

	/**
	 * Display the specified Usuario.
	 * GET|HEAD /usuarios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$usuario = $this->usuarioRepository->apiFindOrFail($id);

		return $this->sendResponse($usuario->toArray(), "Usuario retrieved successfully");
	}

	/**
	 * Show the form for editing the specified Usuario.
	 * GET|HEAD /usuarios/{id}/edit
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
	 * Update the specified Usuario in storage.
	 * PUT/PATCH /usuarios/{id}
	 *
	 * @param  int              $id
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$input = $request->all();

		/** @var Usuario $usuario */
		$usuario = $this->usuarioRepository->apiFindOrFail($id);

		$result = $this->usuarioRepository->updateRich($input, $id);

		$usuario = $usuario->fresh();

		return $this->sendResponse($usuario->toArray(), "Usuario updated successfully");
	}

	/**
	 * Remove the specified Usuario from storage.
	 * DELETE /usuarios/{id}
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->usuarioRepository->apiDeleteOrFail($id);

		return $this->sendResponse($id, "Usuario deleted successfully");
	}
}
