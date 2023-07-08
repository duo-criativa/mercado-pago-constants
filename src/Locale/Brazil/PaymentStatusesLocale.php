<?php

namespace DuoCriativa\MercadoPagoConstants\Locale\Brazil;

use DuoCriativa\MercadoPagoConstants\PaymentStatus;
use DuoCriativa\MercadoPagoConstants\PaymentStatuses;

class PaymentStatusesLocale implements \DuoCriativa\MercadoPagoConstants\PaymentStatusesLocale
{
    private const PENDING_DESCRIPTION = 'O usuário não concluiu o processo de pagamento (por exemplo, gerou o boleto e o processo será concluído no momento em que o pagamento do mesmo for processado).';
    private const APPROVED_DESCRIPTION = 'The payment has been approved and credited.';
    private const AUTHORIZED_DESCRIPTION = 'The payment has been authorized but not captured yet.';
    private const IN_PROCESS_DESCRIPTION = 'The payment is in analysis.';
    private const IN_MEDIATION_DESCRIPTION = 'The user started a dispute.';
    private const REJECTED_DESCRIPTION = 'The payment was rejected (the user can try to pay again).';
    private const CANCELLED_DESCRIPTION = 'Either the payment was canceled by one of the parties or expired.';
    private const REFUNDED_DESCRIPTION = 'The payment was returned to the user.';
    private const CHARGED_BACK_DESCRIPTION = 'A chargeback was placed on the buyer\'s credit card.';

    private array $privateDescriptions = [
        PaymentStatuses::PENDING => self::PENDING_DESCRIPTION,
        PaymentStatuses::APPROVED => self::APPROVED_DESCRIPTION,
        PaymentStatuses::AUTHORIZED => self::AUTHORIZED_DESCRIPTION,
        PaymentStatuses::IN_PROCESS => self::IN_PROCESS_DESCRIPTION,
        PaymentStatuses::IN_MEDIATION => self::IN_MEDIATION_DESCRIPTION,
        PaymentStatuses::REJECTED => self::REJECTED_DESCRIPTION,
        PaymentStatuses::CANCELLED => self::CANCELLED_DESCRIPTION,
        PaymentStatuses::CHARGED_BACK => self::CHARGED_BACK_DESCRIPTION,
        PaymentStatuses::REFUNDED => self::REFUNDED_DESCRIPTION,
    ];

    private array $publicDescriptions = [
        PaymentStatuses::PENDING => 'Aguardando confirmação',
        PaymentStatuses::APPROVED => 'Aprovado',
        PaymentStatuses::AUTHORIZED => 'Autorizado',
        PaymentStatuses::IN_PROCESS => 'Em processamento.',
        PaymentStatuses::IN_MEDIATION => self::IN_MEDIATION_DESCRIPTION,
        PaymentStatuses::REJECTED => self::REJECTED_DESCRIPTION,
        PaymentStatuses::CANCELLED => self::CANCELLED_DESCRIPTION,
        PaymentStatuses::CHARGED_BACK => self::CHARGED_BACK_DESCRIPTION,
        PaymentStatuses::REFUNDED => self::REFUNDED_DESCRIPTION,
    ];

    public function get(string $status): ?PaymentStatus
    {
        return PaymentStatus::create($status, $this->publicDescriptions[$status] ?? '', $this->privateDescriptions[$status] ?? '');
    }

    public function getLocale(): string
    {
        return  'pt-BR';
    }
}