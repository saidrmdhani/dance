<?php

namespace App\Http\Livewire;

use Abraham\TwitterOAuth\TwitterOAuth;
use Exception;
use Livewire\Component;

class Twitter extends Component
{
    public $access_token;
    public $clip;

    public function mount($access_token, $clip) {
        $this->access_token = $access_token;
        $this->clip = $clip;
    }

    public function render()
    {
        return view('livewire.twitter');
    }

    public function tweet() {
        $access_token = $this->access_token;
        try {
            $connection = new TwitterOAuth(config('twitter.consumer_key'), config('twitter.consumer_secret'), $access_token['oauth_token'], $access_token['oauth_token_secret']);
            $media1 = $connection->upload('media/upload', [
                'media' => storage_path('app/public'). "/". $this->clip->file,
                'media_type' => 'video/mp4'
            ], true);
            $parameters = [
                'status' => $this->clip->name. " https://3tabdance.com/share/". $this->clip->id . " @teahill_oman ",
                'media_ids' => $media1->media_id_string
            ];
            $connection->post('statuses/update', $parameters);
            session()->flash('message', 'تمت المشاركة بنجاح!');
        } catch(Exception $ex) {
            session()->flash('error', 'حدث خطأ غير متوقع أثناء محاولة التغريد، الرجاء تحديث الصفحة والمحاولة من جديد');
        }
    }
}
