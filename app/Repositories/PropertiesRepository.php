<?php


namespace App\Repositories;


use App\Enums\LoanStatus;
use App\Models\Properties;

class PropertiesRepository
{
    private Properties $properties;

    public function __construct(Properties $properties)
    {
        $this->properties = $properties;
    }

    public function create($data)
    {
        return $this->properties->create($data);
    }

    public function find($id)
    {
        return $this->properties->with('user')->find($id);
    }

    public function update($id, array $data)
    {
        return $this->properties->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->properties->find($id)->delete();
    }

    public function pending()
    {
        return $this->properties->with('user')->where('status', LoanStatus::Pending)->get();
    }

    public function all()
    {
        return $this->properties->latest()->get();
    }
}
