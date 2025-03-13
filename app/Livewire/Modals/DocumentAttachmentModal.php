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

    public ?Chat $chat;
    public array $documents;
    public string $text;

    public function send()
    {
        $message = app(MessageService::class)->send(
            $this->chat,
            Auth::user(),
            $this->text ?? '',
            $this->documents,
        );

        $this->dispatch('newMessage', ['messageId' => $message?->id, 'chatId' => $this->chat?->id]);

        if ($message) {
            $this->reset(['documents', 'text']);
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
        $this->documents = [];
        $this->text = '';
    }

    public function render()
    {
        return view('livewire.modals.document-attachment-modal');
    }
}
