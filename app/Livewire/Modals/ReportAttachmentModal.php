<?php

namespace App\Livewire\Modals;

use App\Models\Chat;
use App\Services\MessageService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReportAttachmentModal extends Component
{
    use WithFileUploads;

    public ?Chat $chat;
    public array $images;
    public array $documents;
    public array $imageInfos;
    public array $documentInfos;
    public string $text;

    public function send()
    {
        $attachments = array_merge($this->images, $this->documents);

        $message = app(MessageService::class)->send(
            $this->chat,
            Auth::user(),
            $this->text ?? '',
            $attachments,
            null,
            true
        );

        $this->dispatch('message.sent', $message?->id);

        if ($message) {
            $this->reset(['images', 'documents', 'text']);
        }
    }

    public function processImages()
    {
        $this->imageInfos = [];
        foreach ($this->images as $image) {
            $this->imageInfos[] = [
                'file' => 'livewire-file:' . $image->getFileName(),
                'name' => $image->getClientOriginalName(),
                'type' => 'image',
            ];
        }
    }

    public function processDocuments()
    {
        $this->documentInfos = [];
        foreach ($this->documents as $document) {
            $this->documentInfos[] = [
                'file' => 'livewire-file:' . $document->getFileName(),
                'name' => $document->getClientOriginalName(),
                'type' => 'document',
            ];
        }
    }

    #[On('chat.select')]
    public function selectChat(Chat $chat)
    {
        $this->chat = $chat;
    }

    public function mount()
    {
        $this->chat = session('chatId') ? Chat::find(session('chatId')) : null;
        $this->images = [];
        $this->documents = [];
        $this->imageInfos = [];
        $this->documentInfos = [];
        $this->text = '';
    }

    public function render()
    {
        return view('livewire.modals.report-attachment-modal');
    }
}
