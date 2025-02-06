<?php

namespace App\Livewire\Scheduling\Catalog\Components;

use App\Models\ProductCategory;
use Livewire\Component;

class ModalCategory extends Component
{

    public $name, $idCategory, $idCategoryDelete;

    public function mount($idCategory = null, $idDelete = null)
    {
        if ($idCategory) {
            $this->idCategory = $idCategory;

            $this->name = ProductCategory::query()->find($idCategory)->name;
        }

        if ($idDelete) {
            $this->idCategoryDelete = $idDelete;
        }
    }

    public function save()
    {
        $validate = $this->validate([
            'name' => 'required',
        ], [
            'required' => 'O campo :attribute é obrigatorio',
        ], [
            'name' => 'Nome',
        ]);

        if ($this->idCategory) {
            ProductCategory::where('id', $this->idCategory)
                ->where('business_id', auth()->user()->business->id)
                ->update([
                    'name' => $validate['name'],
                ]);
        } else {
            ProductCategory::updateOrCreate(
                [
                    'name' => $validate['name'],
                    'business_id' => auth()->user()->business->id
                ],
                [
                    'business_id' => auth()->user()->business->id,
                ]
            );
        }

        $this->closeModal();
        $this->dispatch('refreshNewProducts');

    }

    public function deleteCategory($id): void
    {
        $haveProductsByCategory = ProductCategory::query()->with('products')->find($id);

        if (count($haveProductsByCategory->products) >= 1) {
            foreach ($haveProductsByCategory->products as $product) {
                $product->update(['product_category_id' => null]);
            }
        }

        $haveProductsByCategory->delete();
        $this->closeModal();
        $this->dispatch('refreshNewProducts');
    }

    public function closeModal(): void
    {
        $this->dispatch('closeModalCategory');
    }

    public function render()
    {
        return view('livewire.scheduling.catalog.components.modal-category');
    }
}
