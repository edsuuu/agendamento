<?php

namespace App\Livewire\Scheduling\Catalog\Components;

use App\Models\ProductCategory;
use App\Models\Products;
use Livewire\Component;

class  ModalProduct extends Component
{
    public $id, $name, $price, $quantity, $categorySelect, $idDelete;
    public $categories = [];

    public function mount($idProduct = null, $idDelete = null): void
    {
        if ($idProduct) {
            $this->id = $idProduct;

            $productById = Products::query()->find($idProduct);

            $this->name = $productById->name;
            $this->price = number_format($productById->price, 2,  ',' , '.');
            $this->quantity = $productById->quantity;
            $this->categorySelect = $productById->product_category_id;
        }

        if ($idDelete) {
            $this->idDelete = $idDelete;
        }

        $this->categories = ProductCategory::query()->where('business_id', auth()->user()->business->id)->get();
    }

    public function closeModal(): void
    {
        $this->dispatch('closeModalProduct');
    }

    public function save(): void
    {
        $validate = $this->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required:min:0',
            'categorySelect' => 'sometimes|nullable',
        ], [
            'required' => 'O campo :attribute é obrigatorio.',
        ], [
            'name' => 'Nome',
            'price' => 'Preço',
            'quantity' => 'Quantidade',
            'categorySelect' => 'Categoria',
        ]);

        if ($this->id) {
            Products::query()->find($this->id)->update([
                'name' => $this->name,
                'price' => (float)str_replace(',', '.', str_replace('.', '', $this->price)),
                'quantity' => $this->quantity,
                'product_category_id' => (int)$validate['categorySelect'] ?? null,
            ]);
        } else {
            Products::updateOrCreate(
                ['id' => $this->id ?? null],
                ['name' => $validate['name'], 'business_id' => auth()->user()->business->id],
                [
                    'price' => (float)str_replace(',', '.', str_replace('.', '', $validate['price'])),
                    'quantity' => $validate['quantity'],
                    'product_category_id' => (int)$validate['categorySelect'] ?? null,
                    'business_id' => auth()->user()->business->id,
                ]
            );
        }

        $this->closeModal();
        $this->dispatch('refreshNewProducts');
    }

    public function createNewCategory(): void
    {
        $this->closeModal();

        $this->dispatch('openModalCategory');
    }

    public function deleteProduct($id): void
    {
        $prod = Products::query()->find($id)->delete();

        if ($prod) {
            $this->closeModal();
            $this->dispatch('refreshNewProducts');
        }
    }

    public function render()
    {
        return view('livewire.scheduling.catalog.components.modal-product');
    }
}
