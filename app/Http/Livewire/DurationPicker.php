<?php

namespace App\Http\Livewire;

use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;

class DurationPicker extends Component
{
    public $url;
    public $title;
    public $duration;
    public $thumbnail;
    public $clipName;
    public $minutes;
    public $seconds;

    protected $listeners = ['urlChecked' => 'showDetails'];

    public function showDetails($details) {
        $this->url = $details['webpage_url'];
        $this->title = $details['title'];
        $this->duration = $details['duration'];
        $this->thumbnail = $details['thumbnail'];
    }

    public function createClip() {
        $this->validate([
            'clipName' => 'required|max:100'
        ]);

        try {
            $start_minutes = (int)$this->minutes >= 10 ? $this->minutes : "0" . $this->minutes;
            $start_seconds = (int)$this->seconds >= 10 ? $this->seconds : "0" . $this->seconds;
            $start_time = "00:" . $start_minutes . ":" . $start_seconds;
            $file_name = Str::replaceArray(' ', ['-'], $this->clipName) . "-" . time();
            $command = "youtube-dl -x --audio-format mp3 -o \"". storage_path() . "/app/public/" . $file_name . ".%(ext)s\" --postprocessor-args \"-ss " . $start_time . " -t 00:00:28\" -f bestaudio " . $this->url;
            shell_exec($command);
            $file_name_audio = $this->get_file($file_name);
            if($file_name_audio == -1) throw new Exception();
            $command = "ffmpeg -i " . storage_path() . "/app/public/orignal.mp4" . " -i " . storage_path() . "/app/public/" . escapeshellarg($file_name_audio) . " -c:v copy -map 0:v:0 -map 1:a:0 " . storage_path() . "/app/public/" . escapeshellarg($file_name) . ".mp4";
            shell_exec($command);
            session()->flash('file', Storage::url($file_name . ".mp4"));
        }catch(Exception $ex) {
            dd($ex);
        }
    }

    public function updated($field) {
        $this->validateOnly($field, [
            'clipName' => 'max:100',
        ]);
    }

    public function mount() {
        $this->url = "";
        $this->title = "";
        $this->duration = "";
        $this->thumbnail = "";
    }

    public function render()
    {
        return view('livewire.duration-picker');
    }

    private function get_file($file_name) {
        $allFiles = Storage::disk('public')->files('');

        // filter the ones that match the filename.*
        $matchingFiles = preg_grep('/^' . $file_name . '\./', $allFiles);
        if(sizeof($matchingFiles) > 0) {
            foreach ($matchingFiles as $key => $value) {
                return $value;
            }
        };

        return -1;
    }
}
