<?php
/**
 * Class ProfileComplete
 * Author: Kashif Bhatti
 * 21/09/2025
 */

namespace App\Services\ProfileComplete;

abstract class ProfileComplete
{
    protected $successor;
    abstract protected function check(ProfileStatus $status);

    public function succeedWith(ProfileComplete $successor)
    {
        $this->successor = $successor;
    }

    public function next(ProfileStatus $status)
    {
        if ($this->successor) {
            $this->successor->check($status);
        }
    }
}
