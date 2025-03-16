<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use App\Services\ChatService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatCard extends Component
{
    public User $user;
    public Chat $chat;
    public ?Message $lastMessage;
    public ?string $timeElapsed;
    public int $unreadCount;
    public ?string $chatName;
    public ?string $chatAvatar;
    public bool $isGroup;
    public bool $isPinned;
    public bool $selected;

    public function selectChat()
    {
        $this->selected = true;
        $this->dispatch('chat.select', $this->chat);
    }

    #[On('chat.select')]
    public function updateSelected(Chat $chat)
    {
        $this->selected = $this->chat->id === $chat->id;
    }

    #[On('chat.deselect')]
    public function deselectChat()
    {
        $this->selected = false;
    }

    public function togglePin()
    {
        $this->isPinned = ChatService::togglePin($this->chat);
    }

    #[On('chat.read')]
    public function markAsRead($chatId)
    {
        if ($chatId !== $this->chat->id) {
            return;
        }
        $this->unreadCount = 0;
    }

    #[On('newMessage')]
    public function newMessageCheck(?array $data = null)
    {
        $messageId = $data['messageId'] ?? null;
        $message = $messageId ? Message::find($messageId) : null;

        if (!$message || $message->chat_id !== $this->chat->id) {
            return;
        }
        $this->refreshLastMessage();
    }

    public function refreshLastMessage()
    {
        if (empty($this->chat->lastMessage)) {
            return;
        }

        if ($this->chat->lastMessage()->first()->id !== $this->lastMessage?->id) {
            $this->lastMessage = $this->chat->lastMessage()->first();
            if ($this->lastMessage->user_id !== $this->user->id) {
                $this->unreadCount = ($this->unreadCount ?? 0) + 1;
                $this->dispatch('newMessage', ['messageId' => $this->lastMessage?->id, 'chatId' => $this->chat->id]);
                if ($this->selected) {
                    $this->markAsRead($this->chat->id);
                }
            }
        }
        $this->timeElapsed = $this->calculateTimeElapsed();
    }

    // public function getLastMessageInfo(): string
    // {
    //     if (empty($this->lastMessage)) {
    //         return '-';
    //     }
    //
    //     $lastMessage = $this->lastMessage;
    //     $lastMessageUser = $lastMessage->user;
    //     $lastMessageText = $lastMessage->text;
    //
    //     $sender = $lastMessageUser->first_name;
    //     $text = $lastMessageText;
    //
    //     if ($lastMessage->is_report) {
    //         return "<div class='inline-flex'>
    //                     <span class='text-sm font-semibold'>$sender: </span>
    //                     <svg width='18' height='18' viewBox='0 0 24 24' fill='currentColor'
    //                         xmlns='http://www.w3.org/2000/svg'>
    //                         <path fill-rule='evenodd' clip-rule='evenodd'
    //                             d='M9 7V2.22117C8.81709 2.31517 8.64812 2.43766 8.5 2.58579L4.58579 6.5C4.43766 6.64812 4.31517 6.81709 4.22117 7H9ZM11 7V2H18C19.1046 2 20 2.89543 20 4V20C20 21.1046 19.1046 22 18 22H6C4.89543 22 4 21.1046 4 20V9H9C10.1046 9 11 8.10457 11 7ZM10 16C10 15.4477 9.55228 15 9 15C8.44772 15 8 15.4477 8 16V18C8 18.5523 8.44772 19 9 19C9.55228 19 10 18.5523 10 18V16ZM12 11C12.5523 11 13 11.4477 13 12V18C13 18.5523 12.5523 19 12 19C11.4477 19 11 18.5523 11 18V12C11 11.4477 11.4477 11 12 11ZM16 15C16 14.4477 15.5523 14 15 14C14.4477 14 14 14.4477 14 15V18C14 18.5523 14.4477 19 15 19C15.5523 19 16 18.5523 16 18V15Z'
    //                             fill='currentColor' />
    //                     </svg>
    //                     <span class='italic'>Report</span>
    //                 </div>";
    //     }
    //
    //     /*
    //     * TODO: If the current user is the sender, should do something like:
    //     * return view("livewire.chat.message-state")->render() . $otherInfo
    //     */
    //
    //     if ($lastMessageUser->id === $this->user->id) {
    //         $sender = 'Me';
    //     }
    //
    //     if (empty($text)) {
    //         $attachmentCount = $lastMessage->attachments()->count();
    //         if ($attachmentCount > 1) {
    //             return "$sender: 📎 <span class=\"italic\">{$attachmentCount} Files</span>";
    //         }
    //         $attachmentType = 'File';
    //         $attachmentIcon = '📎';
    //         $attachmentType = $lastMessage->attachments()->pluck('message_attachments.category')->first();
    //         switch (strtolower($attachmentType)) {
    //             case 'image':
    //                 $attachmentIcon = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    //                     <path fill-rule="evenodd" clip-rule="evenodd" d="M9 2.22117V7H4.22117C4.31517 6.81709 4.43766 6.64812 4.58579 6.5L8.5 2.58579C8.64812 2.43766 8.81709 2.31517 9 2.22117ZM11 2V7C11 8.10457 10.1046 9 9 9H4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V4C20 2.89543 19.1046 2 18 2H11ZM11.3944 11.5528C11.2195 11.2029 10.8566 10.9871 10.4656 11.0006C10.0746 11.0141 9.72739 11.2543 9.57693 11.6154L7.07693 17.6154C6.94833 17.924 6.98249 18.2765 7.16795 18.5547C7.35342 18.8329 7.66565 19 8 19H16C16.3466 19 16.6684 18.8205 16.8507 18.5257C17.0329 18.2309 17.0494 17.8628 16.8944 17.5528L14.8944 13.5528C14.7394 13.2428 14.435 13.0352 14.0898 13.004C13.7446 12.9729 13.408 13.1227 13.2 13.4L12.6708 14.1056L11.3944 11.5528ZM13 9.5C13 8.67157 13.6716 8 14.5 8C15.3284 8 16 8.67157 16 9.5C16 10.3284 15.3284 11 14.5 11C13.6716 11 13 10.3284 13 9.5Z" fill="currentColor"/>
    //                 </svg>';
    //                 break;
    //             case 'document':
    //                 $attachmentIcon = '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    //                     <path fill-rule="evenodd" clip-rule="evenodd" d="M9 2.22117V7H4.22117C4.31517 6.81709 4.43766 6.64812 4.58579 6.5L8.5 2.58579C8.64812 2.43766 8.81709 2.31517 9 2.22117ZM11 2V7C11 8.10457 10.1046 9 9 9H4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V4C20 2.89543 19.1046 2 18 2H11ZM8 16C8 15.4477 8.44772 15 9 15H15C15.5523 15 16 15.4477 16 16C16 16.5523 15.5523 17 15 17H9C8.44772 17 8 16.5523 8 16ZM9 11C8.44772 11 8 11.4477 8 12C8 12.5523 8.44772 13 9 13H15C15.5523 13 16 12.5523 16 12C16 11.4477 15.5523 11 15 11H9Z" fill="currentColor"/>
    //                 </svg>';
    //                 break;
    //             default:
    //                 $attachmentIcon = '';
    //         }
    //
    //         return "<div class=\"inline-flex gap-1 items-end\">
    //                     <span class=\"text-sm font-semibold\">$sender: </span>
    //                     <div class=\"inline-flex gap-1 items-end\">
    //                         $attachmentIcon <span class=\"italic\">$attachmentType</span>
    //                     </div>
    //                 </div>";
    //     }
    //
    //     return "$sender: $lastMessageText";
    // }

    public function calculateTimeElapsed($timestamp = null)
    {
        $timestamp = $timestamp ?? $this->lastMessage?->created_at;
        if (!$timestamp) {
            return null;
        }
        if ($timestamp->diffInSeconds() < 60) {
            return 'Just now';
        }

        return $timestamp->shortAbsoluteDiffForHumans();
    }

    public function mount(Chat $chat)
    {
        $this->user = Auth::user();
        $this->chat = $chat;
        $this->selected = false;
        $this->lastMessage = $chat->lastMessage()->with('user')->first() ?? null;
        $this->timeElapsed = $this->calculateTimeElapsed($this->lastMessage?->created_at);
        $this->unreadCount = app(ChatService::class)->getUnreadCount($chat, $this->user);

        if ($chat->is_group) {
            $this->chatName = $chat->group->name;
        } else {
            $this->chatName = $chat->otherUsers(Auth::id())->first()->name();
        }

        $this->isGroup = $chat->is_group;

        if ($this->isGroup) {
            $this->chatAvatar = $chat->group->avatar_url;
        } else {
            $this->chatAvatar = $chat->otherUsers(Auth::id())->first()->avatar_url;
        }

        $this->chatAvatar = $this->chatAvatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($this->chatName) . '&background=random';
        $this->isPinned = $chat->isPinned($this->user->id);
    }

    public function render()
    {
        return view('livewire.chat.chat-card');
    }
}
