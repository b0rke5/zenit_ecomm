<?
$par = [
	'TRTYPE' => 1,
	'BACKREF' => 'https://c-1.io/back/',
	'ORDER' => sprintf('%016d', 7),
	'EMAIL' => 'trade@mbrns.org',
	'COUNTRY' => 'RU',
	'MERCH_GMT' => '+4',
	'LANG' => 'ru',
	'MERCHANT' => 'c-1.io',
	'MERCH_NAME' => 'c-1.io',
	'MERCH_URL' => 'https://c-1.io',
	'NONCE' => bin2hex(openssl_random_pseudo_bytes(16)),
	'TIMESTAMP' => gmdate('YmdHis'),
	'P_SIGN' => '',
	'MERCHANT' => '',
	'TERMINAL' => '88000000',
	'CURRENCY' => 'RUB',
	'AMOUNT' => '2000.00',
	'DESC' => 'C-1.IO',
	'NOTIFY_URL' => 'https://api1.c-1.io/ipn/',
	'KEY' => '8D8FBA028BF58AACB9D7B0CE330E684C'
];

$mac =
	strlen($par['TRTYPE']) . $par['TRTYPE'] .
	strlen($par['AMOUNT']) . $par['AMOUNT'] .
	strlen($par['TERMINAL']) . $par['TERMINAL'] .
	strlen($par['TIMESTAMP']) . $par['TIMESTAMP'] .
	strlen($par['NONCE']) . $par['NONCE'] .
	strlen($par['CURRENCY']) . $par['CURRENCY'] .
	strlen($par['ORDER']) . $par['ORDER'];

$par['P_SIGN'] = hash_hmac('sha1', $mac, pack("H*", $par['KEY']));

echo 'p_sign: ' . $mac;

?>
<form method="post" action="https://3dst3.zenit.ru/cgi-bin/cgi_link">
	<div>TRTYPE <input type="text" name="TRTYPE" value="<?= $par['TRTYPE'] ?>"></div>
	<div>BACKREF <input type="text" name="BACKREF" value="<?= $par['BACKREF'] ?>"></div>
	<div>ORDER <input type="text" name="ORDER" value="<?= $par['ORDER'] ?>"></div>
	<div>EMAIL <input type="text" name="EMAIL" value="<?= $par['EMAIL'] ?>"></div>
	<div>COUNTRY <input type="text" name="COUNTRY" value="<?= $par['COUNTRY'] ?>"></div>
	<div>MERCH_GMT <input type="text" name="MERCH_GMT" value="<?= $par['MERCH_GMT'] ?>"></div>
	<div>LANG <input type="text" name="LANG" value="<?= $par['LANG'] ?>"></div>
	<div>MERCH_NAME <input type="text" name="MERCH_NAME" value="<?= $par['MERCH_NAME'] ?>"></div>
	<div>MERCH_URL <input type="text" name="MERCH_URL" value="<?= $par['MERCH_URL'] ?>"></div>
	<div>NONCE<input type="text" name="NONCE" value="<?= $par['NONCE'] ?>"></div>
	<div>TIMESTAMP<input type="text" name="TIMESTAMP" value="<?= $par['TIMESTAMP'] ?>"></div>
	<div>P_SIGN<input type="text" name="P_SIGN" value="<?= $par['P_SIGN'] ?>" id="P_SIGN"></div>
	<div>MERCHANT<input type="hidden" name="MERCHANT" value="<?= $par['MERCHANT'] ?>" id="MERCHANT"></div>
	<div>TERMINAL<input type="text" name="TERMINAL" value="<?= $par['TERMINAL'] ?>"></div>
	<div>CURRENCY<input type="text" name="CURRENCY" value="<?= $par['CURRENCY'] ?>"></div>
	<div>AMOUNT<input type="text" name="AMOUNT" value="<?= $par['AMOUNT'] ?>"></div>
	<div>DESC<input type="text" name="DESC" value="<?= $par['DESC'] ?>"></div>
	<div>NOTIFY_URL<input type="text" name="NOTIFY_URL" value="<?= $par['NOTIFY_URL'] ?>"></div>

	<center style="margin:5px;">
		<input type="submit" name="SEND_BUTTON" value="Оплатить">
	</center>
</form>
<style>
	input[type=text] {
		display: block;
	}
</style>
