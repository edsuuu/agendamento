<?php

namespace App\Livewire\Scheduling\Auth;

use App\Models\Business;
use App\Models\SegmentTypes;
use App\Models\User;
use App\Services\AddressService;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CompleteProfile extends Component
{
    public $formData = [
        'commerceName' => '',
        'segmentType' => '',
        'phone' => '',
        'password' => '',
        'password_confirmation' => '',
    ];

    public $nameBusiness, $phone, $referralSource, $zipCode, $address, $number, $city, $state, $neighborhood;

    public $currentStep = 1;

    public $segmentsTypes = [];

    public function mount()
    {
        $this->segmentsTypes = SegmentTypes::orderBy('name', 'asc')->get();

        $dataStepOne =  Business::query()->where('user_id', auth()->user()->id)->first();

        if (isset($dataStepOne->name) && isset($dataStepOne->zip) && isset($dataStepOne->number_address) && auth()->user()->phone) {
            $this->currentStep = 2;
        }
    }

    public function nextStep()
    {
        $this->currentStep++;
    }

    public function previousStep()
    {
        $this->currentStep--;
    }

    public function saveInitial()
    {

        $validatedData = $this->validate([
            'nameBusiness' => 'required|string|min:3|max:50',
            'phone' => 'required|min:14|max:15',
            'referralSource' => 'required',
            'address' =>'required',
            'zipCode' => 'required',
            'state' => 'required',
            'neighborhood' => 'required',
            'city' => 'required',
            'number' => 'required',
        ], [
            'required' => ':attribute é obrigatório.',
            'min' => 'O campo :attribute deve ter pelo menos :min caracteres.',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
        ], [
            'nameBusiness' => 'Nome da Empresa',
            'phone' => 'Telefone',
            'referralSource'=>'Onde nos conheceu',
            'address' =>'Rua',
            'zipCode' => 'Cep',
            'state' => 'Estado',
            'neighborhood' => 'Bairro',
            'city' => 'Cidade',
            'number' => 'Número',
        ]);

        $user = auth()->user();

        $user->update([
            'phone' => '+55 ' . $validatedData['phone'],
        ]);

        $business = Business::create([
            'name' => $validatedData['nameBusiness'],
            'user_id' => auth()->user()->id,
            'address' => $validatedData['address'],
            'zip' => $validatedData['zipCode'],
            'state' => $validatedData['state'],
            'neighborhood' => $validatedData['neighborhood'],
            'city' => $validatedData['city'],
            'number_address' => $validatedData['number'],
            'referral_source' => $validatedData['referralSource'],
        ]);

        if ($business) {
            $this->currentStep = 2;
        }
    }


    public function updatedZipCode()
    {
        $address = AddressService::getAddress($this->zipCode);

        if(!$address) {
            $this->addError('zipCode', 'O  Cep informado não existe.');
        } else {
            $this->address = $address['address'] ?? '';
            $this->state = $address['st'] ?? '';
            $this->neighborhood = $address['neighborhood'] ?? '';
            $this->city = $address['city'] ?? '';
        }
    }

    public function render()
    {
        return view('livewire.scheduling.auth.complete-profile');
    }
}
