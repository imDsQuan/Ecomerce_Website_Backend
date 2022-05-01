<?php

namespace App\Http\Controllers;

use App\Repositories\DiscountRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DiscountController extends Controller
{
    protected $discountRepository;

    public function __construct(DiscountRepository $discountRepository)
    {
        $this->discountRepository = $discountRepository;
    }

    public function index()
    {
        return $this->discountRepository->getAll();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        return $this->discountRepository->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return $this->discountRepository->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param    $id
     */
    public function update(Request $request, $id)
    {
        return $this->discountRepository->update($id,$request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     */
    public function destroy($id)
    {
        $this->discountRepository->delete($id);
    }


    public function total()
    {
        return $this->discountRepository->total();
    }
}
