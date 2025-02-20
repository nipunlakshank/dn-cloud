<?php

namespace App\Livewire\Modals;

use App\Models\Chat;
use App\Services\MessageService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class DocumentAttachmentModal extends Component
{
    use WithFileUploads;

    public Chat $chat;
    public array $documents;
    public string $text;

    public function send()
    {
        $attachments = [];

        foreach ($this->documents as $document) {
            $attachments[] = ['path' => $document, 'type' => 'image'];
        }

        $message = app(MessageService::class)->send(
            $this->chat,
            Auth::user(),
            $this->text,
            $attachments,
        );

        if ($message) {
            $this->reset(['documents', 'text']);
        }
    }

    #[On('chat.select')]
    public function selectChat(Chat $chat)
    {
        $this->chat = $chat;
    }

    public function mount()
    {
        $this->documents = [];
        $this->text = '';
    }

    public function render()
    {
        return view('livewire.modals.document-attachment-modal');
    }
}
