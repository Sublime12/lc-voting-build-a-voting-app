<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class IdeaIndex extends Component
{
    public $idea;
    public $votesCount;
    public $hasVoted;

    public function mount(Idea $idea, $votesCount)
    {
        $this->idea = $idea;
        $this->votesCount = $votesCount;
        $this->hasVoted = $idea->voted_by_user;
    }


    public function render()
    {
        return view('livewire.idea-index');
    }
}
