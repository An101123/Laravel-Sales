<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateaboutUsRequest;
use App\Http\Requests\UpdateaboutUsRequest;
use App\Repositories\aboutUsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class aboutUsController extends AppBaseController
{
    /** @var  aboutUsRepository */
    private $aboutUsRepository;

    public function __construct(aboutUsRepository $aboutUsRepo)
    {
        $this->aboutUsRepository = $aboutUsRepo;
    }

    /**
     * Display a listing of the aboutUs.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $aboutuses = $this->aboutUsRepository->all();

        return view('aboutuses.index')
            ->with('aboutuses', $aboutuses);
    }

    /**
     * Show the form for creating a new aboutUs.
     *
     * @return Response
     */
    public function create()
    {
        return view('aboutuses.create');
    }

    /**
     * Store a newly created aboutUs in storage.
     *
     * @param CreateaboutUsRequest $request
     *
     * @return Response
     */
    public function store(CreateaboutUsRequest $request)
    {
        $input = $request->all();
        $aboutUs = $this->aboutUsRepository->create($input);

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move('image', $name);
            $aboutUs->image=$name;
        }
        $aboutUs->save();
        
        Flash::success('About Us saved successfully.');

        return redirect(route('aboutuses.index'));
    }

    /**
     * Display the specified aboutUs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $aboutUs = $this->aboutUsRepository->find($id);

        if (empty($aboutUs)) {
            Flash::error('About Us not found');

            return redirect(route('aboutuses.index'));
        }

        return view('aboutuses.show')->with('aboutUs', $aboutUs);
    }

    /**
     * Show the form for editing the specified aboutUs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $aboutUs = $this->aboutUsRepository->find($id);

        if (empty($aboutUs)) {
            Flash::error('About Us not found');

            return redirect(route('aboutuses.index'));
        }

        return view('aboutuses.edit')->with('aboutUs', $aboutUs);
    }

    /**
     * Update the specified aboutUs in storage.
     *
     * @param int $id
     * @param UpdateaboutUsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateaboutUsRequest $request)
    {
        $aboutUs = $this->aboutUsRepository->find($id);

        if (empty($aboutUs)) {
            Flash::error('About Us not found');

            return redirect(route('aboutuses.index'));
        }

        $aboutUs = $this->aboutUsRepository->update($request->all(), $id);

        Flash::success('About Us updated successfully.');

        return redirect(route('aboutuses.index'));
    }

    /**
     * Remove the specified aboutUs from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $aboutUs = $this->aboutUsRepository->find($id);

        if (empty($aboutUs)) {
            Flash::error('About Us not found');

            return redirect(route('aboutuses.index'));
        }

        $this->aboutUsRepository->delete($id);

        Flash::success('About Us deleted successfully.');

        return redirect(route('aboutuses.index'));
    }
}