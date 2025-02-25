<?php

namespace App\Livewire\Scheduling\Profile;

use App\Models\Business;
use App\Services\AddressService;
use Livewire\Component;

class EditBusiness extends Component
{
    public $name, $documents, $zipCode, $address, $number, $city, $state, $neighborhood, $documentType;

    public function mount()
    {
        $business = Business::find(auth()->user()->business->id);

        $this->name = $business->name;
        $this->documentType = $business->document_type;
        $this->documents = $business->documents;
        $this->zipCode = $business->zip;
        $this->address = $business->address;
        $this->number = $business->number_address;
        $this->city = $business->city;
        $this->state = $business->state;
        $this->neighborhood = $business->neighborhood;
    }

    public function updatedZipCode()
    {
        $address = AddressService::getAddress($this->zipCode);

        if (!$address) {
            $this->addError('zipCode', 'O  Cep informado não existe.');
        } else {
            $this->address = $address['address'] ?? '';
            $this->state = $address['st'] ?? '';
            $this->neighborhood = $address['neighborhood'] ?? '';
            $this->city = $address['city'] ?? '';
        }
    }

    public function saveBusiness()
    {
        // FALTA O DE BUSINESS
    }

    public function render()
    {
        return view('livewire.scheduling.profile.edit-business');
    }
}
