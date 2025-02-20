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

    public Chat $chat;
    public array $images;
    public string $text;

    public function send()
    {
        $attachments = [];

        foreach ($this->images as $image) {
            $attachments[] = ['path' => $image, 'type' => 'image'];
        }

        $message = app(MessageService::class)->send(
            $this->chat,
            Auth::user(),
            $this->text,
            $attachments,
        );

        if ($message) {
            $this->reset(['images', 'text']);
        }
    }

    #[On('chat.select')]
    public function selectChat(Chat $chat)
    {
        $this->chat = $chat;
    }

    public function mount()
    {
        $this->images = [];
        $this->text = '';
    }

    public function render()
    {
        return view('livewire.modals.image-attachment-modal');
    }
}
