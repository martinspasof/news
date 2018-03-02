<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
        h1, h3 {
            text-align: center;
        }
    </style>
    <h1>Получихте ново запитване</h1>
    <h3>Информация</h3>
    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0">
                    <!-- Email Body -->
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell">Име: </td>
                                    <td>{{ $FormFirstName or '' }}</td>
                                </tr>                                
                                <tr>
                                    <td class="content-cell">Фамилия: </td>
                                    <td>{{ $FormLastName or '' }}</td>
                                </tr>                                
                                <tr>
                                    <td class="content-cell">Имейл: </td>
                                    <td>{{ $FormEmail or '' }}</td>
                                </tr>                                
                                <tr>
                                    <td class="content-cell">Телефон: </td>
                                    <td>{{ $FormPhone or '' }}</td>
                                </tr>                               
                                <tr>
                                    <td class="content-cell">Материал:</td>
                                    <td>{{ $FormMaterial or '' }}</td>
                                </tr>                     
                                <tr>
                                    <td class="content-cell">Срок за изработка: </td>
                                    <td>{{ $FormDeadline or '' }}</td>
                                </tr>                                
                                <tr>
                                    <td class="content-cell">Получаване: </td>
                                    <td>{{ $FormReceive or '' }}</td>
                                </tr>                               
                                <tr>
                                    <td class="content-cell">Предназначение на модела:</td>
                                    <td>{{ $FormApplication or '' }}</td>
                                </tr>                               
                                <tr>
                                    <td class="content-cell">Цвят: </td>
                                    <td>{{ $FormColors or '' }}</td>
                                </tr>                               
                                <tr>
                                    <td class="content-cell">Резолюция:</td>
                                    <td>{{ $FormResolution or '' }}</td>
                                </tr>                              
                                <tr>
                                    <td class="content-cell">Инфо:</td>
                                    <td>{{ $FormInfo or '' }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
