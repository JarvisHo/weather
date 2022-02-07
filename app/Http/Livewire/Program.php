<?php

namespace App\Http\Livewire;

use App\Models\Tool;
use Livewire\Component;
use \App\Models\Program as Programs;

class Program extends Component
{
    public $programs;
    public $tool;
    public $date;
    public $time;
    public $selected;
    public $candidateTools;
    public $availableTools;
    public $defaultVisible;
    public $editVisible;
    public $createVisible;
    public $noteVisible;
    public $note;

    protected $listeners = ['showEdit', 'showDefault', 'hideEdit', 'hideDefault', 'toggleCreate', 'toggleNote'];

    public function toggleNote()
    {
        $this->noteVisible = !$this->noteVisible;
    }

    public function showEdit()
    {
        $this->editVisible = true;
    }

    public function showDefault()
    {
        $this->defaultVisible = true;
    }

    public function hideEdit()
    {
        $this->editVisible = false;
    }

    public function hideDefault()
    {
        $this->defaultVisible = false;
    }

    public function toggleCreate()
    {
        $this->createVisible = !$this->createVisible;
    }

    public function render()
    {
        return view('livewire.program');
    }

    public function mount()
    {
        $this->defaultVisible = true;
        $this->selected = null;
        $this->programs = Programs::limit(3)->get();
        $this->date = date('Y-m-d', strtotime('now'));
        $this->time = date('H:i:s', strtotime('now'));
    }

    public function start($uuid)
    {
        $this->programs = Programs::where('uuid', $uuid)->with('tools')->get();
        $this->selected = $this->programs->first();
        $record = auth()->user()->records()->where('program_id', $this->selected->id)->orderBy('id', 'desc')->first();
        $this->setTools($record);
        $this->availableTools = auth()->user()->tools->diff($this->candidateTools);
    }

    public function add($id)
    {
        if($this->availableTools->count() == 0) return;
        $tool = $this->availableTools->whereIn('id', $id)->first();
        $this->availableTools = $this->availableTools->filter(function($item) use($id) {
            return $item->id != $id;
        });
        $this->candidateTools->push($tool);
    }

    public function remove($id)
    {
        if($this->candidateTools->count() == 1) return;
        $tool = $this->candidateTools->whereIn('id', $id)->first();
        $this->candidateTools = $this->candidateTools->filter(function($item) use($id) {
            return $item->id != $id;
        });
        $this->availableTools->push($tool);
    }

    public function store()
    {
        if(empty($this->tool)) return;
        $colors = collect(['#238FA7', '#176D5E', '#5E5E5E', '#61176D', '#6F4E29']);
        $tool = auth()->user()->tools()->firstOrCreate(['name' => $this->tool],['color' => $colors->random()]);
        $this->candidateTools->push($tool);
        $this->tool = '';
        $this->emit('toggleCreate');
    }

    public function create()
    {
        $this->emit('toggleCreate');
    }

    public function edit()
    {
        $this->emit('showEdit');
        $this->emit('hideDefault');
    }

    public function default()
    {
        $this->emit('hideEdit');
        $this->emit('showDefault');
    }

    public function startNote()
    {
        $this->emit('toggleNote');
    }

    public function save()
    {
        $record = auth()->user()->records()->create([
            'program_id' => $this->selected->id,
            'note' => $this->note ?? '',
        ]);

        $this->candidateTools->each(function ($tool) use ($record) {
            $record->tools()->attach($tool);
        });

        session()->flash('message', '洗車紀錄儲存成功');

        return redirect()->to('/');
    }

    /**
     * @param $record
     * @return void
     */
    public function setTools($record): void
    {
        if (!empty($record->id)) {
            $this->candidateTools = $record->tools;
        } else {
            $this->candidateTools = $this->selected->tools;
        }
    }

    public function cancel()
    {
        $this->mount();
    }
}
