<?php

namespace App\Livewire\Book;

use App\Models\Book;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Books')]
class BookList extends Component
{
    #[Locked]
    public $amount = 10;

    public function loadMore($value = 10)
    {
        $this->amount += $value;
    }

    public function render()
    {
        return view('livewire.book.book-list', [
            'books' => Book::take($this->amount)->get(),
            'count' => Book::count(),
        ]);
    }
}
