# Mercado Pago Constants

## Payment statuses

```php
use DuoCriativa\MercadoPagoConstants\PaymentStatuses;


$statuses = new PaymentStatuses();
$statuses->get();
```

### Localizing

```php
use DuoCriativa\MercadoPagoConstants\PaymentStatuses;


$statuses = new PaymentStatuses();
$statuses->setLocale('pt-BR');
$statuses->get('pending');
```

```php
use DuoCriativa\MercadoPagoConstants\PaymentStatuses;

PaymentStatuses::get('pending', 'pt-BR');
```

```php
use DuoCriativa\MercadoPagoConstants\PaymentStatuses;
use DuoCriativa\MercadoPagoConstants\PaymentStatus;

PaymentStatuses::addLocale('pt-BR', PaymentStatus::create('pending', 'O usuário não concluiu o processo de pagamento (por exemplo, gerou o boleto e ainda não realizadou o pagamento).'));
```
