<?php

namespace App\Http\Controllers;

use App\Repositories\AddressRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/**
 * @OA\Tag(
 *     name="address-controller",
 *     description="Address Controller" 
 * )
 * 
 */

class AddressController extends Controller
{
    
    protected $addressRepositoryInterface;
    
    public function __construct(AddressRepositoryInterface $addressRepositoryInterface)
    {
        //$this->middleware('auth');
        //$this->middleware('auth:api');
        $this->addressRepositoryInterface = $addressRepositoryInterface;
    }
    
    /**
     * @OA\Get(
     *      tags={"address-controller"},
     *      summary="index",
     *      path="/address",
     *      description="Display a listing of the resource",
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(ref="#/components/schemas/Address"),
     *         ),
     *       )
     * )
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        // variable
        $user_id = 0;
        $addresses = null;
        
        // get data
        if( Auth::user() != null && Auth::user()->id != null){
            $user_id = Auth::user()->id;
        }
        
        $user_billing_addresses = $this->addressRepositoryInterface->getBillingAddressesByUserId($user_id);
        $user_shipping_addresses = $this->addressRepositoryInterface->getShippingAddressesByUserId($user_id);
       
        $addresses['billing']= $user_billing_addresses; 
        $addresses['shipping'] = $user_shipping_addresses;
        
        return $addresses;
    }
    
    /**
     * @OA\Get(
     *      tags={"address-controller"},
     *      summary="create",
     *      path="/address/create",
     *      description="Show the form for creating a new resource",
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       )
     * )
     *
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *      tags={"address-controller"},
     *      summary="store",
     *      path="/address",
     *      description="Store a newly created resource in storage",
     *      @OA\Parameter(
     *         name = "Address",
     *         in="query",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Address")
     *      ),
     *      @OA\Response(
     *         response=200,
     *          description="OK"
     *     )
     * )
     *
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        //
    }

    /**
     * @OA\Get(
     *      tags={"address-controller"},
     *      summary="show",
     *      path="/address/{id}",
     *      description="Display the specified resource",
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          description="Object id",
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Address")
     *      )
     * )
     *     
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @OA\Get(
     *      tags={"address-controller"},
     *      summary="edit",
     *      path="/address/{id}/edit",
     *      description="Show the form for editing the specified resource",
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          description="Object id",
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       )
     *     )
     *     
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->back();
    }

    /**
     * @OA\Put(
     *      tags={"address-controller"},
     *      summary="update",
     *      path="/address/{id}",
     *      description="Update the specified resource in storage",
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          description="Object id",
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *         name = "Address",
     *         in="query",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Address")
     *      ),   
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       )
     *     )
     *     
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @OA\Delete(
     *      tags={"address-controller"},
     *      summary="delete",
     *      path="/address/{id}",
     *      description="Remove the specified resource from storage",
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          description="Object id",
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK"
     *       )
     *     )
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->back();
    }
    

}
