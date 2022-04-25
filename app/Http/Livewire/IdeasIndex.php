<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use App\Models\Vote;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Models\Status;

class IdeasIndex extends Component
{
    // use WithPagination;

    public function render()
    {
        $statuses = Status::all()->pluck('id', 'name');

        return view('livewire.ideas-index', [
            'ideas' => Idea::with('user', 'category', 'status')
                ->when(request()->status && request()->status !== 'All', function ($query) use ($statuses) {
                    return $query->where('status_id', $statuses->get(request()->status));
                })
                ->addSelect(['voted_by_user' => Vote::select('id')
                    ->where('user_id', Auth::id())
                    ->whereColumn('idea_id', 'ideas.id')
                ])
                ->withCount('votes')
                ->orderBy('id', 'DESC')
                ->simplePaginate(Idea::PAGINATION_COUNT),
        ]);
    }
}
