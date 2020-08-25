<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateorderDetailRequest;
use App\Http\Requests\UpdateorderDetailRequest;
use App\Repositories\orderDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class orderDetailController extends AppBaseController
{
    /** @var  orderDetailRepository */
    private $orderDetailRepository;

    public function __construct(orderDetailRepository $orderDetailRepo)
    {
        $this->orderDetailRepository = $orderDetailRepo;
    }

    /**
     * Display a listing of the orderDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $orderDetails = $this->orderDetailRepository->all();

        return view('order_details.index')
            ->with('orderDetails', $orderDetails);
    }

    /**
     * Show the form for creating a new orderDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('order_details.create');
    }

    /**
     * Store a newly created orderDetail in storage.
     *
     * @param CreateorderDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateorderDetailRequest $request)
    {
        $input = $request->all();

        $orderDetail = $this->orderDetailRepository->create($input);

        Flash::success('Order Detail saved successfully.');

        return redirect(route('orderDetails.index'));
    }

    /**
     * Display the specified orderDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orderDetail = $this->orderDetailRepository->find($id);

        if (empty($orderDetail)) {
            Flash::error('Order Detail not found');

            return redirect(route('orderDetails.index'));
        }

        return view('order_details.show')->with('orderDetail', $orderDetail);
    }

    /**
     * Show the form for editing the specified orderDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orderDetail = $this->orderDetailRepository->find($id);

        if (empty($orderDetail)) {
            Flash::error('Order Detail not found');

            return redirect(route('orderDetails.index'));
        }

        return view('order_details.edit')->with('orderDetail', $orderDetail);
    }

    /**
     * Update the specified orderDetail in storage.
     *
     * @param int $id
     * @param UpdateorderDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateorderDetailRequest $request)
    {
        $orderDetail = $this->orderDetailRepository->find($id);

        if (empty($orderDetail)) {
            Flash::error('Order Detail not found');

            return redirect(route('orderDetails.index'));
        }

        $orderDetail = $this->orderDetailRepository->update($request->all(), $id);

        Flash::success('Order Detail updated successfully.');

        return redirect(route('orderDetails.index'));
    }

    /**
     * Remove the specified orderDetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $orderDetail = $this->orderDetailRepository->find($id);

        if (empty($orderDetail)) {
            Flash::error('Order Detail not found');

            return redirect(route('orderDetails.index'));
        }

        $this->orderDetailRepository->delete($id);

        Flash::success('Order Detail deleted successfully.');

        return redirect(route('orderDetails.index'));
    }
}
