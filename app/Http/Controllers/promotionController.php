<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepromotionRequest;
use App\Http\Requests\UpdatepromotionRequest;
use App\Repositories\promotionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class promotionController extends AppBaseController
{
    /** @var  promotionRepository */
    private $promotionRepository;

    public function __construct(promotionRepository $promotionRepo)
    {
        $this->promotionRepository = $promotionRepo;
    }

    /**
     * Display a listing of the promotion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $promotions = $this->promotionRepository->all();

        return view('promotions.index')
            ->with('promotions', $promotions);
    }

    /**
     * Show the form for creating a new promotion.
     *
     * @return Response
     */
    public function create()
    {
        return view('promotions.create');
    }

    /**
     * Store a newly created promotion in storage.
     *
     * @param CreatepromotionRequest $request
     *
     * @return Response
     */
    public function store(CreatepromotionRequest $request)
    {
        $input = $request->all();

        $promotion = $this->promotionRepository->create($input);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move('image', $name);
            $promotion->image=$name;
        }
        $promotion->save();
        
        Flash::success('Promotion saved successfully.');

        return redirect(route('promotions.index'));
    }

    /**
     * Display the specified promotion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $promotion = $this->promotionRepository->find($id);

        if (empty($promotion)) {
            Flash::error('Promotion not found');

            return redirect(route('promotions.index'));
        }

        return view('promotions.show')->with('promotion', $promotion);
    }

    /**
     * Show the form for editing the specified promotion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $promotion = $this->promotionRepository->find($id);

        if (empty($promotion)) {
            Flash::error('Promotion not found');

            return redirect(route('promotions.index'));
        }

        return view('promotions.edit')->with('promotion', $promotion);
    }

    /**
     * Update the specified promotion in storage.
     *
     * @param int $id
     * @param UpdatepromotionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepromotionRequest $request)
    {
        $promotion = $this->promotionRepository->find($id);

        if (empty($promotion)) {
            Flash::error('Promotion not found');

            return redirect(route('promotions.index'));
        }

        $promotion = $this->promotionRepository->update($request->all(), $id);

        Flash::success('Promotion updated successfully.');

        return redirect(route('promotions.index'));
    }

    /**
     * Remove the specified promotion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $promotion = $this->promotionRepository->find($id);

        if (empty($promotion)) {
            Flash::error('Promotion not found');

            return redirect(route('promotions.index'));
        }

        $this->promotionRepository->delete($id);

        Flash::success('Promotion deleted successfully.');

        return redirect(route('promotions.index'));
    }
}