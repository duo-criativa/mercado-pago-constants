# Mercado Pago Constants

## Payment statuses

```php
use DuoCriativa\MercadoPagoConstants\PaymentStatuses;


$statuses = new PaymentStatuses();
$status = $statuses->get('pending');
```

### Localization

## Using static method


```php
use DuoCriativa\MercadoPagoConstants\PaymentStatuses;

PaymentStatuses::addLocale('pt-BR', new PaymentStatusesBrazil);
$statuses = new PaymentStatuses('pt-BR');
$status = $statuses->get('pending');
echo $status->status; // pending
echo $status->description; // 
```


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
