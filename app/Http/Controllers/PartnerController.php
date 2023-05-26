<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Type;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;

class PartnerController extends Controller
{
    public function partnerTable()
{
    $partners = Partner::with('type');

    return Datatables::of($partners)
        ->addColumn('image', function ($partner) {
            return '<img class="object-cover w-full rounded-t-lg md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="' . asset("storage/{$partner->image}") . '">';
        })
        ->addColumn('type_name', function ($partner) {
            return $partner->type->name;
        })
        ->rawColumns(['image'])
        ->make(true);
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::get();

        return view('partners.partners', compact('partners'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::get();

        return view('partners.create-partners', compact( 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnerRequest $request)
    {
        $partners= new Partner;
        $partners->name = $request->name;
        $partners->type_id = $request->input('type_id');
        $partners->link = $request->input('link');

        if ($request->hasFile('image')) {

            $partners->image = $request->file('image')->store('partners-img', 'public');
            
        }
        $partners->save();

        return to_route('partners.create')->with('success', 'Partner successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        $types = Type::get();

        return view('partners.edit-partners', compact( 'types', 'partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        $partner->name = $request->name;
        $partner->type_id = $request->input('type_id');
        $partner->link = $request->input('link');

        if ($request->hasFile('image')) {

            $partner->image = $request->file('image')->store('partners-img', 'public');
            
        }
        $partner->save();

        return to_route('partners.index')->with('success', 'Partner successfully edited!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);

        if(Storage::disk('public')->delete($partner->image)) {
        $partner->delete();
        }
        return redirect()->back()->with('success', 'Partner deleted!!');
    }
}
