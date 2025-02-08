<?php

namespace App\Livewire\Scheduling\Catalog;

use App\Models\ProductCategory;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Products as ProductsBusiness;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    protected $listeners = [
        'refreshNewProducts' => '$refresh',
    ];

    public $openModal = false, $openModalCategory = false, $viewCategory = false;
    public $selectedProductForEdit, $selectedProductForDelete, $selectedCategoryForEdit, $selectedCategoryForDelete, $searchProduct;


    #[On('closeModalProduct')]
    public function openAndCloseModal($id = null, $deleteId = null)
    {
        if ($id != null) {
            $this->selectedProductForEdit = $id;
        }

        if ($deleteId != null) {
            $this->selectedProductForDelete = $deleteId;
        }

        $this->openModal = !$this->openModal;

        if (!$this->openModal) {
            $this->selectedProductForEdit = null;
            $this->selectedProductForDelete = null;
        }
    }

    #[On(['closeModalCategory', 'openModalCategory'])]
    public function openAndCloseModalCategory($id = null, $deleteId = null):void
    {
        if ($id != null) {
            $this->selectedCategoryForEdit = $id;
        }

        if ($deleteId != null) {
            $this->selectedCategoryForDelete = $deleteId;
        }

        $this->openModalCategory = !$this->openModalCategory;

        if (!$this->openModalCategory) {
            $this->selectedCategoryForEdit = null;
            $this->selectedCategoryForDelete = null;
        }
    }


    public function viewCategoriesAndProducts(): void
    {
        $this->viewCategory = !$this->viewCategory;
    }

    public function mount()
    {

    }

    public function render()
    {
        $productsQuery = ProductsBusiness::query()
            ->with('category')
            ->where('business_id', auth()->user()->business->id)
            ->orderBy('name', 'ASC');

        if ($this->searchProduct) {
            $productsQuery->where(function ($query) {
                $query->where('name', 'LIKE', '%' . $this->searchProduct . '%');
            });
        }

        $products= $productsQuery->paginate(10);


        return view('livewire.scheduling.catalog.products', [
            'products' => $products,
        ]);
    }
}
