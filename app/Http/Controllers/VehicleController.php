<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\VehicleRepositoryInterface;

class VehicleController extends Controller
{
    protected $vehicleRepository;

    public function __construct(VehicleRepositoryInterface $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    public function index()
    {
        $vehicles = $this->vehicleRepository->all();
        return response()->json($vehicles);
    }

    public function show($id)
    {
        $vehicle = $this->vehicleRepository->find($id);
        if ($vehicle) {
            return response()->json($vehicle);
        }
        return response()->json(['error' => 'Vehicle not found'], 404);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'make' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'color' => 'required|string',
            'condition' => 'required|string',
            'transmission' => 'required|string',
            'vehicle_type' => 'required|string',
            'engine' => 'required|string',
            'cylinder' => 'required|integer',
            'doors' => 'required|integer',
            'fuel_type' => 'required|string',
            'vin' => 'required|string|unique:vehicles,vin',
        ]);
        $vehicle = $this->vehicleRepository->create($data);
        return response()->json($vehicle, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'make' => 'sometimes|string',
            'model' => 'sometimes|string',
            'year' => 'sometimes|integer',
            'color' => 'sometimes|string',
            'condition' => 'sometimes|string',
            'transmission' => 'sometimes|string',
            'vehicle_type' => 'sometimes|string',
            'engine' => 'sometimes|string',
            'cylinder' => 'sometimes|integer',
            'doors' => 'sometimes|integer',
            'fuel_type' => 'sometimes|string',
            'vin' => 'sometimes|string|unique:vehicles,vin,' . $id,
        ]);
        $vehicle = $this->vehicleRepository->update($id, $data);
        if ($vehicle) {
            return response()->json($vehicle);
        }
        return response()->json(['error' => 'Vehicle not found'], 404);
    }

    public function destroy($id)
    {
        $deleted = $this->vehicleRepository->delete($id);
        if ($deleted) {
            return response()->json(['message' => 'Vehicle deleted successfully']);
        }
        return response()->json(['error' => 'Vehicle not found'], 404);
    }
}
