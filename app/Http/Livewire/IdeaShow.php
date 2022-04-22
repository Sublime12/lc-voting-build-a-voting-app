<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IdeaShow extends Component
{
    public $idea;
    public $votesCount;
    public $hasVoted;

    public function mount(Idea $idea, $votesCount)
    {
        $this->idea = $idea;
        $this->votesCount = $votesCount;
        $this->hasVoted = $idea->isVotedByUser(Auth::user());
    }

    public function render()
    {
        return view('livewire.idea-show');
    }
}
