<?php

/**
 * Class UserDto
 * Author: Kashif Bhatti
 * 03/08/2025
 */

namespace App\DataTransferObjects;

use App\Enums\RoleEnum;
use App\Http\Requests\Api\UserRequest;

readonly class UserDto
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public bool $newsletterEmail,
        public bool $newsletterSms,
        public bool $newsletterPush,
        public string $role,
    ) {
    }

    public static function fromApiRequest(UserRequest $request): self
    {
        return new self(
            name: $request->validated('name'),
            email: $request->validated('email'),
            password: bcrypt($request->validated('password')),
            newsletterEmail: $request->validated('newsletterEmail'),
            newsletterSms: $request->validated('newsletterSms'),
            newsletterPush: $request->validated('newsletterPush'),
            role: RoleEnum::tryFrom($request->validated('role'))?->value,
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'newsletter_email' => $this->newsletterEmail,
            'newsletter_sms' => $this->newsletterSms,
            'newsletter_push' => $this->newsletterPush,
            'password' => bcrypt($this->password),
            'role' => RoleEnum::tryFrom($this->role),
        ];
    }
}
