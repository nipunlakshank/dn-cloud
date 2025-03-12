<?php

namespace App\Livewire\Modals;

use App\Models\Chat;
use App\Services\MessageService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageAttachmentModal extends Component
{
    use WithFileUploads;

    public ?Chat $chat;
    public array $images;
    public string $text;

    public function send()
    {
        $message = app(MessageService::class)->send(
            $this->chat,
            Auth::user(),
            $this->text ?? '',
            $this->images,
        );

        $this->dispatch('message.sent', $message?->id);

        if ($message) {
            $this->reset(['images', 'text']);
        }
    }

    #[On('chat.select')]
    public function selectChat(Chat $chat)
    {
        $this->chat = $chat;
    }

    public function mount(?Chat $chat = null)
    {
        $this->chat = $chat;
        $this->images = [];
        $this->text = '';
    }

    public function render()
    {
        return view('livewire.modals.image-attachment-modal');
    }
}
