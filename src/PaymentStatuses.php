<?php

namespace DuoCriativa\MercadoPagoConstants;


class PaymentStatuses
{
    private array $statuses = [];

    public const PENDING = 'pending';
    private const PENDING_DESCRIPTION = 'The user has not concluded the payment process (for example, by generating a payment by boleto, it will be concluded at the moment in which the user makes the payment in the selected place).';
    public const APPROVED = 'approved';
    private const APPROVED_DESCRIPTION = 'The payment has been approved and credited.';
    public const AUTHORIZED = 'authorized';
    private const AUTHORIZED_DESCRIPTION = 'The payment has been authorized but not captured yet.';
    public const IN_PROCESS = 'in_process';
    private const IN_PROCESS_DESCRIPTION = 'The payment is in analysis.';
    public const IN_MEDIATION = 'in_mediation';
    private const IN_MEDIATION_DESCRIPTION = 'The user started a dispute.';
    public const REJECTED = 'rejected';
    private const REJECTED_DESCRIPTION = 'The payment was rejected (the user can try to pay again).';
    public const CANCELLED = 'cancelled';
    private const CANCELLED_DESCRIPTION = 'Either the payment was canceled by one of the parties or expired.';
    public const REFUNDED = 'refunded';
    private const REFUNDED_DESCRIPTION = 'The payment was returned to the user.';
    public const CHARGED_BACK = 'charged_back';
    private const CHARGED_BACK_DESCRIPTION = 'A chargeback was placed on the buyer\'s credit card.';

    public function __construct()
    {
        $this->addLocale('en', new Locale\English\PaymentStatusesLocale());;
        $this->add(PaymentStatus::create(self::PENDING, self::PENDING_DESCRIPTION));
        $this->add(PaymentStatus::create(self::APPROVED, self::APPROVED_DESCRIPTION));
        $this->add(PaymentStatus::create(self::AUTHORIZED, self::AUTHORIZED_DESCRIPTION));
        $this->add(PaymentStatus::create(self::IN_PROCESS, self::IN_PROCESS_DESCRIPTION));
        $this->add(PaymentStatus::create(self::IN_MEDIATION, self::IN_MEDIATION_DESCRIPTION));
        $this->add(PaymentStatus::create(self::REJECTED, self::REJECTED_DESCRIPTION));
        $this->add(PaymentStatus::create(self::CANCELLED, self::CANCELLED_DESCRIPTION));
        $this->add(PaymentStatus::create(self::REFUNDED, self::REFUNDED_DESCRIPTION));
        $this->add(PaymentStatus::create(self::CHARGED_BACK, self::CHARGED_BACK_DESCRIPTION));
    }

    public function add(PaymentStatus $status): self
    {
        $this->statuses[$status->status] = $status;

        return $this;
    }

    /**
     * @return array<PaymentStatus>
     */
    public function all(): array
    {
        return $this->statuses;
    }

    private string $defaultLocale = 'en';
    private $locales = [];

    public function addLocale(string $locale, PaymentStatusesLocale $paymentStatusesLocale): void
    {
        $this->locales[$locale] = $paymentStatusesLocale;
    }

    public function setDefaultLocale(string $locale): void
    {
        if (!isset($this->locales[$locale])) {
            throw new \LogicException("Locale `$locale` does not exists. Can't be defined as default.");
        }

        $this->defaultLocale = $locale;
    }

    public function get(string $status, ?string $locale = null): ?PaymentStatus
    {
        if ($locale === null || !isset($this->locales[$this->defaultLocale])) {
            $locale = $this->defaultLocale;
        }
        $statuses = $this->locales[$locale];
        assert($statuses instanceof PaymentStatusesLocale);

        return $statuses->get($status);
    }

    public function getOrFail(string $status, ?string $locale = null): PaymentStatus
    {
        $found = $this->get($status);
        if (null === $found) {
            throw new \InvalidArgumentException("Mercado Pago Payment Status not found: $status");
        }

        return $found;
    }
}