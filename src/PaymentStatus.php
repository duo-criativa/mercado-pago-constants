<?php

namespace DuoCriativa\MercadoPagoConstants;

final readonly class PaymentStatus
{
    public function __construct(public string $status, public string $description)
    {
    }

    public static function create(string $status, string $description): self
    {
        return new self($status, $description);
    }
}