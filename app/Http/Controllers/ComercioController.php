<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateComercioRequest;
use App\Http\Requests\UpdateComercioRequest;
use App\Repositories\ComercioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ComercioController extends AppBaseController
{
    /** @var  ComercioRepository */
    private $comercioRepository;

    public function __construct(ComercioRepository $comercioRepo)
    {
        $this->comercioRepository = $comercioRepo;
    }

    /**
     * Display a listing of the Comercio.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->comercioRepository->pushCriteria(new RequestCriteria($request));
        $comercios = $this->comercioRepository->all();

        return view('comercios.index')
            ->with('comercios', $comercios);
    }

    /**
     * Show the form for creating a new Comercio.
     *
     * @return Response
     */
    public function create()
    {
        return view('comercios.create');
    }

    /**
     * Store a newly created Comercio in storage.
     *
     * @param CreateComercioRequest $request
     *
     * @return Response
     */
    public function store(CreateComercioRequest $request)
    {
        $input = $request->all();

        $comercio = $this->comercioRepository->create($input);

        Flash::success('Comercio saved successfully.');

        return redirect(route('comercios.index'));
    }

    /**
     * Display the specified Comercio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comercio = $this->comercioRepository->findWithoutFail($id);

        if (empty($comercio)) {
            Flash::error('Comercio not found');

            return redirect(route('comercios.index'));
        }

        return view('comercios.show')->with('comercio', $comercio);
    }

    /**
     * Show the form for editing the specified Comercio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $comercio = $this->comercioRepository->findWithoutFail($id);

        if (empty($comercio)) {
            Flash::error('Comercio not found');

            return redirect(route('comercios.index'));
        }

        return view('comercios.edit')->with('comercio', $comercio);
    }

    /**
     * Update the specified Comercio in storage.
     *
     * @param  int              $id
     * @param UpdateComercioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComercioRequest $request)
    {
        $comercio = $this->comercioRepository->findWithoutFail($id);

        if (empty($comercio)) {
            Flash::error('Comercio not found');

            return redirect(route('comercios.index'));
        }

        $comercio = $this->comercioRepository->update($request->all(), $id);

        Flash::success('Comercio updated successfully.');

        return redirect(route('comercios.index'));
    }

    /**
     * Remove the specified Comercio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $comercio = $this->comercioRepository->findWithoutFail($id);

        if (empty($comercio)) {
            Flash::error('Comercio not found');

            return redirect(route('comercios.index'));
        }

        $this->comercioRepository->delete($id);

        Flash::success('Comercio deleted successfully.');

        return redirect(route('comercios.index'));
    }
}
