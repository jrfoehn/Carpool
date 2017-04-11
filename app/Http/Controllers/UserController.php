<?php namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

use App\Repositories\UserRepository;
use Input;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller {
	 protected $userRepository;
     protected $nbrPerPage = 4;
	 
	 public function __construct(UserRepository $userRepository)
    {
		$this->userRepository = $userRepository;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->userRepository->getPaginate($this->nbrPerPage);
		$links = str_replace('/?', '?', $users->render());
		return view('index', compact('users', 'links'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserCreateRequest $request)
	{
		$this->setAdmin($request);
		$user = $this->userRepository->store($request->all());
		return redirect('user')->withOk("L'utilisateur " . $user->pseudoUsers . " a été créé.");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{	
		
		$user = $this->userRepository->getById($id);

		return view('show',  compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->userRepository->getById($id);

		return view('edit',  compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UserUpdateRequest $request, $id)
	{
		if($request->input('fromAccount')!==null){
			if(Input::file('photo')!==null){
				include("../public/functions/upload_image.php");
				$filename = saveImage(Auth::user()->pseudoUsers);
				$request->merge(['photoUsers' => $filename]);
			}		
			$this->userRepository->update($id, $request->all());
			return redirect('myaccount')->withOk("Votre compte a été modifié.");
		}else{
			$this->setAdmin($request);
			$this->userRepository->update($id, $request->all());
			return redirect('user')->withOk("L'utilisateur " . $request->input('pseudoUsers') . " a été modifié.");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->userRepository->destroy($id);

		return redirect()->back();
	}
}
