<?php

namespace App\Livewire\User\Donation;

use App\Models\Donation;
use App\Models\Item;
use Livewire\Component;

class DonateItem extends Component
{
    public $isOpenModal = false;
    public $itemId;
    public $projectId;
    public $userId;
    public $item;
    public $receiveCount;

    public function resetFields()
    {
        $this->resetValidation();
    }

    public function openModal()
    {
        $this->item = Item::findOrFail($this->itemId);
        $this->isOpenModal = true;
    }

    public function closeModal()
    {
        $this->resetFields();
        $this->isOpenModal = false;
    }

    public function save()
    {
        if ($this->item->available_quantity == 0 || $this->item->available_quantity == null) {
            session()->flash('error', 'Something went wrong, no stock available');
            return redirect()->route('selected.projects', ['id' => $this->projectId]);
        }

        $this->resetValidation();

        $price = $this->item->available_quantity * $this->item->unit_price;

        $newAvailableQuantity = 0;

        $this->item->update([
            'available_quantity' => $newAvailableQuantity,
        ]);

        Donation::create([
            'user_id' => $this->userId,
            'project_id' => $this->projectId,
            'item_id' => $this->itemId,
            'total_price' => $price,
            'received_quantity' => $this->item->available_quantity,
            'status' => 'open',
        ]);

        $this->isOpenModal = false;
        $this->resetFields();

        session()->flash('success', 'Donation successful! Thank you for your generosity.');

        return redirect()->route('selected.projects', ['id' => $this->projectId]);
    }

    public function render()
    {
        return view('livewire.user.donation.donate-item');
    }
}
