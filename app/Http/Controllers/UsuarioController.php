<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Libraries\Repositories\UsuarioRepository;
use Flash;
use Input;
use Image;
use Hash;
use Adldap;
use Response;

class UsuarioController extends Controller
{

	/** @var  UsuarioRepository */
	private $usuarioRepository;

	function __construct(UsuarioRepository $usuarioRepo)
	{
		$this->usuarioRepository = $usuarioRepo;
	}

	/**
	 * Display a listing of the Usuario.
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuarios = $this->usuarioRepository->all();
		return view('usuarios.index')
			->with('usuarios', $usuarios);
	}

	/**
	 * Show the form for creating a new Usuario.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('usuarios.create');
	}

	/**
	 * Store a newly created Usuario in storage.
	 *
	 * @param CreateUsuarioRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateUsuarioRequest $request)
	{
		$input = $request->all();		
		
		if (Input::hasFile('imagen')){
			$input['imagen'] = 'images/avatar/'.$input['rut'].'.jpg';              
            Image::make(Input::file('imagen'))->resize(300, 300)->save($input['imagen']);
        }
        else
        	$input['imagen']='images/avatar/default.png';

        $usuario = $this->usuarioRepository->create($input);
		
		Flash::success('Usuario creado exitosamente!.');

		return redirect(route('usuarios.index'));
	}

	/**
	 * Display the specified Usuario.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$usuario = $this->usuarioRepository->find($id);

		if(empty($usuario))
		{
			Flash::error('Usuario no encontrado');

			return redirect(route('usuarios.index'));
		}
		return view('usuarios.show')->with('usuario', $usuario);
	}

	/**
	 * Show the form for editing the specified Usuario.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$usuario = $this->usuarioRepository->find($id);

		if(empty($usuario))
		{
			Flash::error('Usuario no encontrado');

			return redirect(route('usuarios.index'))
			                    ->withInput();

		}

		return view('usuarios.edit')->with('usuario', $usuario);
	}

	/**
	 * Update the specified Usuario in storage.
	 *
	 * @param  int              $id
	 * @param UpdateUsuarioRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateUsuarioRequest $request)
	{
		$usuario = $this->usuarioRepository->find($id);

		if(empty($usuario))
		{
			Flash::error('Usuario no encontrado');
			return redirect(route('usuarios.index'));
		}
		$input=$request->all();
		if (Input::hasFile('imagen')){//Actualizar Imagen
			$input['imagen'] = 'images/avatar/'.$usuario->accountname.'.jpg';           
            Image::make(Input::file('imagen'))->resize(300, 300)->save($input['imagen']);
        }
        if($input['old_password']!="" ){
	        if (!Hash::check($input['old_password'], $usuario->password)) {
	        	return redirect(action('UsuarioController@edit', array($id)))
	   				   ->withErrors('El Password actual no corresponde');
			}
		}
		else{
			unset($input['password']);
		}

        $this->usuarioRepository->updateRich($input, $id);

		Flash::success('Usuario '.$usuario->accountname.' actualizado exitosamente!.');

		return redirect(route('usuarios.index'));
	}

	/**
	 * Remove the specified Usuario from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$usuario = $this->usuarioRepository->find($id);

		if(empty($usuario))
		{
			Flash::error('Usuario no encontrado!.');

			return redirect(route('usuarios.index'));
		}

		$this->usuarioRepository->delete($id);
		$filename = 'images/avatar/'.$usuario->accountname.'.jpg';
		if(file_exists($filename))
			unlink($filename);

		Flash::success('Usuario eliminado exitosamente!.');

		return redirect(route('usuarios.index'));
	}


	public function getldapusers(){
    	$ldapusuarios = Adldap::users()->all();	
		
		foreach ($ldapusuarios as $user) {			
			$usuario=$this->usuarioRepository->findBy('accountname',$user->getAccountName());

			if(empty($usuario)){
				$data=[
				'accountname' => $user->getAccountName(),
				'displayname' => $user->getDisplayName(),
				'nombre' 	  => $user->getFirstName(),
				'apellido'    => $user->getLastName(),
				'imagen' 	  => 'images/avatar/default.png',
				'password'    => '12345',
				'created_at'  => $user->getCreatedAt(),
				'updated_at'  => $user->getUpdatedAt(),
				];
				$usuario = $this->usuarioRepository->create($data);
			}
			else{
				
			}

		}

		return redirect(route('usuarios.index'));

    }

}
