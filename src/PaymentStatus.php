<?php

namespace DuoCriativa\MercadoPagoConstants;

final readonly class PaymentStatus
{
    /**
     * @param string $status
     * @param string $publicDescription Description of the payment status that should be shown to the ecommerce user.
     * @param string $privateDescription Description of the payment status that should be shown to the ecommerce admin/operator.
     */
    public function __construct(public string $status, public string $publicDescription, public string $privateDescription)
    {
    }

    public static function create(string $status, string $publicDescription, string $privateDescription): self
    {
        return new self($status, $publicDescription, $privateDescription);
    }
}