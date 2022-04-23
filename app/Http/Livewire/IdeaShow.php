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

    public function vote()
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        if ($this->hasVoted) {
            $this->idea->removeVote(Auth::user());
            $this->votesCount--;
            $this->hasVoted = false;
        } else {
            $this->idea->vote(Auth::user());
            $this->votesCount++;
            $this->hasVoted = true;
        }
    }
    public function render()
    {
        return view('livewire.idea-show');
    }
}
