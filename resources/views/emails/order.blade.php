<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email google</title>



    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap');
    </style>

</head>

<body style="margin:0;padding:0" bgcolor="#FAFAFA">

    <div style="margin:0;padding:0" bgcolor="#FAFAFA">

        <table width="100%" height="100%" style="min-width:348px" border="0" cellspacing="0" cellpadding="0" lang="uk" bgcolor="#FAFAFA"
            role="presentation">


            <tbody>

                <tr align="center">

                    <td>
                        <table width="100%" cellspacing="0" cellpadding="0" bgcolor="#FAFAFA" style="max-width:600px" role="presentation">



                            <tbody>

                                <tr>

                                    <td style="padding-top:30px;padding-bottom:30px;padding-left:20px;padding-right:20px">


                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation">


                                            <tbody>

                                                <tr>

                                                    <td style="padding-bottom:20px">

                                                        <img src="https://blank-numbers.com/images/logo.png" height="70px" alt="" title=""
                                                            data-bit="iit">

                                                    </td>

                                                </tr>


                                                <tr>


                                                    <td>
                                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation">
                                                            <tbody>
                                                                <tr>
                                                                    <td bgcolor="#f9f7e8"
                                                                        style="padding:30px 20px 40px 30px; border-radius:4px">



                                                                        <table border="0" cellspacing="0" cellpadding="0"
                                                                            role="presentation"
                                                                            style="font-family:Roboto,sans-serif;color:#252728;line-height:1.5;font-size:16px">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="padding-bottom:20px">
                                                                                        <span
                                                                                            style="font-size:26px;font-weight:500; color:#77917f;">
                                                                                            Замовлення консультації
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span style="color:#252728;">Консультація:</span>
                                                                                        <span style="color:#e63946;font-weight:500;"> {{
                                                                                            $order['order'] }} </span>
                                                                                    </td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="padding-bottom:20px">
                                                                                        <span style="color:#252728;">
                                                                                            Ціна:
                                                                                        </span>
                                                                                        <span style="color:#e63946;font-weight:500;">
                                                                                            {{ $order['price'] }}
                                                                                        </span>
                                                                                        <span style="color:#e63946;font-weight:500;">
                                                                                            грн
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span style="color:#252728;">
                                                                                            Ім'я:
                                                                                        </span>
                                                                                        <span style="color:#77917f;font-weight:500;">
                                                                                            {{ $order['name'] }}
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span style="color:#252728;">
                                                                                            Email:
                                                                                        </span>
                                                                                        <span style="color:#77917f;font-weight:500;">
                                                                                            {{ $order['email'] }}
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span style="color:#252728;">
                                                                                            Телефон:
                                                                                        </span>
                                                                                        <span style="color:#77917f;font-weight:500;">
                                                                                            {{ $order['phone'] }}
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span style="color:#252728;">
                                                                                            Телеграм:
                                                                                        </span>
                                                                                        <span style="color:#77917f;font-weight:500;">
                                                                                            {{ $order['telegram'] }}
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="padding-top:20px">
                                                                                        <span style="color:#252728;">
                                                                                            Сообщение:
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span style="color:#77917f;font-weight:400;">
                                                                                            {{ $order['message'] }}
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="padding-top:20px">
                                                                                        <span style="color:#252728;">
                                                                                            Дата народження:
                                                                                        </span>
                                                                                        <span style="color:#77917f;font-weight:500;">
                                                                                            {{ $order['birthday'] }}
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span style="color:#252728;">
                                                                                            Місто народження + час:
                                                                                        </span>
                                                                                        <span style="color:#77917f;font-weight:500;">
                                                                                            {{ $order['city-time'] }}
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>

                                                                                @if ($order['birthday-partner'] )

                                                                                <tr>
                                                                                    <td style="padding-top:20px">
                                                                                        <span style="color:#252728;">
                                                                                            Дата народження партнера:
                                                                                        </span>
                                                                                        <span style="color:#77917f;font-weight:500;">
                                                                                            {{ $order['birthday-partner'] }}
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <span style="color:#252728;">
                                                                                            Місто народження + час партнера:
                                                                                        </span>
                                                                                        <span style="color:#77917f;font-weight:500;">
                                                                                            {{ $order['city-time-partner'] }}
                                                                                        </span>
                                                                                    </td>
                                                                                </tr>

                                                                                @endif



                                                                            </tbody>
                                                                        </table>



                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>


                                                </tr>


                                            </tbody>


                                        </table>


                                    </td>

                                </tr>




                            </tbody>



                        </table>

                    </td>
                </tr>

            </tbody>

        </table>


    </div>

</body>

</html>