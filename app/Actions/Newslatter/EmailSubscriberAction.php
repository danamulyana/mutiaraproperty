<?php 

namespace App\Actions\Newslatter;

use App\Models\Subscriber;

class EmailSubscriberAction
{
    public function __invoke(array $formData)
    {
        $this->getOrCreateSubsriberEmail($formData);
    }

    public function getOrCreateSubsriberEmail(array $formData)
    {
        return Subscriber::firstOrCreate($formData);
    }
}
