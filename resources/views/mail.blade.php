<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

@if(isset($params['form_type']))
    <p>Заявка отправлена через форму в контактной информации</p>
@endif
@if(isset($params['product_name']))
    <p><b>Заинтересовавший проект:</b> {{ $params['product_name'] }}</p>
@endif
@if($params['name'])
    <p><b>Имя:</b> {{ $params['name'] }}</p>
@endif
@if($params['phone'])
    <p><b>Номер телефона:</b> {{ $params['phone'] }}</p>
@endif
@if($params['email'])
    <p><b>Адрес почты:</b> {{ $params['email'] }}</p>
@endif

</body>
</html>