<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;

class YoutubeUrl extends Component
{
    public $url;

    public function updated($field) {
        $this->validateOnly($field, [
            'url' => 'url',
        ]);
    }

    public function checkUrl() {
        $this->validate([
            'url' => 'required|url',
        ]);

        try {
            $result = shell_exec('youtube-dl -j ' . escapeshellarg($this->url));
            $video_details = json_decode($result);
            if($video_details == null) throw new Exception();
            $this->emit('urlChecked', $video_details);
        } catch(Exception $ex) {
            session()->flash('error', 'لا يمكن معالجة الفيديو، الرجاء التأكد من الرابط والمحاولة مرة أخرى');
        }

    }

    public function render()
    {
        return view('livewire.youtube-url');
    }
}
