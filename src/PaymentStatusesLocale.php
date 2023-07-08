<?php

namespace DuoCriativa\MercadoPagoConstants;

interface PaymentStatusesLocale
{
    public function getLocale(): string;

    public function get(string $status): ?PaymentStatus;
}