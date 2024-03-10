<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>PEPUDOS FIT | GYM - FACTURA</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table aria-describedby="a">
            <th></th>
            <tr class="top">
                <td colspan="2">
                    <table aria-describedby="a">
                        <th></th>
                        <tr>
                            <td class="title">
                                PEPUDOS FIT | GYM
                            </td>

                            <td>
                                Factura #: {{ $client->plan->id }}<br />
                                Creado: {{ $client->plan->created_at }}<br />
                                Pagado: {{ $client->plan->updated_ad }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table aria-describedby="a">
                        <th></th>
                        <tr>
                            <td>
                                Pepudos Fit.<br />
                                12345 America<br />
                                Quito - Ecuador
                            </td>

                            <td>

                                {{ $client->nombre }}<br />
                                {{ $client->correo }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Item</td>

                <td>Precio</td>
            </tr>

            <tr class="item">
                <td>{{ $client->plan->nombre }}</td>

                <td> $ {{ $client->plan->precio }}</td>
            </tr>

            <tr class="total">
                <td></td>

                <td>Total: ${{ $client->plan->precio }}</td>
            </tr>
        </table>
    </div>
</body>

</html>
