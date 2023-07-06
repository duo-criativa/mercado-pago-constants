<?php

namespace DuoCriativa\MercadoPagoConstants;

interface PaymentStatusesLocale
{
    public function get(string $status): ?PaymentStatus;
}