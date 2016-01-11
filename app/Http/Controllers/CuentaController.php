<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCuentaRequest;
use App\Http\Requests\UpdateCuentaRequest;
use App\Libraries\Repositories\CuentaRepository;
use Flash;
use Mitul\Controller\AppBaseController as AppBaseController;
use Response;

class CuentaController extends AppBaseController
{

	/** @var  CuentaRepository */
	private $cuentaRepository;

	function __construct(CuentaRepository $cuentaRepo)
	{
		$this->cuentaRepository = $cuentaRepo;
	}

	/**
	 * Display a listing of the Cuenta.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cuentas = $this->cuentaRepository->paginate(10);

		return view('cuentas.index')
			->with('cuentas', $cuentas);
	}

	/**
	 * Show the form for creating a new Cuenta.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('cuentas.create');
	}

	/**
	 * Store a newly created Cuenta in storage.
	 *
	 * @param CreateCuentaRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCuentaRequest $request)
	{
		$input = $request->all();

		$cuenta = $this->cuentaRepository->create($input);

		Flash::success('Cuenta saved successfully.');

		return redirect(route('cuentas.index'));
	}

	/**
	 * Display the specified Cuenta.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$cuenta = $this->cuentaRepository->find($id);

		if(empty($cuenta))
		{
			Flash::error('Cuenta not found');

			return redirect(route('cuentas.index'));
		}

		return view('cuentas.show')->with('cuenta', $cuenta);
	}

	/**
	 * Show the form for editing the specified Cuenta.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$cuenta = $this->cuentaRepository->find($id);

		if(empty($cuenta))
		{
			Flash::error('Cuenta not found');

			return redirect(route('cuentas.index'));
		}

		return view('cuentas.edit')->with('cuenta', $cuenta);
	}

	/**
	 * Update the specified Cuenta in storage.
	 *
	 * @param  int              $id
	 * @param UpdateCuentaRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCuentaRequest $request)
	{
		$cuenta = $this->cuentaRepository->find($id);

		if(empty($cuenta))
		{
			Flash::error('Cuenta not found');

			return redirect(route('cuentas.index'));
		}

		$this->cuentaRepository->updateRich($request->all(), $id);

		Flash::success('Cuenta updated successfully.');

		return redirect(route('cuentas.index'));
	}

	/**
	 * Remove the specified Cuenta from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$cuenta = $this->cuentaRepository->find($id);

		if(empty($cuenta))
		{
			Flash::error('Cuenta not found');

			return redirect(route('cuentas.index'));
		}

		$this->cuentaRepository->delete($id);

		Flash::success('Cuenta deleted successfully.');

		return redirect(route('cuentas.index'));
	}
}
