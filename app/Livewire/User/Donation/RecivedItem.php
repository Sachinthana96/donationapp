<?php

namespace App\Livewire\User\Donation;

use App\Models\Donation;
use App\Models\Item;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RecivedItem extends Component
{
    public $isOpenModal = false;
    public $itemId;
    public $projectId;
    public $userId;
    public $item;
    public $receiveCount;

    protected function rules()
    {
        return [
            'receiveCount' => [
                'required',
                'numeric',
                'min:1',
                function ($attribute, $value, $fail) {
                    if ($this->item && $value > $this->item->available_quantity) {
                        $fail('The receive count cannot exceed the available quantity.');
                    }
                },
            ],
        ];
    }

    protected $messages = [
        'receiveCount.required' => 'This field is required.',
        'receiveCount.numeric' => 'The receive count must be a number.',
        'receiveCount.min' => 'The receive count must be at least 1.',
    ];

    public function resetFields()
    {
        $this->reset(['receiveCount']);
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
        $this->resetValidation();
        $this->validate();

        $price = $this->receiveCount * $this->item->unit_price;
        if ($this->item->available_quantity >= $this->receiveCount) {
            $availbleQuntiy = $this->item->available_quantity - $this->receiveCount;
            $this->item->update([
                'available_quantity' => $availbleQuntiy,
            ]);
            $status = 'open';
        }

        Donation::create([
            'user_id' => $this->userId,
            'project_id' => $this->projectId,
            'item_id' => $this->itemId,
            'total_price' => $price,
            'recived_quntity' => $this->receiveCount,
            'status' => $status,
        ]);

        $this->isOpenModal = false;
        $this->resetFields();
        session()->flash('success', 'Donation successful! Thank you for your generosity.');
        return redirect()->route('selected.projects', ['id' => $this->projectId]);
    }

    public function render()
    {
        return view('livewire.user.donation.recived-item');
    }
}
