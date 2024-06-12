<?php

namespace App\Repositories;

use App\Models\Vehicle;

class VehicleRepository implements VehicleRepositoryInterface
{
    protected $model;

    public function __construct(Vehicle $vehicle)
    {
        $this->model = $vehicle;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $vehicle = $this->model->find($id);
        if ($vehicle) {
            $vehicle->update($data);
            return $vehicle;
        }
        return null;
    }

    public function delete($id)
    {
        $vehicle = $this->model->find($id);
        if ($vehicle) {
            $vehicle->delete();
            return true;
        }
        return false;
    }
}
