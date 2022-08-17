<?php


namespace App\Services;


use App\Enums\LoanStatus;
use App\Event\LoanApplied;
use App\Event\LoanApproved;
use App\Repositories\PropertiesRepository;
use Illuminate\Http\Request;

class PropertiesService
{
    private PropertiesRepository $property;

    public function __construct(PropertiesRepository $repository)
    {
        $this->property = $repository;
    }

    public function create(Request $request)
    {
        $attributes = $request->all();

        $property = $this->property->create($attributes);
        event(new LoanApplied($property));
        return $property;
    }

    public function index()
    {
        return $this->property->all();
    }

    public function read($id)
    {
        return $this->property->find($id);
    }

    public function update(Request $request, $id)
    {
        $attributes = $request->all();

        return $this->property->update($id, $attributes);
    }

    public function delete($id)
    {
        return $this->property->delete($id);
    }

    public function approve($id)
    {
        $this->property->update($id, ['status'=>LoanStatus::Approved]);
        $loan = $this->read($id);
        event(new LoanApproved($loan));
        return $loan;
    }

    public function reject($id)
    {
        $this->property->update($id, ['status'=>LoanStatus::Rejected]);
        $loan = $this->read($id);
        //event(new LoanApproved($loan));
        return $loan;
    }
}
