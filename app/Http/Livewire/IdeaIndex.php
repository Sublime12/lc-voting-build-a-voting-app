<?php

namespace App\Http\Livewire;

use App\Exceptions\DuplicateVoteException;
use App\Exceptions\VoteNotFoundException;
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

    public function vote()
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }


        if ($this->hasVoted) {
            try {
                $this->idea->removeVote(Auth::user());
            } catch (VoteNotFoundException $th) {
                // do nothing
            }
            $this->votesCount--;
            $this->hasVoted = false;
        } else {
            try {
                $this->idea->vote(Auth::user());
            } catch (DuplicateVoteException $e) {
                // do nothing
            }
            $this->votesCount++;
            $this->hasVoted = true;
        }

    }

    public function render()
    {
        return view('livewire.idea-index');
    }
}
