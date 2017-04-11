<?php namespace App\Http\Controllers;

use App\Http\Requests\VehiculeCreateRequest;
use App\Http\Requests\VehiculeUpdateRequest;

use App\Repositories\VehiculeRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
class VehiculeController extends Controller {
	 protected $vehiculeRepository;
     protected $nbrPerPage = 4;
	 
	 public function __construct(VehiculeRepository $vehiculeRepository)
    {
		$this->vehiculeRepository = $vehiculeRepository;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$vehicules = $this->vehiculeRepository->getPaginate($this->nbrPerPage);
		$links = str_replace('/?', '?', $vehicules->render());
		return view('Vehicule/indexVehicule', compact('vehicules', 'links'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('Vehicule/createVehicule');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(vehiculeCreateRequest $request)
	{
		if($request->input('fromVehicule')!==null){
			$vehicule = $this->vehiculeRepository->store($request->all());
			return redirect('myvehicule')->withOk("Votre véhicule a bien été créé et ajouté à votre compte.");
		}else{
			$vehicule = $this->vehiculeRepository->store($request->all());
			return redirect('vehicule')->withOk("Le véhicule " . $vehicule->name . " a bien été créé.");
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{	
		
		$vehicule = $this->vehiculeRepository->getById($id);

		return view('Vehicule/showVehicule',  compact('vehicule'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vehicule = $this->vehiculeRepository->getById($id);

		return view('Vehicule/editVehicule',  compact('vehicule'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(vehiculeUpdateRequest $request, $id)
	{
		$this->vehiculeRepository->update($id, $request->all());
		return redirect('vehicule')->withOk("Le véhicule " . $request->input('nomVehicule') . " a été modifié.");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->vehiculeRepository->destroy($id);

		return redirect()->back();
	}
}
