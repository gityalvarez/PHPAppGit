<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticuloRequest;
use App\Http\Requests\UpdateArticuloRequest;
use App\Repositories\ArticuloRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ArticuloController extends AppBaseController
{
    /** @var  ArticuloRepository */
    private $articuloRepository;

    public function __construct(ArticuloRepository $articuloRepo)
    {
        $this->articuloRepository = $articuloRepo;
    }

    /**
     * Display a listing of the Articulo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->articuloRepository->pushCriteria(new RequestCriteria($request));
        $articulos = $this->articuloRepository->all();

        return view('articulos.index')
            ->with('articulos', $articulos);
    }

    /**
     * Show the form for creating a new Articulo.
     *
     * @return Response
     */
    public function create()
    {
        return view('articulos.create');
    }

    /**
     * Store a newly created Articulo in storage.
     *
     * @param CreateArticuloRequest $request
     *
     * @return Response
     */
    public function store(CreateArticuloRequest $request)
    {
        $input = $request->all();

        $articulo = $this->articuloRepository->create($input);

        Flash::success('Articulo saved successfully.');

        return redirect(route('articulos.index'));
    }

    /**
     * Display the specified Articulo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $articulo = $this->articuloRepository->findWithoutFail($id);

        if (empty($articulo)) {
            Flash::error('Articulo not found');

            return redirect(route('articulos.index'));
        }

        return view('articulos.show')->with('articulo', $articulo);
    }

    /**
     * Show the form for editing the specified Articulo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $articulo = $this->articuloRepository->findWithoutFail($id);

        if (empty($articulo)) {
            Flash::error('Articulo not found');

            return redirect(route('articulos.index'));
        }

        return view('articulos.edit')->with('articulo', $articulo);
    }

    /**
     * Update the specified Articulo in storage.
     *
     * @param  int              $id
     * @param UpdateArticuloRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateArticuloRequest $request)
    {
        $articulo = $this->articuloRepository->findWithoutFail($id);

        if (empty($articulo)) {
            Flash::error('Articulo not found');

            return redirect(route('articulos.index'));
        }

        $articulo = $this->articuloRepository->update($request->all(), $id);

        Flash::success('Articulo updated successfully.');

        return redirect(route('articulos.index'));
    }

    /**
     * Remove the specified Articulo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $articulo = $this->articuloRepository->findWithoutFail($id);

        if (empty($articulo)) {
            Flash::error('Articulo not found');

            return redirect(route('articulos.index'));
        }

        $this->articuloRepository->delete($id);

        Flash::success('Articulo deleted successfully.');

        return redirect(route('articulos.index'));
    }
}
