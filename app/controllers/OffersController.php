<?php

class OffersController extends BaseController {

	/**
	 * Offer Repository
	 *
	 * @var Offer
	 */
	protected $offer;

	public function __construct(Offer $offer)
	{
		$this->offer = $offer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$offers = $this->offer->all();

		return View::make('offers.index', compact('offers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('offers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Offer::$rules);

		if ($validation->passes())
		{
			$this->offer->create($input);

			return Redirect::route('offers.index');
		}

		return Redirect::route('offers.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$offer = $this->offer->findOrFail($id);

		return View::make('offers.show', compact('offer'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$offer = $this->offer->find($id);

		if (is_null($offer))
		{
			return Redirect::route('offers.index');
		}

		return View::make('offers.edit', compact('offer'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Offer::$rules);

		if ($validation->passes())
		{
			$offer = $this->offer->find($id);
			$offer->update($input);

			return Redirect::route('offers.show', $id);
		}

		return Redirect::route('offers.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->offer->find($id)->delete();

		return Redirect::route('offers.index');
	}

}
